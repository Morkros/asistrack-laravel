<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div style="padding: 10px; margin-bottom: 10px;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="border-bottom: 1px solid black; padding: 5px; text-align: center;">DNI</th>
                    <th style="border-bottom: 1px solid black; padding: 5px; text-align: center;">Nombre</th>
                    <th style="border-bottom: 1px solid black; padding: 5px; text-align: center;">Apellido</th>
                    <th style="border-bottom: 1px solid black; padding: 5px; text-align: center;">Condición</th>
                    <th style="border-bottom: 1px solid black; padding: 5px; text-align: center;">Año</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($results as $student)
                    <tr>
                        <td style="border-bottom: 1px solid black; padding: 5px; text-align: center;">{{ $student->dni }}</td>
                        <td style="border-bottom: 1px solid black; padding: 5px; text-align: center;">{{ $student->name }}</td>
                        <td style="border-bottom: 1px solid black; padding: 5px; text-align: center;">{{ $student->lastname }}</td>
                        <td style="border-bottom: 1px solid black; padding: 5px; text-align: center;">{{ $student->conditionSimple($student->id) }}</td>
                        <td style="border-bottom: 1px solid black; padding: 5px; text-align: center;">{{ $student->grade }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding: 10px; text-align: center;">
                            <strong>No se encontraron estudiantes</strong>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
</html>
