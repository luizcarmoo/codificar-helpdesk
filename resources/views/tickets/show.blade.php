@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded shadow">

    <h2 class="text-2xl font-bold mb-6">
        Chamado #{{ $ticket->id }} - {{ $ticket->title }}
    </h2>

    <div class="space-y-4">

        <div>
            <strong>Descrição</strong>

            <p class="mt-2 text-gray-700">
                {{ $ticket->description }}
            </p>
        </div>

        <div class="flex items-center gap-2">

            <strong>Prioridade:</strong>

            <x-badge
                type="priority"
                :value="$ticket->priority->value" />

        </div>

        <div class="flex items-center gap-2">

            <strong>Status:</strong>

            <x-badge
                type="status"
                :value="$ticket->status->value" />

        </div>

        <div>

            <strong>Responsável:</strong>

            <span class="text-gray-700">
                {{ $ticket->responsible?->name ?? 'Não atribuído' }}
            </span>

        </div>

        <div>

            <strong>Criado em:</strong>

            <span class="text-gray-700">
                {{ $ticket->created_at->format('d/m/Y H:i') }}
            </span>

        </div>

        <div>

            <strong>Última atualização:</strong>

            <span class="text-gray-700">
                {{ $ticket->updated_at->format('d/m/Y H:i') }}
            </span>

        </div>

    </div>

    <div class="mt-8 flex gap-2">

        <a
            href="{{ route('tickets.edit', $ticket) }}"
            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">

            Editar

        </a>

        <a
            href="{{ route('tickets.index') }}"
            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">

            Voltar

        </a>

    </div>

</div>

@endsection