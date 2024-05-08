
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

<!--EMPIEZA EL DIV DE AÑADIR ALUMNO-->
                    <div class="flex justify-center items-center mt-3">
                        <div class="w-full">
                            @if ($message = Session::get('success'))
                                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                                    <span class="block sm:inline">{{ $message }}</span>
                                </div>
                            @endif
                        
                            <div class="rounded px-8 pt-6 pb-8 mb-4">
                                <div class="mb-4">
                                    <a href="{{ route('students.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><i class="bi bi-plus-circle"></i> Add New Student</a>
                                </div>
                                <table class="border-collapse border border-gray-600 w-full h-full rounded-lg">
                                    <thead>
                                        <tr>
                                            <th class="border border-gray-600 px-4 py-2 text-center">DNI</th>
                                            <th class="border border-gray-600 px-4 py-2 text-center">Nombre</th>
                                            <th class="border border-gray-600 px-4 py-2 text-center">Apellido</th>
                                            <th class="border border-gray-600 px-4 py-2 text-center">Nacimiento</th>
                                            <th class="border border-gray-600 px-4 py-2 text-center">Porcentaje</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($students as $student)
                                        <tr>
                                            <td class="border border-gray-600 px-4 py-2 text-center">{{ $student->dni }}</td>
                                            <td class="border border-gray-600 px-4 py-2 text-center">{{ $student->name }}</td>
                                            <td class="border border-gray-600 px-4 py-2 text-center">{{ $student->lastname }}</td>
                                            <td class="border border-gray-600 px-4 py-2 text-center">{{ $student->birthdate }}</td>
                                            <td class="border border-gray-600 px-4 py-2 text-center">
                                                <form action="{{ route('students.destroy', $student->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                    
                                                    <a href="{{ route('students.show', $student->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded"><i class="bi bi-eye"></i> Mostrar</a>
                    
                                                    <a href="{{ route('students.edit', $student->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="bi bi-pencil-square"></i> Editar</a>   
                    
                                                    <a href="{{ route('assists.show', $student->dni) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded"><i class="bi bi-eye"></i> Asistencia</a>   
                    
                                                    <button type="submit" onclick="return confirm('¿Desea borrar el estudiante?');" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i class="bi bi-trash"></i> Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6">
                                                <span class="text-red-500">
                                                    <strong>No Student Found!</strong>
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
    </div>
    
</x-app-layout>
