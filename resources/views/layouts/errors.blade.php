@if(count($errors))
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            {{$error}}
            @endforeach
    </div>
@endif