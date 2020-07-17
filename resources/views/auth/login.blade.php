@extends('main')

@section('title' , '|Login')

@section('content')

    <div class="row" style="padding-top: 55px; padding-left: 65px;">
        <div class="col-md-6 col-md-offset-3" style="padding-left: 65px;">
            {!! Form::open() !!}
            <form method="POST" action="login">
                {{ csrf_field() }}



                {{Form::label('email','Email:')}}
                {{ Form::email ('email',null,['class'=> 'form-control','style' =>'width:100vh;'])}}
                <br>
                <div>
                    {{Form::label('password','Password:')}}
                    {{Form::password('password',['class'=>'form-control','style' =>'width:100vh;'])}}
                    <br>

                </div>
                <div style="text-align: center;color: white;">
                    {{Form::submit('Login',['class'=>'btn ' ,'style'=>'background-color:#4376B1; color:white; margin-left:35vh;'])}}
                </div>

                {{--<p style="text-align: center; padding-top: 15px;">--}}
                    {{--<a href="{{url('password/reset')}}">--}}
                        {{--Forget My Password--}}
                    {{--</a>--}}
            </form>

            {!! Form::close() !!}


        </div>
    </div>



@endsection
