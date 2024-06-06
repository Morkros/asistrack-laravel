<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Listado de alumnos') }}
            </h2>
            <x-user-icon class="h-5 w-auto fill-current text-gray-800 dark:text-gray-200 ml-2"></x-user-icon>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!--EMPIEZA EL DIV DE BUSCAR-->
                    <div class="text-center mt-5">
                        <form action="{{ route('students.index') }}" method="GET">
                            <div class="space-y-4">
                                <input type="text" class="w-3/6 text-black font-bold rounded" id="name_search"
                                    name="name_search" placeholder="Buscar por nombre">
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

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">

                <!--EMPIEZA EL DIV DE AÑADIR ALUMNO-->
                <div class="flex justify-center items-center mt-3">
                    <div class="w-full">
                        @if ($message = Session::get('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                                role="alert">
                                <span class="block sm:inline">{{ $message }}</span>
                            </div>
                        @endif
                        @if ($message = Session::get('error'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                role="alert">
                                <span class="block sm:inline">{{ $message }}</span>
                            </div>
                        @endif
                        @if (isset($birthdays) && count($birthdays) > 0)
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                                role="alert">
                                <h4>Hoy es el cumpleaños de: </h4>
                                @foreach ($birthdays as $birthday)
                                    <span class="block sm:inline">🎈 {{ $birthday->name }}
                                        {{ $birthday->lastname }}</span><br>
                                @endforeach
                            </div>
                        @endif

                        <div class="rounded px-8 pt-6 pb-8 mb-4">
                            <div class="mb-4 flex justify-between items-center">
                                <a href="{{ route('students.create') }}"
                                    class="bg-green-500 hover:bg-green-700 text-black font-bold py-1.5 px-2 rounded inline-flex items-center">
                                    <x-createUser-icon
                                        class="h-4 w-4 fill-current text-black dark:text-black"></x-createUser-icon>
                                    <span class="ml-2">Nuevo estudiante</span></a>
                                <form action="{{ route('pdf.generatePDF') }}" method="get" class="ml-auto">
                                    @csrf
                                    <input type="hidden" name="generateList" value="studentList">
                                    <button type="submit"
                                        class="bg-green-500 hover:bg-green-700 text-black font-bold py-1 px-2 mr-1 rounded inline-flex items-center"><x-pdf-icon
                                            class="h-4 w-4 fill-current text-black dark:text-black"></x-pdf-icon>
                                        <span class="ml-2">Generar PDF</span></button>
                                </form>
                                <form action="{{ route('export.students') }}" method="post">
                                    @csrf
                                    <button type="submit"
                                        class="bg-green-500 hover:bg-green-700 text-black font-bold py-1 px-2 rounded inline-flex items-center"><x-excel-icon
                                            class="h-4 w-4 fill-current text-black dark:text-black"></x-excel-icon>
                                        <span class="ml-2">Generar Excel</span></button>
                                </form>
                            </div>

                            <table class="border-collapse border-b border-gray-600 w-full h-full rounded-lg">
                                <thead>
                                    <tr>
                                        <th class="border-b border-gray-600 px-4 py-2 text-center">DNI</th>
                                        <th class="border-b border-gray-600 px-4 py-2 text-center">Nombre</th>
                                        <th class="border-b border-gray-600 px-4 py-2 text-center">Apellido</th>
                                        {{-- <th class="border-b border-gray-600 px-4 py-2 text-center">Nacimiento</th> --}}
                                        <th class="border-b border-gray-600 px-4 py-2 text-center">Condición</th>
                                        <th class="border-b border-gray-600 px-4 py-2 text-center">Año</th>
                                        <th class="border-b border-gray-600 px-4 py-2 text-center">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($results as $student)
                                        <tr>
                                            <td class="border-b border-gray-600 px-4 py-2 text-center">
                                                {{ $student->dni }}</td>
                                            <td class="border-b border-gray-600 px-4 py-2 text-center">
                                                {{ $student->name }}</td>
                                            <td class="border-b border-gray-600 px-4 py-2 text-center">
                                                {{ $student->lastname }}</td>
                                            {{-- <td class="border-b border-gray-600 px-4 py-2 text-center">
                                                {{ date('d-m-Y', strtotime($student->birthdate)) }}</td> --}}

                                            {!! $student->condition($student->id) !!}

                                            <td class="border-b border-gray-600 px-4 py-2 text-center">
                                                {{ $student->grade }}</td>

                                            <td class="border-b border-gray-600 px-4 py-2 text-center items-center">
                                                <div
                                                    class="flex flex-col md:flex-row justify-center items-center space-y-2 md:space-y-0 md:space-x-1">
                                                    <form action="{{ route('student.instant', $student->id) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit"
                                                            class="bg-green-500 hover:bg-green-700 text-black font-bold py-2.5 px-2 rounded inline-flex items-center">
                                                            <x-check-icon
                                                                class="h-4 w-4 fill-current text-black dark:text-black"></x-check-icon>
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('students.destroy', $student->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('students.edit', $student->id) }}"
                                                            class="bg-yellow-500 hover:bg-yellow-700 text-black font-bold py-1.5 px-2 rounded inline-flex items-center">
                                                            <x-edit-icon
                                                                class="h-4 w-4 fill-current text-black dark:text-black"></x-edit-icon>
                                                            <span class="ml-2">Editar</span>
                                                        </a>
                                                        <a href="{{ route('students.show', $student->id) }}"
                                                            class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-1.5 px-2 rounded inline-flex items-center">
                                                            <x-show-icon
                                                                class="h-4 w-4 fill-current text-black dark:text-black"></x-show-icon>
                                                            <span class="ml-2">Mostrar</span>
                                                        </a>
                                                        <button type="submit"
                                                            onclick="return confirm('¿Desea borrar el estudiante?');"
                                                            class="bg-red-500 hover:bg-red-700 text-black font-bold py-1.5 px-2 rounded inline-flex items-center">
                                                            <x-deleteUser-icon
                                                                class="h-4 w-4 fill-current text-black dark:text-black"></x-deleteUser-icon>
                                                            <span class="ml-2">Eliminar</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
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
        </div>
    </div>

</x-app-layout>
