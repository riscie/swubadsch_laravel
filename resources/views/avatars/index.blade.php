@extends('app')
@section('content')
    <h2>Choose your Avatar</h2>

                @foreach($avatarPaths as $avatar)
                    <a href="/avatars/{{$avatar->basename}}"><img height="64" src="{{ asset('/avatarImages/'.$avatar->basename) }}" class="avatar"></a>
                @endforeach

    <br><br><b><a href="/">Zurück</a></b>
@endsection