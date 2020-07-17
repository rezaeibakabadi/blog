@extends('main')

@section('title','| All Tags')

@section('content')


    <div class="row" style="padding-top: 25px;">
        <div class="col-md-8">
            <h1>Tags</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>

                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <th>{{ $tag->id }}</th>
                        <td><a href="{{ route('tags.show' , $tag->id) }}"> {{ $tag->name }}  </a></td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-3"style="background-color:#efefef; border-radius: 5%; height: 265px;">
            <div class="well" >
                {!! Form::open(['route'=>'tags.store', 'method'=>'POST']) !!}

                <h2 style="padding: 20px;">New Tag</h2>
                {{Form::label('name','Name:')}}
                {{Form::text('name',null,['class'=>'form-control'])}}

                {{ Form::submit('Create New Tag',['class'=>'btn btn-block', 'style'=>'background-color:#4376B1; margin-top:15px; color:white;']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection