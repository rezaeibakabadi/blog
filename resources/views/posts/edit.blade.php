@extends('main')

@section('title','| Edit Blog Post')


@section('stylesheets')


    {!! Html::style('css/select2.min.css') !!}


    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea',
            plugins:'link code',

        });
    </script>

@endsection

@section('content')


    <div class="row" style="padding-top: 25px;">

        {!! Form::model($post ,['route'=>['posts.update',$post->id], 'method'=>'PUT','files'=>'true']) !!}



        <div class="col-md-9 col-md-offset-2" style="width: 1150px;">
            {{ Form::label('title','Title:') }}
            {{ Form::text('title',null,["class" => 'form-control']) }}


            {{ Form::label('slug','Slug:',['class'=>'form-spacing-top']) }}
            {{ Form::text('slug',null,["class" => 'form-control']) }}

            {{ Form::label('category_id',"Category:",['class'=>'form-spacing-top']) }}
            {{ Form::select('category_id',$categories,null,['class'=>'form-control']) }}

            {{ Form::label('tags',"Tags:",['class'=>'form-spacing-top']) }}
            {{ Form::select('tags[]',$tags,null,['class'=>'form-control select2-multi','multiple'=>'multiple']) }}

            {{Form::label('featured_image','Upload Featured Images:',['style'=>'margin-top:25px; font-weight:bold; '])}}<br>
            {{Form::file('featured_image' ,['style'=>'margin:5px 0;'])}}
<hr>
            {{ Form::label('body',"Body:",['class'=>'form-spacing-top']) }}
            {{ Form::textarea('body',null,['class'=>'form-control']) }}

        </div>

        <div class="col-md-12" style="padding-top: 10px; padding-left: 225px; text-align: center;">
            <div class="well"
                 style="background-color:#f3f3f3; border:2px solid gray; width: 350px; height: 250px; border-radius: 5%;">
                <dl class="dl-horizontal" style="padding-top: 5px;  text-align: center;">

                    <label>
                        Created At:

                    </label>

                    <p> {{date('M j, Y H:i:s', strtotime($post -> created_at))}}</p>

                </dl>


                <dl class="dl-horizontal" style="padding: 15px;text-align: center;">

                    <label>

                        Last Updated:

                        <p>{{ date('M j, Y H:i:s' , strtotime($post ->updated_at))  }}</p>

                        <hr>

                        <div class="row">
                            <div class="col-sm-6">

                                {!! Html::linkRoute('posts.show','Cancel',array($post->id),array('class'=> 'btn btn-danger btn-block')) !!}

                            </div>

                            <div class="col-sm-6" style="width: 195px;">
                                {{ Form::submit('Save Changes',['class'=>'btn btn-success btn-block']) }}

                            </div>

                        </div>
                    </label>
                </dl>
            </div>

        </div>

        {!! Form::close() !!}
    </div>

@stop

@section('scripts')

    {!! Html::script('js/select2.min.js') !!}
    <script type="text/javascript">
        $('.select2-multi').select2();
        {{--$('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedids)!!}).trigger('change');--}}
    </script>

@endsection