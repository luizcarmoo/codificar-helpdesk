<?php

namespace App\Services;

use App\Enums\TicketStatus;
use App\Models\Responsible;

class AssignResponsibleService
{
    public function execute(): ?Responsible
    {
        return Responsible::query()

            ->withCount([
                'tickets as open_tickets_count' => function ($query) {
                    $query->whereIn('status', [
                        TicketStatus::OPEN,
                        TicketStatus::IN_PROGRESS,
                    ]);
                }
            ])

            ->orderBy('open_tickets_count')

            ->first();
    }
}