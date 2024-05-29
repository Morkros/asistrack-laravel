<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Total de asistencias') }}
            </h2>
            <x-user-icon class="h-5 w-auto fill-current text-gray-800 dark:text-gray-200 ml-2"></x-user-icon>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">

                <div class="mb-4 flex justify-between items-center">
                    <a href="{{ route('students.index') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-0.5 px-2 rounded">&larr; Volver</a>
                </div>

                <div class="rounded px-8 pt-6 pb-8 mb-4">
                    <table class="w-full h-full rounded-lg">
                        <thead>
                            <tr>
                                <th class="border-b border-gray-600 px-4 py-2 text-center">Condición</th>
                                <th class="border-b border-gray-600 px-4 py-2 text-center">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allDates as $date)
                                @if ($presentDates->contains($date))
                                    <tr>
                                        <td class="text-green-400 px-4 py-2 text-center">Presente</td>
                                        <td class="px-4 py-2 text-center">{{ $date->format('d-m-Y') }}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td class="text-red-400 px-4 py-2 text-center">Ausente</td>
                                        <td class="px-4 py-2 text-center">{{ $date->format('d-m-Y') }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
