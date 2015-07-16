@extends('app')
@section('content')
<h2>Choose your Avatar</h2>

@foreach($avatarPaths as $avatar)
<a href="/avatars/{{$avatar->basename}}"><img height="64" width="64" src="{{ asset('/avatarImages/'.$avatar->basename) }}" class="avatar"></a>
@endforeach


<h3>Upload your own Avatar</h3>

{!! Form::open(['route' => 'avatars.upload', 'files' => true]) !!}
<div class="well">
	<ul>
		<li>Nutze ein quadratisches Bild</li>
		<li>Das Bild muss kleiner als 2MB sein</li>
	</ul>
	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				{!! Form::file('avatar', ['class' => 'file']) !!}
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}

<br><br><b><a href="/">Zurück</a></b>
@endsection
