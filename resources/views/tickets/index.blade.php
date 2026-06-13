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

@if($tickets->isEmpty())

    <div class="bg-white p-6 rounded shadow">
        Nenhum chamado cadastrado.
    </div>

@else

    <div class="bg-white rounded shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

            <tr>

                <th class="p-3 text-left">
                    ID
                </th>

                <th class="p-3 text-left">
                    Título
                </th>

                <th class="p-3 text-left">
                    Prioridade
                </th>

                <th class="p-3 text-left">
                    Status
                </th>

                <th class="p-3 text-left">
                    Responsável
                </th>

                <th class="p-3 text-left">
                    Ações
                </th>

            </tr>

            </thead>

            <tbody>

            @foreach($tickets as $ticket)

                <tr class="border-t">

                    <td class="p-3">
                        {{ $ticket->id }}
                    </td>

                    <td class="p-3">
                        {{ $ticket->title }}
                    </td>

                    <td class="p-3">
                        {{ $ticket->priority->value }}
                    </td>

                    <td class="p-3">
                        {{ $ticket->status->value }}
                    </td>

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