<x-app-layout>  

    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Listado para añadir asistencias') }}
            </h2>
            <x-user-icon class="h-5 w-auto fill-current text-gray-800 dark:text-gray-200 ml-2"></x-user-icon>
        </div>
    </x-slot>


    <div class="row justify-content-center mt-3">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Añadir nueva asistencia
                    </div>
                    <div class="float-end">
                        <a href="{{ route('assists.index') }}" class="btn btn-primary btn-sm">&larr; Volver</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('assists.assistanceStore', $student->id) }}" method="post">
                        @csrf

                        <input type="hidden" name="id" value="{{ $student->id }}">

                        <div class="mb-3 row">
                            <label for="dni" class="col-md-4 col-form-label text-md-end text-start">Dni</label>
                            <div class="col-md-6">
                            <input type="number" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni" value="{{ old('dni') }}">
                                @if ($errors->has('dni'))
                                    <span class="text-danger">{{ $errors->first('dni') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="date" class="col-md-4 col-form-label text-md-end text-start">Fecha:</label>
                            <div class="col-md-6">
                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}">
                                @if ($errors->has('date'))
                                    <span class="text-danger">{{ $errors->first('date') }}</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Añadir estudiante">
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>    
    </div>
</x-app-layout>