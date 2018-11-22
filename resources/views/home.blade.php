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
                   <a href="{{action('CrudController@create')}}">go to table</a>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
