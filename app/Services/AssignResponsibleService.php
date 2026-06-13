<?php

namespace App\Services;

use App\Models\Responsible;

class AssignResponsibleService
{
    public function execute(): ?Responsible
    {
        return Responsible::query()
            ->inRandomOrder()
            ->first();
    }
}