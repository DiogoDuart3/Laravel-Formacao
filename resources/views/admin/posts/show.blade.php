@extends('layouts.admin')

@section('content')
    <div class="mt-5">
        <h2 class="title">{{ $post->title }}</h2>
        <p>{{ $post->body }}</p>

        <a href="/admin/posts/{{ $post->id }}/edit" class="btn btn-sm btn-success">Edit</a>

        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
        @if($post->deleted_at)
            {!! Form::submit('Force Delete', ['class' => 'btn btn-sm btn-danger']) !!}
        @else
            {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-warning float-right']) !!}
        @endif
        {!! Form::close() !!}
    </div>
@endsection