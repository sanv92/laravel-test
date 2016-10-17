@extends('admin.layouts.app')

@section('content')
    <h1>Admin:create</h1>
    @include('includes.form_error')
    {!! Form::open(['method' => 'POST', 'action' => 'AdminUsersController@store', 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('role', 'Role:') !!}
            @if($roles)
                {!! Form::select('role_id', $roles, null, ['class' => 'form-control']) !!}
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('active', 'Active:') !!}
            {!! Form::select('is_active', [true => 'Active', false => 'Not Active'], null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('file', 'File:') !!}
            {!! Form::file('file', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create Post', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection
