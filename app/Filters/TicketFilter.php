<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class TicketFilter
{
    public function apply(
        Builder $query,
        array $filters
    ): Builder {

        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (!empty($filters['priority'])) {
            $query->where('priority', $filters['priority']);
        }

        if (!empty($filters['responsible_id'])) {
            $query->where(
                'responsible_id',
                $filters['responsible_id']
            );
        }

        return $query;
    }
}