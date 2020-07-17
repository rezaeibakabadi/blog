@extends('main')

@section('title' , '| View Post')

@section('content')

    <div class="row" style="padding-top: 25px;">
        <div class="col-md-8">

            <img src="{{ asset('images'.$post->image) }}" alt="THIS IS PHOTO POST" width="600" height="300"/>

            <h1> {{ $post-> title }} </h1>

            <div class="lead">

                {!!   $post ->body !!}
            </div>
            <hr>

            <div class="tags">
                @foreach($post->tags as $tag)

                    <span class="label label-default"
                          style="margin-right: 15px; background:#e7e7e7; color: black; border-radius: 10%; padding: 6px; text-align: center; ">
                        {{ $tag->name }}
                    </span>

                @endforeach
            </div>
        </div>

        <div class="col-md-4">
            <div class="well"
                 style="background-color:#f3f3f3; border:2px solid gray; width: 350px; border-radius: 5%; ">

                <dl class="dl-horizontal" style="padding-top: 15px;  text-align: center;">

                    <label>
                        Url Slug: </label>
                    <p><a href=" {{route('blog.single', $post ->slug)}} ">{{url($post['slug'])}}</a></p>


                </dl>
                <dl class="dl-horizontal" style="font-weight:bold;padding-top: 15px;  text-align: center;">

                    <label>Category: </label>
                    <p> {{ $post->category->name }} </p>

                </dl>

                <dl class="dl-horizontal" style="padding-top: 15px;  text-align: center;">

                    <label style="font-weight: bold;">
                        Created At:
                        <p> {{date('M j, Y H:i:s', strtotime($post -> created_at))}}</p>

                    </label>
                </dl>

                <dl class="dl-horizontal" style="text-align: center;">

                    <label style="font-weight: bold;">
                        Last Updated:
                        <p>{{ date('M j, Y H:i:s' , strtotime($post ->updated_at))  }}</p>

                        <hr>
                        <div class="row">
                            <div class="col-sm-6">

                                {!! Html::linkRoute('posts.edit','Edit',array($post->id),array('class'=> 'btn btn-primary btn-block')) !!}

                            </div>
                            <div class="col-sm-6" style="width: 155px;">

                                {!! Form::open(['route'=>['posts.destroy' , $post -> id] , 'method'=>'DELETE']) !!}

                                {!! Form::submit('Delete',['class'=>'btn btn-danger btn-block']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <div class="row" style="padding-left: 45px; text-align: center; margin-top: 15px;">
                            <col-md-12>
                                {{Html::linkRoute('posts.index','<<See All Posts>>',array(),['class'=>'btn btn-light btn-block btn-h1-spacing' ])}}
                            </col-md-12>
                        </div>
                    </label>
                </dl>
            </div>

        </div>
    </div>

    <div id="backend-comments"  style="margin-top: 50px;">
        <h3>Comments
            <small>{{ $post->comments()->count() }} total</small>
        </h3>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Comment</th>
                <th width="70px"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($post->comments as $comment)
                <tr>
                    <td>{{$comment->name}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->comment}}</td>
                    <td>
                        <a href="{{ route('comments.edit',$comment->id)}}" class="btn btn-sm btn-primary"
                           style="margin: 8px 0;">
                            <svg id="Capa_1" enable-background="new 0 0 512.002 512.002" height="20"
                                 viewBox="0 0 512.002 512.002" width="20" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path d="m448.362 63.64-63.64-63.64-74.246 74.247 53.034 137.886z"
                                          fill="#ff3e3a"/>
                                    <path d="m448.362 63.64-116.672 116.673 106.066 21.213 74.246-74.246z"
                                          fill="#cc3245"/>
                                    <path d="m34.216 406.504-34.216 105.497 112.284-69.856z" fill="#373e9f"/>
                                    <path d="m.002 512.001 105.497-34.215-14.428-56.854z" fill="#340d66"/>
                                    <path d="m188.374 366.055-127.279-42.426-26.879 82.875 35.641 35.641z"
                                          fill="#ffe7b5"/>
                                    <path d="m69.857 442.145 35.642 35.641 82.874-26.878-21.213-106.066z"
                                          fill="#ffd06a"/>
                                    <path d="m124.734 387.269 63.639 63.639 249.383-249.382-63.64-63.639-166.169 81.316z"
                                          fill="#ff9a27"/>
                                    <path d="m41.266 185.758h352.679v90h-352.679z" fill="#ffb820"
                                          transform="matrix(.707 -.707 .707 .707 -99.435 221.458)"/>
                                </g>
                            </svg>
                        </a>

                        <a href="{{ route('comments.delete',$comment->id)}}" class="btn btn-sm btn-danger">

                            <svg id="Layer_1_1_" enable-background="new 0 0 64 64" height="20" viewBox="0 0 64 64"
                                 width="20" xmlns="http://www.w3.org/2000/svg"><path
                                        d="m14.296 25.248 4.475 34.013c.131.995.979 1.739 1.983 1.739h22.492c1.004 0 1.852-.744 1.983-1.739l3.455-26.261 1.316-10h-33.456z"
                                        fill="#57a5ff"/><path
                                        d="m30 31v22c0 1.105.895 2 2 2s2-.895 2-2v-22c0-1.105-.895-2-2-2s-2 .895-2 2z"
                                        fill="#f2f8ff"/><path
                                        d="m22 31v22c0 1.105.895 2 2 2s2-.895 2-2v-22c0-1.105-.895-2-2-2s-2 .895-2 2z"
                                        fill="#f2f8ff"/><path
                                        d="m38 31v22c0 1.105.895 2 2 2s2-.895 2-2v-22c0-1.105-.895-2-2-2s-2 .895-2 2z"
                                        fill="#f2f8ff"/><path d="m30 17 4 2h5l-2-5-4-1z" fill="#004fa8"/><path
                                        d="m48 10-5 1v2l1 4 8-1-3-4z" fill="#004fa8"/><path
                                        d="m30.172 3.716c-.781-.781-2.047-.781-2.828 0l-22.628 22.627c-.781.781-.781 2.047 0 2.828l2.828 2.829 25.456-25.456z"
                                        fill="#57a5ff"/><path
                                        d="m45.229 59.261.391-2.973c-12.834-4.507-21.688-17.063-20.897-31.305l.11-1.983h-8.289l-2.248 2.248 4.475 34.013c.131.995.979 1.739 1.983 1.739h22.492c1.004 0 1.852-.744 1.983-1.739z"
                                        fill="#303030" opacity=".12"/><path
                                        d="m27.029 8.971-21.257 21.257 1.772 1.772 25.456-25.456-2.828-2.828c-.781-.781-2.047-.781-2.828 0l-.314.314c1.364 1.364 1.364 3.576-.001 4.941z"
                                        fill="#303030" opacity=".12"/><path
                                        d="m49 12-1-2-1.818.364.818 1.636 3 4-6.061.758.061.242 8-1z" fill="#303030"
                                        opacity=".12"/><path d="m35 15 1.6 4h2.4l-2-5-4-1-.947 1.263z" fill="#303030"
                                                             opacity=".12"/><path
                                        d="m10.373 20.686-2.121-2.121c-1.17-1.169-1.17-3.073 0-4.243l7.071-7.071c1.169-1.17 3.072-1.171 4.243 0l2.121 2.121-1.414 1.414-2.121-2.121c-.39-.39-1.025-.389-1.415 0l-7.071 7.071c-.39.39-.39 1.024 0 1.415l2.121 2.121z"
                                        fill="#57a5ff"/><g fill="#004fa8"><path d="m44 2h2v2h-2z"/><path
                                            d="m54.022 9.793-1.219-1.586c2.667-2.05 6.089-2.848 9.393-2.188l-.392 1.961c-2.734-.545-5.571.115-7.782 1.813z"/><path
                                            d="m57 12h2v2h-2z"/><path
                                            d="m50 7h-2c0-2.757 2.243-5 5-5v2c-1.654 0-3 1.346-3 3z"/></g></svg>

                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>

@endsection