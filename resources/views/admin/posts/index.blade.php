@extends('admin.layouts.app')

@section('content')
    <h1>Posts:index</h1>

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
                <td>{{$post->title}}</td>
                <td>{{$post->content}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
            </tr>
        @endforeach
        </table>
    @endif

@endsection
