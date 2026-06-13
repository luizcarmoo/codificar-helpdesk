<?php

namespace App\Actions;

use App\DTOs\CreateTicketDTO;
use App\Enums\TicketStatus;
use App\Models\Ticket;
use App\Services\AssignResponsibleService;

class CreateTicketAction
{
    public function __construct(
        private readonly AssignResponsibleService $assignResponsibleService
    ) {
    }

    public function execute(
        CreateTicketDTO $dto
    ): Ticket {

        $responsible = $this->assignResponsibleService->execute();

        return Ticket::create([
            'title' => $dto->title,
            'description' => $dto->description,
            'priority' => $dto->priority,
            'status' => TicketStatus::OPEN,
            'responsible_id' => $responsible?->id,
        ]);
    }
}