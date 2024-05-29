<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Formulario para añadir estudiantes') }}
            </h2>
        </div>
    </x-slot>

    <div class="flex justify-center py-12">
        <div class="max-w-2xl w-full sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('students.index') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded inline-block">&larr;
                        Volver</a>

                    <div class="mt-4">
                        <form action="{{ route('students.store') }}" method="post">
                            @csrf

                            <div class="mb-4">
                                <label for="dni"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Dni</label>
                                <input type="number"
                                    class="text-black mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    id="dni" name="dni" value="{{ old('dni') }}" required>
                                @if ($errors->has('dni'))
                                    <span class="text-red-500">{{ $errors->first('dni') }}</span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label for="name"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                                <input type="text"
                                    class="text-black mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    id="name" name="name" value="{{ old('name') }}" required>
                                @if ($errors->has('name'))
                                    <span class="text-red-500">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label for="lastname"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Apellido</label>
                                <input type="text"
                                    class="text-black mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    id="lastname" name="lastname" value="{{ old('lastname') }}" required>
                                @if ($errors->has('lastname'))
                                    <span class="text-red-500">{{ $errors->first('lastname') }}</span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label for="grade"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Año:</label>
                                <select
                                    class="text-black mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-control @error('description') is-invalid @enderror"
                                    id="grade" name="grade" required>
                                    <option value="1ro">Primer año</option>
                                    <option value="2do">Segundo año</option>
                                    <option value="3ro">Tercer año</option>
                                </select>
                                @if ($errors->has('grade'))
                                    <span class="text-red-500">{{ $errors->first('grade') }}</span>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label for="birthdate"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nacimiento</label>
                                <input type="date"
                                    class="text-black mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    id="birthdate" name="birthdate" value="{{ old('birthdate') }}" required>
                                @if ($errors->has('birthdate'))
                                    <span class="text-red-500">{{ $errors->first('birthdate') }}</span>
                                @endif
                            </div>

                            <div class="mt-4 flex justify-center">
                                <input type="submit"
                                    class="text-black bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded"
                                    value="Añadir estudiante">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
