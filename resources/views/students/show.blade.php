<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Información del estudiante') }}
            </h2>
            <x-user-icon class="h-5 w-auto fill-current text-gray-800 dark:text-gray-200 ml-2"></x-user-icon>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">

                <a href="{{ route('students.index') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-0.5 px-2 rounded">&larr; Volver</a>

                <div class="rounded px-8 pt-6 pb-8 mb-4">
                    <table class="w-full h-full rounded-lg">
                        <thead>
                            <tr>
                                <th class="border-b border-gray-600 px-4 py-2 text-center">DNI</th>
                                <th class="border-b border-gray-600 px-4 py-2 text-center">Nombre</th>
                                <th class="border-b border-gray-600 px-4 py-2 text-center">Apellido</th>
                                <th class="border-b border-gray-600 px-4 py-2 text-center">Nacimiento</th>
                                <th class="border-b border-gray-600 px-4 py-2 text-center">Año</th>
                                <th class="border-b border-gray-600 px-4 py-2 text-center">Porcentaje Asistencia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-4 py-2 text-center">{{ $student->dni }}</td>
                                <td class="px-4 py-2 text-center">{{ $student->name }}</td>
                                <td class="px-4 py-2 text-center">{{ $student->lastname }}</td>
                                <td class="px-4 py-2 text-center">{{ date('d-m-Y', strtotime($student->birthdate)) }}</td>
                                <td class="px-4 py-2 text-center">{{ $student->grade }}</td>
                                <td class="px-4 py-2 text-center"> {{ $student->percentage($student->id) }}%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
