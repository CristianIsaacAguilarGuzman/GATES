<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-lg mx-auto bg-white p-8 rounded shadow text-center">
            <h1 class="text-3xl font-bold mb-4">Bienvenido al Sistema de Eventos</h1>
            <p class="mb-6 text-gray-700">
                Este sistema permite a los alumnos inscribirse en eventos, subir evidencias y obtener créditos académicos.
            </p>

            <a href="{{ route('eventos.index') }}"
               class="inline-block w-full bg-blue-600 text-white text-lg font-semibold py-3 px-4 rounded hover:bg-blue-700 transition duration-300 shadow">
                Ver Eventos
            </a>
        </div>
    </div>
</x-app-layout>
