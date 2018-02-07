@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach($blogPosts as $blogPost)
            <div class="panel panel-default">
                <div class="panel-heading">{{$blogPost->title}}<span class="pull-right">By: {{$blogPost->user->name}}</span></div>
                <div class="panel-body">{{$blogPost->content}}}</div>
                <div class="panel-footer">
                    @if(\Illuminate\Support\Facades\Auth::id() == $blogPost->user->id)
                    {!! Form::open(['method' => 'DELETE', 'route' => ['blogposts.destroy', $blogPost->id]]) !!}
                        <button type="submit" class="btn btn-primary">Remove</button>
                    {!! Form::close() !!}
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
