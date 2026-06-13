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

        <option value="low">Baixa</option>
        <option value="medium">Média</option>
        <option value="high">Alta</option>

    </select>

    @isset($ticket)

        <select
            name="status"
            class="w-full border rounded p-2">

            <option value="open">Aberto</option>
            <option value="in_progress">Em andamento</option>
            <option value="resolved">Resolvido</option>
            <option value="closed">Fechado</option>

        </select>

    @endisset

</div>