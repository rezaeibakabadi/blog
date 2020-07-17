@extends('main')

@section('title','| Register')

@section('content')

    <div class="row" style="padding-top: 55px;">
        <div class="col-md-6 col-md-offset-3" style="padding-left: 65px;">

            {!! Form::open() !!}

            {{ csrf_field() }}

            {{Form::label('name',"Name:")}}
            {{ Form::text ('name',null,['class'=> 'form-control'])}}

            <br>
            {{Form::label('username',"UserName:")}}
            {{ Form::text ('username',null,['class'=> 'form-control'])}}

            <br>
            {{Form::label('email','Email:')}}
            {{ Form::email ('email',null,['class'=> 'form-control'])}}
            <br>
            <div>
                {{Form::label('password','Password:')}}
                {{Form::password('password',['class'=>'form-control'])}}
                <br>

            </div>
            <div style="text-align: center;color: white;">
                {{Form::submit('Register',['class'=>'btn ' ,'style'=>'background-color:#4376B1; color:white;'])}}
            </div>


            {!! Form::close() !!}


        </div>
    </div>



@endsection
