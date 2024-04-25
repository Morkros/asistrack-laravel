@extends('layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">Students List</div>
            <div class="card-body">
                <a href="{{ route('students.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Student</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Indice</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Nacimiento</th>
                        <th scope="col">Grupo</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $student->dni }}</td>
                            <td>{{ $student->nombre }}</td>
                            <td>{{ $student->apellido }}</td>
                            <td>{{ $student->nacimiento }}</td>
                            <td>{{ $student->grupo }}</td>
                            <td>
                                <form action="{{ route('students.destroy', $student->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('students.show', $student->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Mostrar</a>

                                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>   

                                    <a href="{{ route('assists.show', $student->dni) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Asistencia</a>   

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Desea borrar el estudiante?');"><i class="bi bi-trash"></i> Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Student Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{-- {{ $students->links() }} --}}

            </div>
        </div>
    </div>    
</div>
    
@endsection
