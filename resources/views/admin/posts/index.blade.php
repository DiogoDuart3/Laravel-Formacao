@extends('layouts.admin')
@section('title', 'Admin - Posts')

@section('content')
    @if(session()->has('message'))
        {{ session()->get('message') }}
    @endif
    <form></form>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">User Id</th>
            <th scope="col">Title</th>
            <th scope="col">Body</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                @if($post->deleted_at)
                    <th scope="row">{{ $post->user_id }}(Deleted)</th>
                @else
                    <th scope="row">{{ $post->user_id }}</th>
                @endif
                <td>{{ $post->title }}</td>
                <td>{{ substr($post->body, 0, 40) }}...</td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
                <td><a href="/admin/posts/{{ $post->id }}">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection