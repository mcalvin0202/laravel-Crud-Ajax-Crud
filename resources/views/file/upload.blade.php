@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="card text-center">
                    <h5 class="card-header">File Upload</h5>
                    <div class="card-body">
                    <form action="{{route('uploadfile')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <input type="file" name="file">
                            </div>
                            <div class="form-froup">
                                <textarea name="description" cols="30" rows="10" placeholder="Description"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        <a href="{{route('viewfile')}}" class="btn btn-success">Back</a>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection