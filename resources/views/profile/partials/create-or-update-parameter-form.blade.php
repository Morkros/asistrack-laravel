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
         
    @if (isset($parameter))
        <form action="{{ route('parameter.update', $parameter->id) }}" class="mt-6 space-y-6" method="POST" enctype="multipart/form-data">
        @method('PUT')
    @else
        <form action="{{ route('parameter.store') }}" class="mt-6 space-y-6" method="POST" enctype="multipart/form-data">
    @endif
        @csrf
        
        <div>
            <x-input-label for="total_class_days" :value="__('Total de días de clase:')" />
            <x-text-input id="total_class_days" name="total_class_days" type="number" class="mt-1 block w-full"/>
        </div>

        <div>
            <x-input-label for="regular" :value="__('Porcentaje para regularidad:')" />
            <x-text-input id="regular" name="regular" type="number" class="mt-1 block w-full"/>
        </div>

        <div>
            <x-input-label for="promotion" :value="__('Porcentaje para promocionar:')" />
            <x-text-input id="promotion" name="promotion" type="number" class="mt-1 block w-full"/>
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

        {{--  <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Total de días de clase:</strong>
                    <input type="number" name="class_days" class="form-control" value="{{ old('total_class_days', $parameter->total_class_days ?? '') }}"  placeholder="185 días de clase">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Porcentaje para promocionar:</strong>
                    <input type="number" name="promotion" class="form-control" name="promotion" value="{{ old('promotion', $parameter->promotion ?? '') }}" placeholder="80% para promocionar">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Porcentaje para regularizar:</strong>
                    <input type="number" name="regular" class="form-control" name="regular" value="{{ old('regular', $parameter->regular ?? '') }}" placeholder="70% para regularizar">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-3 rounded">Actualizar</button>
                
            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Guardado') }}</p>
            @endif
            </div>
        </div> --}}
         
    </form>
</section>