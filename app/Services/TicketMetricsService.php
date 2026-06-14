<?php

namespace App\Services;

use App\Enums\TicketStatus;
use App\Models\Ticket;

class TicketMetricsService
{
    public function execute(): array
    {
        return [
            'total' => Ticket::count(),

            'open' => Ticket::where(
                'status',
                TicketStatus::OPEN
            )->count(),

            'in_progress' => Ticket::where(
                'status',
                TicketStatus::IN_PROGRESS
            )->count(),

            'resolved' => Ticket::where(
                'status',
                TicketStatus::RESOLVED
            )->count(),
        ];
    }
}