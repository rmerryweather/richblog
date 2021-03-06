<div class="panel panel-default">
    <div class="panel-heading">{{$blogpost->title}}<span class="pull-right">{{date('d-m-Y', strtotime($blogpost->created_at))}} By: {{$blogpost->user->name}}</span></div>
    <div class="panel-body">
        @if(Route::currentRouteName() == 'blogposts.show')
            {!! nl2br(e($blogpost->content)) !!}
        @else
            {!! str_limit(nl2br(e($blogpost->content)), 256) !!}
        @endif
    </div>
    <div class="panel-footer">
        <div class="row">
            @if(\Illuminate\Support\Facades\Auth::id() == $blogpost->user->id || (\Illuminate\Support\Facades\Auth::user() && \Illuminate\Support\Facades\Auth::user()->admin))
                {!! Form::open(['method' => 'DELETE', 'route' => ['blogposts.destroy', $blogpost->id]]) !!}
                <div class="col-xs-1"><button type="submit" class="btn btn-danger btn-sm">Delete</button></div>
                {!! Form::close() !!}
                <div class="col-xs-1"><a href="{{route('blogposts.edit', $blogpost)}}" class="btn btn-primary btn-sm">Edit</a></div>
            @endif
            @if(Route::currentRouteName() != 'blogposts.show')
                <div class="col-xs-1"><a href="{{route('blogposts.show', $blogpost)}}" class="btn btn-primary btn-sm">View</a></div>
            @else
                <div class="col-xs-1"><a href="{{route('home')}}" class="btn btn-primary btn-sm">Back</a></div>
            @endif
        </div>
    </div>
</div>

;
