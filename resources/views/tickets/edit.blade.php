@extends('layouts.app')

@section('content')

<form
    action="{{ route('tickets.update', $ticket) }}"
    method="POST">

    @csrf
    @method('PUT')

    @include('tickets._form')

    <button
        class="bg-blue-500 text-white px-4 py-2 mt-4 rounded">

        Atualizar

    </button>

</form>

@endsection