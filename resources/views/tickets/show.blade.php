@extends('layouts.app')

@section('content')

<div class="bg-white p-6 rounded">

    <h2 class="text-xl font-bold">
        {{ $ticket->title }}
    </h2>

    <p class="mt-4">
        {{ $ticket->description }}
    </p>

</div>

@endsection