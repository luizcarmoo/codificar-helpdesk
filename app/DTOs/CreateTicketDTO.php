<?php

namespace App\DTOs;

use App\Http\Requests\StoreTicketRequest;

class CreateTicketDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly string $priority,
        public readonly ?int $responsibleId
    ) {
    }

    public static function fromRequest(StoreTicketRequest $request): self
{
    return new self(
        title: $request->string('title')->value(),
        description: $request->string('description')->value(),
        priority: $request->string('priority')->value(),

        responsibleId: $request->filled('responsible_id')
            ? $request->integer('responsible_id')
            : null,
        );
    }
}