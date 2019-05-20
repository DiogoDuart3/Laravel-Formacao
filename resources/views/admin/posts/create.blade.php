@extends('layouts.admin')

@section('content')
    {!! Form::model($post, ['action'=>'PostController@store']) !!}
    <div class="form-group">
        {!! Form::text('title', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::textArea('body', '', ['class' => 'form-control']) !!}
    </div>
    @include('layouts.errors')
    {!! Form::submit('Criar Post', array('class' => 'btn btn-sm btn-primary')) !!}
    {!! Form::close() !!}
@endsection