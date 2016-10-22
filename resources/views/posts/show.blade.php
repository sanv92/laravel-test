@extends('layouts.web')

@section('content')
    @if ($post)
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <h1 class="panel-heading">{{$post->title}}</h1>

                    <div class="panel-body">

                        Created: {{$post->created_at}} |
                        Editor: {{$post->user->name}} |
                        Category: {{$post->categories->name}}
                        <hr>
                        {{$post->content}}
                        <hr>

                    </div>
                </div>
            </div>
        </div>

        @if (Auth::check())
            @if (Session::has('NEW_COMMENT'))
                <p style="background-color: #ff0000; color: #fff;">{{session('NEW_COMMENT')}}</p>
            @endif
            <div class="row comments">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">

                        <div class="panel-body">

                            <h3>Leave a Comment:</h3>
                            <div>
                                {!! Form::open(['method' => 'POST', 'action' => 'PostCommentsController@store']) !!}
                                    <input type="hidden" name="post_id" value="{{$post->id}}">

                                    <div class="form-group">
                                        {!! Form::label('content', 'Content:') !!}
                                        {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => 3]) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::submit('Create Comment', ['class' => 'btn btn-primary']) !!}
                                    </div>
                                {!! Form::close() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endif


        @if (sizeof($post->comments) > 0)

            @foreach($post->comments as $comment)
                <div class="row comments">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div>
                                    <strong>Created:</strong> {{$comment->created_at}} |
                                    <strong>User:</strong> {{$comment->user->name}}
                                </div>
                                <p>{{$comment->content}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row">
                <div class="col-sm-6 col-sm-offset-5">
                    {{--$post->comments->render()--}}
                </div>
            </div>
        @else
            <div class="row comments">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">

                        <div class="panel-body">No comments ...</div>
                    </div>
                </div>
            </div>
        @endif

    </div>
    @endif
@endsection
