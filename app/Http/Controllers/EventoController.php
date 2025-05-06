<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::where('fecha', '>=', now())->orderBy('fecha')->get();
        return view('eventos.index', compact('eventos'));
    }

    public function inscribirse($id)
    {
        $evento = Evento::findOrFail($id);
        $user = Auth::user();

        // Verificar que sea alumno (no admin)
        if ($user->is_admin) {
            return redirect()->back()->with('error', 'Solo los alumnos pueden inscribirse a eventos.');
        }

        // Verificar que no esté ya inscrito
        if ($evento->usuarios()->where('user_id', $user->id)->exists()) {
            return redirect()->back()->with('error', 'Ya estás inscrito a este evento.');
        }

        // Inscribir al alumno
        $evento->usuarios()->attach($user->id);

        // Enviar correo (opcional: puedes comentar esto si aún no lo configuras)
        // Mail::to($user->email)->send(new \App\Mail\InscripcionEvento($evento));

        return redirect()->route('eventos.show', $evento->id)->with('success', 'Te has inscrito correctamente al evento.');
    }

    public function misEventos()
    {
        $user = auth()->user();
    
        // Obtener eventos donde el usuario está inscrito
        $eventos = $user->eventosInscritos()->where('fecha', '>=', now())->get();
    
        return view('mis-eventos', compact('eventos'));
    }
    

    public function show($id)
    {
        $evento = Evento::findOrFail($id);
        $user = Auth::user();

        // Verificar si el usuario está inscrito
        $inscrito = $evento->usuarios()->where('user_id', $user?->id)->exists();

        // Si está inscrito, obtener sus archivos
        $archivos = [];
        if ($inscrito) {
            $archivos = $evento->archivos()
                        ->where('user_id', $user->id)
                        ->get();
        }

        return view('eventos.show', compact('evento', 'inscrito', 'archivos'));
    }

}
