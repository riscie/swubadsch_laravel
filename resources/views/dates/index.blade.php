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
                ?>
                @foreach($dates as $date)
                    <td>
                        @if($date->date == $today)
                            Heute
                        @else
                            <?php // {{date("D (d.m.Y)",strtotime($date->date))}} does not work, nor does {{strftime('%A',strtotime($date->date))}} ?>
                        <?php
                            //This devastating code exists, because I was not able to handle the setlocale on my server so far.
                            //FIXME!
                            switch (strftime('%A',strtotime($date->date))) {
                                case "Monday":
                                    echo "Montag";
                                    break;
                                case "Tuesday":
                                    echo "Dienstag";
                                    break;
                                case "Wednesday":
                                    echo "Mittwoch";
                                    break;
                                case "Thursday":
                                    echo "Donnerstag";
                                    break;
                                case "Friday":
                                    echo "Freitag";
                                    break;
                                case "Saturday":
                                    echo "Samstag";
                                    break;
                                case "Sunday":
                                    echo "Sonntag";
                                    break;
                            }
                        ?>
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
                        @if($comment->user->id == Auth::user()->id)
                            <div class="resultContainer">
                        @endif
                            <b>{{$comment->user->name}}:</b> {{$comment->text}}
                                @if($comment->user->id == Auth::user()->id)
                                <div class="viewThisResult">
                                    {!! Form::open(['method' => 'delete','route' => ['comments.destroy','comment_id' => $comment->id], 'class' => 'commentDeleteForm']) !!}
                                    <button type="submit" class="commentDeleteButton"><a class="mini-listing button"><span class="glyphicon glyphicon-remove-circle"></span></a></button>
                                    {!! Form::close() !!}
                                </div>
                                @endif
                        @if($comment->user->id == Auth::user()->id)
                            </div>
                        @endif

                    @endforeach
                </td>
                @endforeach
            </tr>


            <tr>
                <th><strong>Neuer Kommentar</strong></th>
                @foreach($dates as $date)
                    <td>
                        <?php // {!!  Form::open(['route' => ['comments.store', 'date_id' => $date->id,'date_id' => '5', 'user_id' => Auth::user()->id], 'method' => 'POST'])!!} ?>
                        {!! Form::open(['method' => 'post','route' => ['comments.store','user_id' => Auth::user()->id, 'date_id' => $date->id],'id' => 'commentForm']) !!}
                        {!! Form::textarea('text', null, ['class' => 'form-control', 'size' => '30x3','id' => 'commentText']) !!}
                        <br>
                        <button type="submit"><span class="glyphicon glyphicon-saved"></span> <strong>Absenden</strong></button>
                        {!! Form::close() !!}
                    </td>
                @endforeach
            </tr>
        </table>

@endsection