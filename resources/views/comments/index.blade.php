@extends('app')
@section('content')
    <h2>Comments</h2>
    @if ( !$comments->count() )
        You have no comments
    @else
        @foreach($comments as $comment)
            <li>
                {{$comment->text}}
            </li>
        @endforeach
    @endif
@endsection