@extends('main')

@section('title',"| Edit Tag")


@section('content')

    {{ Form::model($tag,['route'=>['tags.update',$tag->id] ,'method'=>"PUT"]) }}

    {{ Form::label('name',"Title:" ,['style'=>'margin-top:35px; font-weight:bold;']) }}
    {{ Form::text('name',null,['class'=>'form-control', 'style'=>'margin-top:5px; width:465px;']) }}

        {{ Form::submit('Save Changes', ['class'=>'btn btn-success','style'=>'margin-top:20px; text-align:center; margin-left:175px;'] ) }}
    {{ Form::close() }}

@endsection