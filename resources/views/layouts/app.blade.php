<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Desk</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<div class="container mx-auto p-6">

    <h1 class="text-3xl font-bold mb-6">
        Sistema de Chamados
    </h1>

    @if(session('success'))
        <div class="bg-green-200 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')

</div>

</body>
</html>