@props([
    'type',
    'value',
])

@php

$class = match ($type) {

    'status' => match ($value) {

        'open' => 'bg-green-100 text-green-800',

        'in_progress' => 'bg-yellow-100 text-yellow-800',

        'resolved' => 'bg-blue-100 text-blue-800',

        'closed' => 'bg-gray-100 text-gray-800',

        default => 'bg-gray-100 text-gray-800',
    },

    'priority' => match ($value) {

        'low' => 'bg-green-100 text-green-800',

        'medium' => 'bg-yellow-100 text-yellow-800',

        'high' => 'bg-red-100 text-red-800',

        default => 'bg-gray-100 text-gray-800',
    },

    default => 'bg-gray-100 text-gray-800',
};

$label = match ($value) {

    'open' => 'Aberto',

    'in_progress' => 'Em andamento',

    'resolved' => 'Resolvido',

    'closed' => 'Fechado',

    'low' => 'Baixa',

    'medium' => 'Média',

    'high' => 'Alta',

    default => $value,
};

@endphp

<span
    class="px-2 py-1 rounded-full text-xs font-semibold {{ $class }}">

    {{ $label }}

</span>