@extends('layout')

@section('content')
    <div class="card" style="width:350px">
        @foreach($posts as $post)
            <div class="card">
            <img src="https://imgplaceholder.com/420x320/ff7f7f/333333/fa-image?text{{$post->author}}"  class="card-img-top">
            <div class="card-title">{{$post->name}}</div>
                <p class="card-text">{{$post->detail}}</p>
            <a href="{{action('PostController@index')}}" class="btn btn-primary">back</a>
            </div>
        @endforeach
    </div>
@endsection