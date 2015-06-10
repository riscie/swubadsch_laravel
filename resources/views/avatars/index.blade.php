@extends('app')
@section('content')
    <h2>Avatars</h2>

    @foreach($avatars as $avatar)
        <img src="{{ asset('/avatarImages/'.$avatar->filename) }}">
    @endforeach

@endsection