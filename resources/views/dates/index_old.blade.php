@extends('app')
@section('content')
    <h2>Badminton Termine</h2>

    <?php //var_dump($dates); ?>

        <table class="table">
            <tr>
                <th width="250"><strong>Datum</strong></th>
                @foreach($period as $day)
                    <td>

                        @if($day == $today->format('d.m.Y'))
                        Heute
                        @else
                        {{$days}}
                        @endif
                    </td>
                    @endforeach

            </tr>

            <tr>
                <th><strong>Teilnehmer</strong></th>
                @foreach($period as $day)
                    <td>
                            @foreach($dates as $date)
                                @if($date->date == $day->format('Y-m-d'))
                                <span class="glyphicon glyphicon-user"></span>&nbsp;{{$date->user->name}}<br>
                                @endif
                            @endforeach
                    </td>
                @endforeach
            </tr>

            <tr>
                <th><strong>Ein- / Austragen</strong></th>
                @foreach($date as $day)
                    asdf
                @endforeach


                @foreach($period as $day)
                    <?php $userParticipates = false; ?>
                        @foreach($dates as $date)
                            @if($date->date == $day->format('Y-m-d'))
                                @if($date->user->id == 1)
                                    <?php
                                    $userParticipates = true;
                                    ?>
                                        <td>
                                        {!!  Form::open(['route' => ['dates.destroy', $date->id], 'method' => 'DELETE'])!!}
                                        <button class="btn btn-default signOut">
                                            <span class="glyphicon glyphicon-remove"></span>&nbsp;<strong>&nbsp;austragen</strong>
                                        </button>
                                        {!! Form::close() !!}
                                        </td>
                                @endif
                            @endif
                        @endforeach





                        @if(!$userParticipates)
                            <td>
                                {!!  Form::open(['route' => ['dates.store', 'date' => $day->format('Y-m-d'), 'user_id' => Auth::user()->id], 'method' => 'POST'])!!}
                                <button class="btn btn-default signIn">
                                <span class="glyphicon glyphicon-ok"></span>&nbsp;<strong>&nbsp;teilnehmen</strong>
                                </button>
                                {!! Form::close() !!}
                            </td>
                        @else

                        @endif


                @endforeach
            </tr>


            <tr>
                <th><strong>Kommentare</strong></th>
                @foreach($period as $day)
                    <td>
                        @foreach($dates as $date)
                            @if($date->date == $day->format('Y-m-d'))
                                @foreach($date->comments as $comment)
                                   <b>{{$comment->user->name}}:</b> {{$comment->text}}<br>
                                @endforeach

                            @endif
                        @endforeach
                    </td>
                @endforeach
            </tr>


            <tr>
                <th><strong>Neuer Kommentar</strong></th>
                @foreach($period as $day)
                    <td>
                        {!!  Form::open(['route' => ['comments.store', 'date_id' => $day->format('Y-m-d'),'date_id' => '5', 'user_id' => Auth::user()->id], 'method' => 'POST'])!!}
                        {!! Form::textarea('text', null, ['class' => 'form-control', 'size' => '30x3']) !!}
                        <br>
                        <button type="submit"><span class="glyphicon glyphicon-saved"></span> <strong>Absenden</strong></button>
                        {!! Form::close() !!}
                    </td>
                @endforeach
            </tr>
        </table>

@endsection