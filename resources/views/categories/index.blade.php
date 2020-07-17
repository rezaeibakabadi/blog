@extends('main')

@section('title','| All Categories')

@section('content')


    <div class="row" style="padding-top: 25px;">
        <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>

                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                <tr>
                    <th>{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>

                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-3"style="background-color:#efefef; border-radius: 5%; height: 265px; ">
            <div class="well" >
                {!! Form::open(['route'=>'categories.store', 'method'=>'POST']) !!}

                <h2 style="padding: 20px; ">New Category</h2>
                {{Form::label('name','Name:')}}
                {{Form::text('name',null,['class'=>'form-control'])}}

                {{ Form::submit('Create New Category',['class'=>'btn btn-block', 'style'=>'background-color:#4376B1; margin-top:15px; color:white;']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@endsection