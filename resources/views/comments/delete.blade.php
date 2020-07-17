@extends('main')

@section('title' , '| DELETE COMMENT?')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">


            <h1 style="margin-top: 75px;">DELETE THIS COMMENT?</h1>

            <p style="margin: 35px 0 ;">
                <strong>Name:</strong> {{ $comment->name }}<br>
                <strong>Email:</strong> {{ $comment->email }}<br>
                <strong>Comment:</strong> {{ $comment->comment }}
            </p>

            {{ Form::open(['route'=>['comments.destroy',$comment->id],'method'=>'delete']) }}

            {{ Form::submit('YES DELETE THIS COMMENT',['class'=>'btn btn-lg btn-danger','style'=>'margin-top:20px; text-align:center; margin-left:10vh;']) }}

            {{ Form::close() }}
        </div>
    </div>



@endsection