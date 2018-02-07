@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Post <a class="btn btn-primary btn-xs pull-right" href="{{ route('home') }}"> Back</a></div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {!! Form::open(array('route' => 'blogposts.store','method'=>'POST')) !!}
                        @include('blogpost.form')
                        {!! Form::close() !!}
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection