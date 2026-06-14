<div class="space-y-4">

    <input
        type="text"
        name="title"
        placeholder="Título"
        value="{{ old('title', $ticket->title ?? '') }}"
        class="w-full border rounded p-2">

    <textarea
        name="description"
        class="w-full border rounded p-2"
        rows="5">{{ old('description', $ticket->description ?? '') }}</textarea>

    <select
        name="priority"
        class="w-full border rounded p-2">

        <option
            value="low"
            {{ old('priority', $ticket->priority ?? '') === 'low' ? 'selected' : '' }}>
            Baixa
        </option>

        <option
            value="medium"
            {{ old('priority', $ticket->priority ?? '') === 'medium' ? 'selected' : '' }}>
            Média
        </option>

        <option
            value="high"
            {{ old('priority', $ticket->priority ?? '') === 'high' ? 'selected' : '' }}>
            Alta
        </option>

    </select>

    <select
        name="responsible_id"
        class="w-full border rounded p-2">

        <option value="">
            Automático
        </option>

        @foreach ($responsibles as $responsible)
            <option
                value="{{ $responsible->id }}"
                {{ old('responsible_id', $ticket->responsible_id ?? '') == $responsible->id ? 'selected' : '' }}>
                {{ $responsible->name }}
            </option>
        @endforeach

    </select>

    @isset($ticket)

        <select
            name="status"
            class="w-full border rounded p-2">

            <option
                value="open"
                {{ old('status', $ticket->status) === 'open' ? 'selected' : '' }}>
                Aberto
            </option>

            <option
                value="in_progress"
                {{ old('status', $ticket->status) === 'in_progress' ? 'selected' : '' }}>
                Em andamento
            </option>

            <option
                value="resolved"
                {{ old('status', $ticket->status) === 'resolved' ? 'selected' : '' }}>
                Resolvido
            </option>

            <option
                value="closed"
                {{ old('status', $ticket->status) === 'closed' ? 'selected' : '' }}>
                Fechado
            </option>

        </select>

    @endisset

</div>