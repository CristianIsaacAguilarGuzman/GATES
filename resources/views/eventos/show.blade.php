<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Evento</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="max-w-3xl mx-auto mt-8 p-4 bg-white rounded shadow">
    <a href="{{ route('eventos.index') }}" class="inline-block mb-4 bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded">
    ← Volver a eventos
</a>

        <h1 class="text-2xl font-bold mb-4">{{ $evento->nombre }}</h1>

        <p class="mb-2 text-gray-700">{{ $evento->descripcion }}</p>
        <p class="mb-4 text-sm text-gray-500">Fecha: {{ \Carbon\Carbon::parse($evento->fecha)->format('d/m/Y') }}</p>

        @auth
            @if (!$inscrito)
                <!-- Formulario de inscripción -->
                <form action="{{ route('eventos.inscribirse', $evento->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Inscribirme al evento
                    </button>
                </form>
            @else
                <p class="text-green-600 font-semibold mb-4">Ya estás inscrito en este evento.</p>

                <!-- Formulario para subir archivo -->
                <form action="{{ route('archivos.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                    @csrf
                    <input type="hidden" name="evento_id" value="{{ $evento->id }}">
                    <input type="file" name="archivo" class="mb-2">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        Subir archivo
                    </button>
                </form>

                <!-- Lista de archivos -->
                <h2 class="text-lg font-semibold mb-2">Tus archivos</h2>
                <ul>
                    @forelse ($archivos as $archivo)
                        <li class="mb-2 flex items-center justify-between">
                            <a href="{{ asset('storage/' . $archivo->path) }}" target="_blank" class="text-blue-600 hover:underline">
                                {{ $archivo->nombre_archivo }}
                            </a>
                            <form action="{{ route('archivos.destroy', $archivo->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline ml-2">Eliminar</button>
                            </form>
                        </li>
                    @empty
                        <li>No has subido archivos todavía.</li>
                    @endforelse
                </ul>
            @endif
        @else
            <p class="text-red-600">Debes iniciar sesión para inscribirte o subir archivos.</p>
        @endauth
    </div>
</body>
</html>