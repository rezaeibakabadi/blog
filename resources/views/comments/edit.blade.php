@extends('main')

@section('title','| Edit Comment')

@section('content')

    <div class="row" >
        <div class="col-md-8 col-md-offset-2">

    <h1 style="margin-top: 35px;">Edit Comment</h1>

    {{ Form::model($comment,['route'=>['comments.update',$comment->id] ,'method'=>"PUT"]) }}

    {{ Form::label('name',"Name:" ,['style'=>'margin-top:35px; font-weight:bold;']) }}
    {{ Form::text('name',null,['class'=>'form-control','disabled'=>'' , 'style'=>'margin-top:5px; width:100vh;']) }}

    {{ Form::label('email',"Email:" ,['style'=>'margin-top:35px; font-weight:bold;']) }}
    {{ Form::text('email',null,['class'=>'form-control','disabled'=>'' , 'style'=>'margin-top:5px; width:100vh;']) }}

    {{ Form::label('comment',"Comment:" ,['style'=>'margin-top:35px; font-weight:bold;']) }}
    {{ Form::textarea('comment',null,['class'=>'form-control', 'style'=>'margin-top:5px; width:100vh;']) }}

    {{ Form::submit('Update Comment', ['class'=>'btn btn-success','style'=>'margin-top:20px; text-align:center; margin-left:40vh;'] ) }}
    {{ Form::close() }}

        </div>
    </div>
@endsection