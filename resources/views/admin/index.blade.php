@extends('admin.layouts.app')

@section('content')
    <ul>
        <li>
            <a href="{{route('admin.users.index')}}">users</a>
        </li>
        <li>
            <a href="{{route('admin.posts.index')}}">posts</a>
        </li>
        <li>
            <a href="{{ url('categories') }}">categories</a>
        </li>
    </ul>
@endsection
