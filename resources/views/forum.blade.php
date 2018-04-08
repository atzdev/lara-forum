@extends('layouts.app')

@section('content')

            @foreach($discussions as $discussion)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <img src="{{ asset($discussion->user->avatar) }}" width="40px" height="40px">&nbsp;&nbsp;
                        <span>{{ $discussion->user->name }}, <b>{{ $discussion->created_at->diffForHumans() }}</b></span>
                        
                        @if($discussion->hasBestAnswer())
                            <span class="btn btn-success btn-xs pull-right">closed</span>

                        @else
                            <span class="btn btn-danger btn-xs pull-right">open</span>
                        @endif
                        <span class="pull-right">&nbsp;&nbsp;</span>
                        <a href="{{ route('discussion', ['slug' => $discussion->slug ]) }}" class="btn btn-default btn-xs pull-right">View more ... </a>
                    </div>
                    <div class="panel-body">
                        <h4 class="text-center">{{ $discussion->id }}. {{ $discussion->title }}</h4> 
                        <p> {{ str_limit($discussion->content, 50) }}</p>
                    </div>
                    <div class="panel-footer">
                        <span>
                            {{ $discussion->replies->count() }} Replies
                        </span>
                        <a href="{{ route('channel', ['slug' => $discussion->channel->slug ]) }}" class="pull-right btn btn-default btn-xs">{{ $discussion->channel->title }}</a>

                    </div>
                </div>
            @endforeach
            <div class="text-center">
                {{ $discussions->links() }}
            </div>
@endsection
