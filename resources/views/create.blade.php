@extends('layouts.app')

@section('content')
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

    <form action="{{action('PostController@store')}}" method="post">
   
        {{ csrf_field() }}
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Name" name="name">
        </div>
    
        <div class="form-group">
                <label>Detail</label>
                <textarea type="text" class="form-control" placeholder="Detail" name="detail"></textarea>
        </div>
            
        <div class="form-group">
                <label>Author</label>
                <input type="text" class="form-control" placeholder="Author" name="author">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection