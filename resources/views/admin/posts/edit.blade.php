@extends('admin.layouts.app')

@section('content')
    <h1>Admin:create</h1>
    @include('includes.form_error')
    {!! Form::model($post, ['method' => 'PATCH', 'action' => ['AdminPostsController@update', $post->id], 'files' => true]) !!}
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category_id', 'Category:') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content', 'Content:') !!}
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Edit Post', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::model($post, ['method' => 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id]]) !!}
    <div class="form-group">
        {!! Form::submit('Delete -> post', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection
