@extends('main')

@section('title','| Home')


@section('content')


    <div class="row" style="padding-top: 10px;">
        <div style="margin-top: 15px;margin-bottom: 15px; background-color:#8cfafa54; box-shadow: 5px 7px #c69eff14 ; border-radius:4%;display: inline-block;">
            {{Auth::check() ? "Logged In Successfully" : "Logged Out" }}
        </div>

        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-4">Welcome to My Blog ;) </h1>
                <p class="lead">Thank you so much for visiting.This is my website built with Laravel.Please read my
                    popular post!! </p>
                <hr class="my-4">
                <a class="btn btn-lg" style="background-color:#3d72ac; color: white;" href="#" role="button">Popular
                    Post</a>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-8">
            @foreach($posts as $post)
                <div class="post">
                    <h3>{{$post->title}}</h3>
                    <p>{{substr(strip_tags($post->body),0,299)}} {{ strlen(strip_tags($post->body))>300 ? "..." : ""}}</p>
                    <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
                </div>
                <hr>
            @endforeach
        </div>

        <div class="col-md-3 col-md-offset-1">
            <h2>Sidebar</h2>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        confirm('Hello buddy. Welcome to my website. I hope you have a good time ;) ');
    </script>
@endsection