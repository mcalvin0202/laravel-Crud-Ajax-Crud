@extends('layouts.app')
@section('content')
    <div class="container">

        @if(session('success'))
            <div class="alert alert-success">
            <strong>{{session('success')}}</strong>
            </div>
        @endif
        
        <p>
        <a href="{{route('formfile')}}" class="btn btn-primary">Upload File</a>
        </p>

        <div class="row">
            @foreach($files as $file)
                <div class="col-md-4">
                    <div class="card">
                       <img class="card-img-top" src="{{'storage/app/'.$file->path}}">
                            <div class="card-body">
                                <strong class="card-title">{{$file->title}}</strong>
                                <p class="card-text">{{$file->description}}</p>
                                <p class="card-text">{{$file->created_at->diffForHumans()}}</p>
                            <form action="{{route('deletefile', $file->id)}}" method="post">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-12">{{ $files->links() }}</div>
                </div>
        </div>
@endsection