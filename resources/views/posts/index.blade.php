@extends('layouts.web')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Posts</div>
                </div>
            </div>
        </div>

        @if ($posts)
            @foreach($posts as $post)
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{route('post.show', $post->id)}}">{{$post->title}}</a>
                            {{--<a href="{{route('post.index', 1)}}">{{$post->title}}</a>--}}
                        </div>

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
            @endforeach
        @endif

    </div>
@endsection
