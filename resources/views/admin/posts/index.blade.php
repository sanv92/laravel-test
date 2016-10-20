@extends('admin.layouts.app')

@section('content')
    <h1>Posts:index</h1>

    @if (Session::has('DELETED_POST'))
        <p style="background-color: #ff0000; color: #fff;">{{session('DELETED_POST')}}</p>
    @endif

    @if ($posts)
        <table class="table">
            <tr>
                <th>ID</th>
                <th>user_id</th>
                <th>category_id</th>
                {{--<th>photo_id</th>--}}
                <th>title</th>
                <th>content</th>
                <th>created_id</th>
                <th>updated_id</th>
            </tr>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->categories->name}}</td>
                {{--<td>{{$post->photo_id}}</td>--}}
                <td>
                    <a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a>
                </td>
                <td>{{$post->content}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
            </tr>
        @endforeach
        </table>
    @endif

@endsection
