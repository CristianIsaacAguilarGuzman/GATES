@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Mis Eventos Inscritos</h2>

    @if($eventos->isEmpty())
        <div class="alert alert-info">
            No estás inscrito en ningún evento próximo.
        </div>
    @else
        <div class="list-group">
            @foreach($eventos as $evento)
                <a href="{{ route('eventos.show', $evento->id) }}" class="list-group-item list-group-item-action">
                    <h5 class="mb-1">{{ $evento->nombre }}</h5>
                    <p class="mb-1">{{ $evento->descripcion }}</p>
                    <small>Fecha: {{ \Carbon\Carbon::parse($evento->fecha)->format('d/m/Y H:i') }}</small>
                </a>
            @endforeach
        </div>
    @endif
</div>
@endsection