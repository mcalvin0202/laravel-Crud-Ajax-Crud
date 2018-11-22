@extends('layout')

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
    @foreach($posts as $post)
        <form action="{{ action('PostController@update', $post->id)}}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label>Name</label>
                <input type="text" class="form-control" value="{{$post->name}}" name="name">
                </div>
            
                <div class="form-group">
                        <label>Detail</label>
                        <textarea type="text" class="form-control" name="detail">{{$post->detail}}</textarea>
                </div>
                    
                <div class="form-group">
                        <label>Author</label>
                        <input type="text" class="form-control" value="{{$post->author}}" name="author">
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
                <a href="{{action('PostController@index')}}" class="btn btn-default">Back</a>
            </form>
    @endforeach
    

@endsection