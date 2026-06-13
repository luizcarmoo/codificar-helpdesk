@extends('layouts.app')

@section('content')

<form
    action="{{ route('tickets.store') }}"
    method="POST">

    @csrf

    @include('tickets._form')

    <button
        class="bg-green-500 text-white px-4 py-2 mt-4 rounded">

        Salvar

    </button>

</form>

@endsection