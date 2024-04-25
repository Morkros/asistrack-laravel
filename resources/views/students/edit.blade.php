@extends('layouts')

@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">

            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Edit Student
                    </div>
                    <div class="float-end">
                        <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('students.update', $students->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id" value="{{ $students->id }}">
                        <div class="mb-3 row">
                            <label for="dni" class="col-md-4 col-form-label text-md-end text-start">Dni</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control @error('dni') is-invalid @enderror" id="dni"
                                    name="dni" value="{{ $students->dni }}">
                                @if ($errors->has('dni'))
                                    <span class="text-danger">{{ $errors->first('dni') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-end text-start">Nombre</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                    id="nombre" name="nombre" value="{{ $students->nombre }}">
                                @if ($errors->has('nombre'))
                                    <span class="text-danger">{{ $errors->first('nombre') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="apellido" class="col-md-4 col-form-label text-md-end text-start">Apellido</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('apellido') is-invalid @enderror"
                                    id="apellido" name="apellido" value="{{ $students->apellido }}">
                                @if ($errors->has('apellido'))
                                    <span class="text-danger">{{ $errors->first('apellido') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nacimiento"
                                class="col-md-4 col-form-label text-md-end text-start">Nacimiento</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control @error('nacimiento') is-invalid @enderror"
                                    id="nacimiento" name="nacimiento" value="{{ $students->nacimiento }}">
                                @if ($errors->has('nacimiento'))
                                    <span class="text-danger">{{ $errors->first('nacimiento') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="grupo" class="col-md-4 col-form-label text-md-end text-start">Grupo</label>
                            <div class="col-md-6">
                                <select class="form-control @error('grupo') is-invalid @enderror" id="grupo" name="grupo">
                                    <option value="A" {{ $students->grupo == 'A' ? 'selected' : '' }}>A</option>
                                    <option value="B" {{ $students->grupo == 'B' ? 'selected' : '' }}>B</option>
                                </select>
                                @if ($errors->has('grupo'))
                                    <span class="text-danger">{{ $errors->first('grupo') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
