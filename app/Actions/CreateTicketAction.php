<?php

namespace App\Actions;

use App\DTOs\CreateTicketDTO;
use App\Enums\TicketStatus;
use App\Models\Ticket;
use App\Services\AssignResponsibleService;

class CreateTicketAction
{
    public function __construct(
        private AssignResponsibleService $assignResponsibleService
    ) {}

    public function execute(CreateTicketDTO $dto): Ticket
    {
        $responsibleId = $dto->responsibleId;

        // dd($dto);

        // Se não veio responsável, usa regra automática
        if (!$responsibleId) {
            $responsible = $this->assignResponsibleService->execute();
            $responsibleId = $responsible?->id;
        }

        return Ticket::create([
            'title' => $dto->title,
            'description' => $dto->description,
            'priority' => $dto->priority,
            'status' => 'open',
            'responsible_id' => $responsibleId,
        ]);
    }
}