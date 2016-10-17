@if(sizeof($errors))
    <ul class="alert alert-danger">
        @foreach($errors->all() as $key => $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif