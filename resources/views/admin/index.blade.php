@extends('admin.layouts.app')

@section('content')
    <ul>
        <li>
            <a href="{{ url('users') }}">users</a>
        </li>
        <li>
            <a href="{{ url('posts') }}">posts</a>
        </li>
        <li>
            <a href="{{ url('categories') }}">categories</a>
        </li>
    </ul>
@endsection
