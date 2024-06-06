<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Calendario') }}
            </h2>
            <x-calendar-icon class="h-5 w-auto fill-current text-gray-800 dark:text-gray-200 ml-2"></x-calendar-icon>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!--EMPIEZA EL DIV DE BUSCAR-->
                    <div class="text-center mt-5">
                        <form action="{{ route('assists.getDate') }}" method="POST">
                            @csrf
                            <div class="space-y-4">
                                <input type="date" class="w-3/6 text-black font-bold rounded" id="search_date"
                                    name="search_date" placeholder="Buscar por fecha">
                                <select class="text-black font-bold rounded" id="search_grade" name="search_grade"
                                    required>
                                    <option value="Todos">Todos los años</option>
                                    <option value="1ro">Primer año</option>
                                    <option value="2do">Segundo año</option>
                                    <option value="3ro">Tercer año</option>
                                </select>
                                <br>
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded inline-flex items-center">
                                    <x-search-icon
                                        class="h-4 w-auto fill-current text-black dark:text-black"></x-search-icon>
                                    <span class="ml-2">Buscar</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($message = Session::get('error'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                        role="alert">
                        <span class="block sm:inline">{{ $message }}</span>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!--EMPIEZA EL DIV DE AÑADIR ALUMNO-->
    @if (isset($results))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="rounded px-8 pt-6 pb-8 mb-4">
                        <table class="border-collapse border-b border-gray-600 w-full h-full rounded-lg">
                            <thead>
                                <tr>
                                    <th class="border-b border-gray-600 px-4 py-2 text-center">DNI</th>
                                    <th class="border-b border-gray-600 px-4 py-2 text-center">Nombre</th>
                                    <th class="border-b border-gray-600 px-4 py-2 text-center">Apellido</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($results as $student)
                                    <tr>
                                        <td class="border-b border-gray-600 px-4 py-2 text-center">{{ $student->dni }}
                                        </td>
                                        <td class="border-b border-gray-600 px-4 py-2 text-center">{{ $student->name }}
                                        </td>
                                        <td class="border-b border-gray-600 px-4 py-2 text-center">
                                            {{ $student->lastname }}</td>
                                    @empty
                                    <tr>
                                        <td colspan="6">
                                            <span class="text-red-500">
                                                <strong>No se encontraron estudiantes</strong>
                                            </span>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
