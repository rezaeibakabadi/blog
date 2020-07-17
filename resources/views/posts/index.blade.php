@extends('main')

@section('title','| All Posts')

@section('content')

    <div class="row" style="padding-top: 25px;">
        <div class="col-md-10">
            <h1>All Posts</h1>
        </div>

        <div class="col-md-2" style="padding-top: 5px;">
            <a href="{{ route('posts.create')   }}" class="btn btn-lg btn-block"
               style="background-color: #4376B1; color: white; width: 180px; font-size: 18px; height: 50px; text-align: center;">
                Create New Post</a>

        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <th>
                    #
                </th>
                <th>Title</th>
                <th>Body</th>
                <th>Created At</th>
                <th></th>
                </thead>
                <tbody>

                @foreach($posts as $post)

                    <tr>
                        <th> {{ $post -> id }}</th>
                        <td style="width: 170px;"> {{ $post -> title }}</td>
                        <td> {{ substr(strip_tags($post->body) , 0,50) }} {{ strlen(strip_tags($post->body)) >800 ? "...":"" }} </td>
                        <td> {{date( 'd, M, Y H:i:s', strtotime($post -> created_at)) }}</td>
                        <td style="padding-top: 18px;"> <a href="{{ route('posts.show' , $post->id) }}" class="btn btn-success" style="width: 60px; margin: 0px 25px;">View</a><a href="{{ route('posts.edit',$post->id) }}" class="btn" style="background-color:#4376B1; color: white; width: 60px;">Edit</a> </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
            <div class="text-center" style="text-align: center; padding-left: 425px;">
                {!! $posts->links(); !!}

            </div>
        </div>
    </div>



@stop