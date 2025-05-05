<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actividad Extracurricular</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="min-h-screen flex flex-col items-center justify-center p-4">
        <h1 class="text-4xl font-bold mb-4">Sistema de Actividad Extracurricular</h1>
        <p class="text-lg mb-6 text-center max-w-xl">
            Bienvenido al sistema de registro de eventos. Aquí podrás consultar eventos, inscribirte y subir evidencia de tu participación.
        </p>

        <div class="flex gap-4">
            <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Iniciar sesión</a>
            <a href="{{ route('register') }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Registrarse</a>
            <a href="{{ route('eventos.index') }}" class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-800">Ver eventos</a>
        </div>
    </div>
</body>
</html>
