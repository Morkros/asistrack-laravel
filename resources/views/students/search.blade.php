
<div class="text-center mt-5">
    <form method="POST" action="{{ route('students.search') }}">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" id="name_search" name="name_search" placeholder="Buscar por Nombre">
        </div>
        <x-primary-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Buscar</x-primary-button>
    </form>
</div>

{{-- <div class="container mt-5">
    <h1>Resultados de la búsqueda</h1>

    @if($results->isEmpty())
        <p>No se encontraron resultados.</p>
    @else
        <ul>
            @foreach($results as $result)
                <li>{{ $result->name }}</li>
            @endforeach
        </ul>
    @endif
</div> --}}
