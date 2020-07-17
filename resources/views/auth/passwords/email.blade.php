@extends('main')

@section('title','| Forgot My Password')

@section('content')

    <div class="row" style="padding-top: 35px; padding-left: 368px;">

        <div class="col-md-6 col-md-offset-3" style="; ">

            <div class="panel panel-primary" style="background-color:#fafafa;">
                <div class="panel-header" style="text-align: center;background-color:#efefef; height: 45px; padding-top: 9px;">
                    Reset Password
                </div>

                <div class="panel-body" style="padding-top: 20px; text-align: center;">
                    {!! Form::open(['url'=>'password/email','method'=>"POST"]) !!}

                    {{Form::label('email','Email Address:')}}
                    {{Form::email('email',null,['class'=>'form-control'])}}

                    {{Form::submit('Reset Password',['class'=>'btn btn-primary' ,'style'=>'margin-top:25px; margin-bottom:15px;'])}}

                    {!! Form::close() !!}
                </div>

            </div>

        </div>

    </div>


@endsection