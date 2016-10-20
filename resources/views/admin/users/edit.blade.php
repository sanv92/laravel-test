@extends('admin.layouts.app')

@section('content')
    <h1>Admin:create</h1>
    @include('includes.form_error')
    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminUsersController@update', $user->id], 'files' => true]) !!}
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
        {!! Form::submit('Update Post', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::model($user, ['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}
    <div class="form-group">
        {!! Form::submit('Delete -> user', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@endsection
