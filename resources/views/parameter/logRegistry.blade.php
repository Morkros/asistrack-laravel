<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Listado de registros') }}
            </h2>
            <x-user-icon class="h-5 w-auto fill-current text-gray-800 dark:text-gray-200 ml-2"></x-user-icon>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <table class="border-collapse border-b border-gray-600 w-full h-full rounded-lg">
                    <thead>
                        <tr>
                            <th class="border-b border-gray-600 px-4 py-2 text-center">Nombre</th>
                            <th class="border-b border-gray-600 px-4 py-2 text-center">Acción</th>
                            <th class="border-b border-gray-600 px-4 py-2 text-center">IP</th>
                            <th class="border-b border-gray-600 px-4 py-2 text-center">Fecha</th>
                            <th class="border-b border-gray-600 px-4 py-2 text-center">Navegador</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($logs as $log)
                            <tr>
                                <td class="border-b border-gray-600 px-4 py-2 text-center">
                                    {{ $log->name }}</td>
                                <td class="border-b border-gray-600 px-4 py-2 text-center">
                                    {{ $log->action }}</td>
                                <td class="border-b border-gray-600 px-4 py-2 text-center">
                                    {{ $log->user_ip }}</td>
                                <td class="border-b border-gray-600 px-4 py-2 text-center">
                                    {{ date('d-m-Y', strtotime($log->log_created_at)) }}</td>
                                <td class="border-b border-gray-600 px-4 py-2 text-center">
                                    {{ $log->user_browser }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <span class="text-red-500 text-center">
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
