@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-4">

    <h2 class="text-2xl font-semibold">
        Chamados
    </h2>

    <a
        href="{{ route('tickets.create') }}"
        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">

        Novo Chamado

    </a>

</div>

<form
    method="GET"
    action="{{ route('tickets.index') }}"
    class="bg-white p-4 rounded shadow mb-6">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        <select
            name="status"
            class="border rounded p-2">

            <option value="">Todos os status</option>

            <option value="open"
                {{ request('status') === 'open' ? 'selected' : '' }}>
                Aberto
            </option>

            <option value="in_progress"
                {{ request('status') === 'in_progress' ? 'selected' : '' }}>
                Em andamento
            </option>

            <option value="resolved"
                {{ request('status') === 'resolved' ? 'selected' : '' }}>
                Resolvido
            </option>

            <option value="closed"
                {{ request('status') === 'closed' ? 'selected' : '' }}>
                Fechado
            </option>

        </select>

        <select
            name="priority"
            class="border rounded p-2">

            <option value="">Todas as prioridades</option>

            <option value="low"
                {{ request('priority') === 'low' ? 'selected' : '' }}>
                Baixa
            </option>

            <option value="medium"
                {{ request('priority') === 'medium' ? 'selected' : '' }}>
                Média
            </option>

            <option value="high"
                {{ request('priority') === 'high' ? 'selected' : '' }}>
                Alta
            </option>

        </select>

        <select
            name="responsible_id"
            class="border rounded p-2">

            <option value="">
                Todos os responsáveis
            </option>

            @foreach ($responsibles as $responsible)

                <option
                    value="{{ $responsible->id }}"
                    {{ request('responsible_id') == $responsible->id ? 'selected' : '' }}>

                    {{ $responsible->name }}

                </option>

            @endforeach

        </select>

    </div>

    <div class="flex gap-2 mt-4">

        <button
            type="submit"
            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">

            Filtrar

        </button>

        <a
            href="{{ route('tickets.index') }}"
            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">

            Limpar filtros

        </a>

    </div>

</form>

@if($tickets->isEmpty())

    <div class="bg-white p-6 rounded shadow">
        Nenhum chamado encontrado.
    </div>

@else

    <div class="bg-white rounded shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">ID</th>
                    <th class="p-3 text-left">Título</th>
                    <th class="p-3 text-left">Prioridade</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Responsável</th>
                    <th class="p-3 text-left">Ações</th>
                </tr>
            </thead>

            <tbody>

                @foreach($tickets as $ticket)

                    <tr class="border-t">

                        <td class="p-3">{{ $ticket->id }}</td>

                        <td class="p-3">{{ $ticket->title }}</td>

                        <td class="p-3">{{ $ticket->priority->value }}</td>

                        <td class="p-3">{{ $ticket->status->value }}</td>

                        <td class="p-3">
                            {{ $ticket->responsible?->name ?? 'Não atribuído' }}
                        </td>

                        <td class="p-3 flex gap-3">

                            <a
                                href="{{ route('tickets.show', $ticket) }}"
                                class="text-blue-600 hover:underline">
                                Ver
                            </a>

                            <a
                                href="{{ route('tickets.edit', $ticket) }}"
                                class="text-yellow-600 hover:underline">
                                Editar
                            </a>

                            <form
                                action="{{ route('tickets.destroy', $ticket) }}"
                                method="POST"
                                onsubmit="return confirm('Deseja excluir este chamado?')">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="text-red-600 hover:underline">
                                    Excluir
                                </button>

                            </form>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    <div class="mt-4">
        {{ $tickets->links() }}
    </div>

@endif

@endsection