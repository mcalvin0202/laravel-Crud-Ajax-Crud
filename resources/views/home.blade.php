@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                   <div class="form-group">
                   <a href="{{action('CrudController@create')}}">go to Ajax CRUD table</a>
                   </div>
                   <div class="form-group">
                    <a href="{{action('PostController@index')}}">go to CRUD table</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
