<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eventos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="max-w-2xl mx-auto mt-8 p-4 bg-white rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Próximos eventos</h1>

        @forelse ($eventos as $evento)
            <div class="border-b pb-2 mb-4">
                <h2 class="text-xl font-semibold">{{ $evento->nombre }}</h2>
                <p class="text-gray-700">{{ $evento->descripcion }}</p>
                <p class="text-sm text-gray-500">Fecha: {{ \Carbon\Carbon::parse($evento->fecha)->format('d/m/Y') }}</p>
                <a href="{{ route('eventos.show', $evento->id) }}" class="text-blue-500 hover:underline mt-2 inline-block">
                    Ver detalle
                </a>
            </div>
        @empty
            <p>No hay eventos próximos disponibles.</p>
        @endforelse
    </div>
</body>
</html>
