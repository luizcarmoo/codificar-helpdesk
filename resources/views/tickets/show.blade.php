@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded shadow">

    <h2 class="text-2xl font-bold mb-4">
        Chamado: {{ $ticket->title }}
    </h2>

    <div class="space-y-3">

        <div>
            <strong>Descrição:</strong>
            <p>{{ $ticket->description }}</p>
        </div>

        <div>
            <strong>Prioridade:</strong>
            {{ $ticket->priority->value }}
        </div>

        <div>
            <strong>Status:</strong>
            {{ $ticket->status->value }}
        </div>

        <div>
            <strong>Responsável:</strong>
            {{ $ticket->responsible?->name ?? 'Não atribuído' }}
        </div>

        <div>
            <strong>Criado em:</strong>
            {{ $ticket->created_at->format('d/m/Y H:i') }}
        </div>

        <div>
            <strong>Última atualização:</strong>
            {{ $ticket->updated_at->format('d/m/Y H:i') }}
        </div>

    </div>

    <div class="mt-6 flex gap-2">

        <a
            href="{{ route('tickets.edit', $ticket) }}"
            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">

            Editar

        </a>

    </div>

</div>

@endsection