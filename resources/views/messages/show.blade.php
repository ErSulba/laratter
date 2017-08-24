@extends('layouts.app')

@section('content')
    <h1> Mensaje id: {{ $message->id }}</h1>
    <img class="img-thumbnail" src="{{ $message->image }}">
    <p class="card-text">
        {{ $message->content }}
    </p>
@endsection