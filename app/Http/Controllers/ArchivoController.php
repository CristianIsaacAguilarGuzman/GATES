<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'archivo' => 'required|file|max:2048',
            'evento_id' => 'required|exists:eventos,id',
        ]);

        $evento = Evento::findOrFail($request->evento_id);
        $user = Auth::user();

        // Verificar que el alumno esté inscrito al evento
        if (!$evento->usuarios()->where('user_id', $user->id)->exists()) {
            return back()->with('error', 'No puedes subir archivos a un evento al que no estás inscrito.');
        }

        $archivoSubido = $request->file('archivo');
        $path = $archivoSubido->store('archivos', 'public');

        Archivo::create([
            'user_id' => $user->id,
            'evento_id' => $evento->id,
            'nombre_archivo' => $archivoSubido->getClientOriginalName(),
            'path' => $path,
        ]);

        return back()->with('success', 'Archivo subido exitosamente.');
    }

    public function destroy($id)
    {
        $archivo = Archivo::findOrFail($id);
        $user = Auth::user();

        // Verificar que el archivo sea del usuario
        if ($archivo->user_id !== $user->id) {
            return back()->with('error', 'No puedes eliminar este archivo.');
        }

        Storage::disk('public')->delete($archivo->path);
        $archivo->delete();

        return back()->with('success', 'Archivo eliminado correctamente.');
    }
}