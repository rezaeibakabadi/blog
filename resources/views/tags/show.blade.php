@extends('main')

@section('title',"| $tag->name Tag")

@section('content')

    <div style="margin-top: 35px;" class="row">
        <div class="col-md-8">
            <h1> {{ $tag->name }} Tag
                <small style="margin-left: 25px; color: #acacac; font-size: 25px;">{{ $tag->posts()->count() }}Posts
                </small>
            </h1>
        </div>

        <div class="col-md-2">
            <a href="{{ route('tags.edit',$tag->id) }}" class="btn pull-right btn-block"
               style="background-color:#4376B1; margin-top: 8px; color: white;">Edit</a>
        </div>

        <div class="col-md-2">
            {{ Form::open(['route'=>['tags.destroy',$tag->id],'method'=>'DELETE']) }}

            {{Form::submit('Delete',['class'=>'btn btn-danger btn-block','style'=>'margin-top:8px;' ])}}

        {{ Form::close() }}
        </div>

    </div>

    <div class="row" style="margin-top: 35px;">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Tags</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>

                @foreach($tag-> posts as $post)
                    <tr>
                        <th>{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>@foreach($post->tags as $tag)

                                <span class="label label-default"
                                      style="margin-right: 15px; background:#e7e7e7; color: black; border-radius: 10%; padding: 6px; text-align: center; ">{{ $tag->name }}</span>

                            @endforeach
                        </td>
                        <td><a href="{{ route('posts.show',$post->id) }}" class="btn btn-success btn-sm"
                               style="width: 60px; margin: 0px 25px;">View</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection