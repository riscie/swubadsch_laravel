@extends('app')
@section('content')
    <h2>Badminton Termine</h2>

    <?php //var_dump($dates); ?>

        <table class="table">
            <tr>
                <th width="250"><strong>Datum</strong></th>
                <?php
                    $today = new DateTime();
                    $today = $today->format('Y-m-d');
                    setlocale(LC_TIME, "de_CH"); //only necessary if the locale isn't already set
                ?>
                @foreach($dates as $date)
                    <td>
                        @if($date->date == $today)
                            Heute
                        @else
                            {{date("D (d.m.Y)",strtotime($date->date))}}
                            {{strftime('%A',strtotime($date->date))}}

                        @endif
                    </td>
                @endforeach

            </tr>

            <tr>
                <th><strong>Teilnehmer</strong></th>
                    @foreach($dates as $date)
                    <td>
                        @foreach($date->users as $user)
                            <span class="glyphicon glyphicon-user"></span>&nbsp;{{$user->name}}<br>
                        @endforeach
                    </td>
                    @endforeach

            </tr>

            <tr>
                <th><strong>Ein- / Austragen</strong></th>
                @foreach($dates as $date)
                    <td>
                        <?php $userParticipates = false; ?>
                        @foreach($date->users as $user)
                            @if($user->id == Auth::user()->id)
                                    {!! Form::open(['method' => 'delete','route' => ['dates.destroy', Auth::user()->id, 'date_id' => $date->id]]) !!}
                                    <button class="btn btn-default signOut">
                                        <span class="glyphicon glyphicon-remove"></span>&nbsp;<strong>&nbsp;austragen</strong>
                                    </button>
                                    {!! Form::close() !!}
                                <?php $userParticipates = true; ?>
                            @endif
                        @endforeach

                        @if(!$userParticipates)
                                {!! Form::open(['method' => 'post','route' => ['dates.store','user_id' => Auth::user()->id, 'date_id' => $date->id]]) !!}
                                <button class="btn btn-default signIn">
                                    <span class="glyphicon glyphicon-ok"></span>&nbsp;<strong>&nbsp;teilnehmen</strong>
                                </button>
                                {!! Form::close() !!}
                        @endif
                    </td>
                @endforeach


            </tr>


            <tr>
                <th><strong>Kommentare</strong></th>
                @foreach($dates as $date)
                <td>
                    @foreach($date->comments as $comment)
                        <b>{{$comment->user->name}}:</b> {{$comment->text}}<br>
                    @endforeach
                </td>
                @endforeach
            </tr>


            <tr>
                <th><strong>Neuer Kommentar</strong></th>
                @foreach($dates as $date)
                    <td>
                        <?php // {!!  Form::open(['route' => ['comments.store', 'date_id' => $date->id,'date_id' => '5', 'user_id' => Auth::user()->id], 'method' => 'POST'])!!} ?>
                        {!! Form::open(['method' => 'post','route' => ['comments.store','user_id' => Auth::user()->id, 'date_id' => $date->id]]) !!}
                        {!! Form::textarea('text', null, ['class' => 'form-control', 'size' => '30x3']) !!}
                        <br>
                        <button type="submit"><span class="glyphicon glyphicon-saved"></span> <strong>Absenden</strong></button>
                        {!! Form::close() !!}
                    </td>
                @endforeach
            </tr>
        </table>

@endsection