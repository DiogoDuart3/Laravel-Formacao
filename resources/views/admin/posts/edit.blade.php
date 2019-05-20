@extends('layouts.admin')

@section('content')
    <div class="mt-5">
        {!! Form::model($post,['method'=>'PATCH','action'=>['PostController@update',$post->id]]) !!}
        <div class="form-group">
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::textArea('body', null, ['class' => 'form-control']) !!}
        </div>
        @include('layouts.errors')
        {!! Form::submit('edit', ['class' => 'btn btn-sm btn-success']) !!}
        {!! Form::close() !!}
        <a href="/admin/posts/{{ $post->id }}" class="btn btn-sm btn-primary">Voltar</a>
    </div>
@endsection