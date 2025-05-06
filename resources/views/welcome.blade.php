<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actividad Extracurricular</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow max-w-lg text-center">
        <h1 class="text-3xl font-bold mb-4">Bienvenido al Sistema de Eventos</h1>
        <p class="mb-6 text-gray-700">
            Este sistema permite a los alumnos inscribirse en eventos, subir evidencias y obtener créditos académicos.
        </p>

        <div class="space-y-3">
            @auth
                <a href="{{ route('eventos.index') }}" class="block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Ver Eventos</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="block w-full mt-2 bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                        Cerrar sesión
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Iniciar sesión</a>
                <a href="{{ route('register') }}" class="block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Registrarse</a>
                <a href="{{ route('eventos.index') }}" class="block text-blue-600 hover:underline mt-4">Ver eventos sin iniciar sesión</a>
            @endauth
        </div>
    </div>
</body>
</html>
