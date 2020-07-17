@extends('main')

<?php $titleTag = htmlspecialchars($post['title']); ?>

@section('title',"| $titleTag")

@section('content')
    {!! Html::style('sass/app.scss') !!}

    <div class="row" style="padding-top: 25px;">
        <div class="col-md-8 col-md-offset-2">

            <img src="{{ asset('images'.$post['image']) }}" height="300" width="500"/>
            <h1 style="padding-bottom: 10px;">{{ $post['title'] }}</h1>
            <p>{!! $post['body'] !!}</p>
            <hr>
            <p style="font-weight: lighter;">Category Name: {{$post['category']['name']}}</p>
            <hr>
            <p style="font-weight: lighter;">Posted In: {{$post['category']['created_at']}}</p>
            <hr>
            <p style="font-weight: lighter;">Updated In: {{$post['category']['updated_at']}}</p>


        </div>
    </div>

    <div class="row" style="margin-top: 25px;">
        <div class="col-md-8 col-md-offset-2">

            <h3 class="comments-title"><span style="margin-right:15px; ">
<svg height="40" viewBox="0 0 58 57" width="40" xmlns="http://www.w3.org/2000/svg"><g id="Page-1" fill="none"
                                                                                      fill-rule="evenodd"><g
                id="046---Tying-Chats"><path id="Shape"
                                             d="m40 21h14c2.209139 0 4 1.790861 4 4v20c0 2.209139-1.790861 4-4 4h-3l.69 6.17c.0479682.4247282-.1793133.8329868-.5655965 1.015963-.3862831.1829763-.8461548.1002113-1.1444035-.205963l-6.98-6.98h-21c-2.209139 0-4-1.790861-4-4v-17z"
                                             fill="#3b97d3" fill-rule="nonzero"/><path id="Shape" d="m8 4h-4v4"
                                                                                       stroke="#000"
                                                                                       stroke-linecap="round"
                                                                                       stroke-linejoin="round"
                                                                                       stroke-width="2"/><g
                    fill-rule="nonzero"><path id="Shape"
                                              d="m40 4v20c0 2.209139-1.790861 4-4 4h-21l-6.98 6.98c-.29824873.3061743-.75812038.3889393-1.14440355.205963-.38628317-.1829762-.61356468-.5912348-.56559645-1.015963l.69-6.17h-3c-2.209139 0-4-1.790861-4-4v-20c0-2.209139 1.790861-4 4-4h32c2.209139 0 4 1.790861 4 4z"
                                              fill="#ff5364"/><path id="Shape"
                                                                    d="m54 46h-4c-.5522847 0-1-.4477153-1-1s.4477153-1 1-1h3v-3c0-.5522847.4477153-1 1-1s1 .4477153 1 1v4c0 .5522847-.4477153 1-1 1z"
                                                                    fill="#fff"/><circle id="Oval" cx="9" cy="14"
                                                                                         fill="#fff" r="3"/><circle
                        id="Oval" cx="31" cy="14" fill="#fff" r="3"/><circle id="Oval" cx="20" cy="14" fill="#fff"
                                                                             r="3"/><circle id="Oval" cx="27" cy="35"
                                                                                            fill="#fff" r="3"/><circle
                        id="Oval" cx="49" cy="35" fill="#fff" r="3"/><circle id="Oval" cx="38" cy="35" fill="#fff"
                                                                             r="3"/></g></g></g></svg></span>Comments
                ({{ $post->comments()->count() }}) :
            </h3>
            @foreach($post->comments as $comment)
                <div class="comment" style="margin-bottom: 45px; ">
                    <div class="author-info">
                        <img src="{{ "https://www.gravatar.com/avatar/". md5(strtolower(trim($comment->email)))."?s=50&d=mm" }}"
                             class="author-image"
                             style="width: 50px;height: 50px; border-radius: 50%;float: left;">
                        <div class="author-name" style="float: left; margin-left: 15px;">
                            <h4 style="margin: 5px;"> {{ $comment->name }}:</h4>
                            <p class="author-time"
                               style="font-size:11px; font-style:italic; color: #aaa;">{{date('d, M, Y H:i:s',strtotime($comment->created_at))}}</p>
                        </div>
                    </div>
                    <div class="comment-content"
                         style="clear: both; margin-left:65px; font-size: 16px;line-height: 1.3em; ">
                        {{ $comment->comment }}
                    </div>

                </div>
            @endforeach
        </div>
    </div>

    <div class="row">
        <div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 30px;">
            {{ Form::open(['route'=>['comments.store',$post->id],'method'=>'POST']) }}

            <div class="row">
                <div class="col-md-6" style="font-weight: bold;">
                    {{ Form::label('name',"Name:") }}
                    {{ Form::text('name',null,['class'=>'form-control']) }}
                </div>
                <div class="col-md-6" style="font-weight: bold;">
                    {{ Form::label('email',"Email:") }}
                    {{ Form::text('email',null,['class'=>'form-control']) }}
                </div>

                <div class="col-md-12" style="font-weight: bold;">
                    {{ Form::label('comments',"Comments:") }}
                    {{ Form::textarea('comment',null,['class'=>'form-control','rows'=>'5']) }}

                    {{ Form::submit('Add Comment',['class'=> 'btn btn-success btn-block', 'style'=>'margin-top:15px;','rows'=>'5' ]) }}
                </div>

            </div>
            {{ Form::close() }}
        </div>
    </div>



@endsection