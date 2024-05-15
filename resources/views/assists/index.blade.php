
<x-app-layout>
    
<x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Listado para añadir asistencias') }}
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
                        <form action="{{ route('assists.index') }}" method="GET">
                            <div class="space-y-4">
                                <input type="text" class="w-5/6 text-black font-bold rounded" id="name_search" name="name_search" placeholder="Buscar por nombre">
                                <br>
                                <button type="submit" class=" bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Buscar</button>
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
                                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                    <span class="block sm:inline">{{ $message }}</span>
                                </div>
                            @elseif ($message = Session::get('error'))
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    <span class="block sm:inline">{{ $message }}</span>
                                </div>
                            @endif
                        
                            <div class="rounded px-8 pt-6 pb-8 mb-4">
                                <table class="border-collapse border-b border-gray-600 w-full h-full rounded-lg">
                                    <thead>
                                        <tr>
                                            <th class="border-b border-gray-600 px-4 py-2 text-center">DNI</th>
                                            <th class="border-b border-gray-600 px-4 py-2 text-center">Nombre</th>
                                            <th class="border-b border-gray-600 px-4 py-2 text-center">Apellido</th>
                                            <th class="border-b border-gray-600 px-4 py-2 text-center">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($results as $student)
                                        <tr>
                                            <td class="border-b border-gray-600 px-4 py-2 text-center">{{ $student->dni }}</td>
                                            <td class="border-b border-gray-600 px-4 py-2 text-center">{{ $student->name }}</td>
                                            <td class="border-b border-gray-600 px-4 py-2 text-center">{{ $student->lastname }}</td>
                                            <td class="border-b border-gray-600 px-4 py-2 text-center">
                                                <a href="{{ route('assists.create', $student->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-black font-bold py-2 px-4 rounded">As. Tardía</a>
                                                <a href="{{ route('assists.instant', $student->id) }}" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-4 rounded">Presente</a>
                                                <a href="{{ route('assists.instant', $student->id) }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Datos</a>
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
                    </div>
                </div>
            </div>
        </div>
    
</x-app-layout>
