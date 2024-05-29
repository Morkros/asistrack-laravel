<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Editar parámetros') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Estos parámetros definen el porcentaje de asistencia del alumno.') }}
        </p>
    </header>
         
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Hay algunos errores en los datos introducidos.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
         
    @if (!empty($parameter))
        <form action="{{ route('parameter.update', $parameter[0]->id) }}" class="mt-6 space-y-6" method="POST" enctype="multipart/form-data">
        @method('PUT')

        <input type="hidden" name="id" value="{{ $parameter[0]->id }}">
    @else
        <form action="{{ route('parameter.store') }}" class="mt-6 space-y-6" method="POST" enctype="multipart/form-data">
    @endif
        @csrf
        
        <div>
            <x-input-label for="total_class_days" :value="__('Total de días de clase:')" />
            <x-text-input id="total_class_days" name="total_class_days" type="number" class="mt-1 block w-full" required/>
        </div>

        <div>
            <x-input-label for="promotion" :value="__('Porcentaje para promocionar:')" />
            <x-text-input id="promotion" name="promotion" type="number" class="mt-1 block w-full" required/>
        </div>

        <div>
            <x-input-label for="regular" :value="__('Porcentaje para regularidad:')" />
            <x-text-input id="regular" name="regular" type="number" class="mt-1 block w-full" required/>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Actualizar') }}</x-primary-button>

            @if (session('status') === 'success')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Actualizado') }}</p>
            @endif
        </div>
         
    </form>
</section>