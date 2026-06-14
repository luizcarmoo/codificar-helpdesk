<?php

namespace App\Http\Controllers;

use App\Enums\TicketStatus;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Responsible;
use App\Models\Ticket;
use App\Actions\CreateTicketAction;
use App\DTOs\CreateTicketDTO;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('responsible')
            ->latest()
            ->paginate(10);

        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('tickets.create', [
            'responsibles' => Responsible::all()
        ]);
    }

    public function store(
        StoreTicketRequest $request,
        CreateTicketAction $action
    )
{
    $action->execute(
        CreateTicketDTO::fromRequest($request)
    );

    return redirect()
        ->route('tickets.index')
        ->with('success', 'Chamado criado com sucesso.');
}

    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', [
            'ticket' => $ticket,
            'responsibles' => Responsible::all()
        ]);
    }

    public function update(
        UpdateTicketRequest $request,
        Ticket $ticket
    ) {
        $ticket->update($request->validated());

        return redirect()
            ->route('tickets.index')
            ->with('success', 'Chamado atualizado.');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()
            ->route('tickets.index')
            ->with('success', 'Chamado removido.');
    }
}   