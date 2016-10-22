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

        <div class="row comments">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-body">

                        [comments]

                    </div>
                </div>
            </div>
        </div>

    </div>
    @endif
@endsection
