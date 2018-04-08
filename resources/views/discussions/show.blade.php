@extends('layouts.app')

@section('content')

            	<div class="panel panel-default">
                    <div class="panel-heading">
                        <img src="{{ asset($discussion->user->avatar) }}" width="40px" height="40px">&nbsp;&nbsp;
                        <span>{{ $discussion->user->name }} (points: {{ $discussion->user->points }}), <b>{{ $discussion->created_at->diffForHumans() }}</b></span>

                        @if($discussion->hasBestAnswer())
                            <span class="btn btn-success btn-xs pull-right">closed</span>

                        @else
                            <span class="btn btn-danger btn-xs pull-right">open</span>
                        @endif
                        
                        
                        @if(Auth::id() == $discussion->user->id)
                            @if(!$discussion->hasBestAnswer())
                                <a href="{{ route('discussion.edit', ['slug' => $discussion->slug ] )}}" class="btn btn-info btn-xs pull-right" style="margin-right: 8px;">Edit</a>
                            @endif
                        @endif 
                        
                        @if($discussion->is_being_watched_by_auth_user())
                            <a href="{{ route('discussion.unwatch', ['id' => $discussion->id ]) }}" class="btn btn-warning btn-xs pull-right" style="margin-right: 8px;">unwatch</a>
                        @else
                            <a href="{{ route('discussion.watch',['id' => $discussion->id ]) }}" class="btn btn-default btn-xs pull-right" style="margin-right: 8px;">watch</a>
                        @endif
                        
                        

                    </div>
                    <div class="panel-body">
                        <h4 class="text-center">{{ $discussion->title }}</h4> 
                        <hr>
                        <p> 
                            {!! Markdown::convertToHtml($discussion->content) !!}
                        </p>
                        
                        @if($best_answer)
                        <hr>
                            <div style="padding: 40px;">
                                <h4>Best Answer</h4>
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <img src="{{ asset($best_answer->user->avatar) }}" width="40px" height="40px">&nbsp;&nbsp;&nbsp;
                                        <span>{{ $best_answer->user->name }}, 
                                                (points: {{ $best_answer->user->points }}),
                                        </span>
                                    </div>
                                    <div class="panel-body">
                                        {!! Markdown::convertToHtml($best_answer->content) !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="panel-footer">
                        <span>
                            {{ $discussion->replies->count() }} Replies
                        </span>
                        <a href="{{ route('channel', ['slug' => $discussion->channel->slug ]) }}" class="pull-right btn btn-default btn-xs">{{ $discussion->channel->slug }}</a>

                    </div>
                    
                </div>

                @foreach($discussion->replies as $reply)
					<div class="panel panel-default">
	                    <div class="panel-heading">
	                        <img src="{{ asset($reply->user->avatar) }}" width="40px" height="40px">&nbsp;&nbsp;
	                        <span>{{ $reply->user->name }}, 
                                (points: {{ $reply->user->points }}), 
                                <b>{{ $reply->created_at->diffForHumans() }}</b></span>

                            @if(Auth::id() == $reply->user->id)
                                @if(!$reply->best_answer)
                                    <a href="{{ route('reply.edit', ['id' => $reply->id ]) }}" class="btn btn-info btn-xs pull-right">Edit</a> 
                                @endif
                            @endif

                            @if(!$best_answer)
                                @if(Auth::id() == $discussion->user->id)
	                               <a href="{{ route('discussion.best.answer', ['id' => $reply->id ]) }}" class="btn btn-xs btn-info pull-right">Mark as best answer</a> 
                               @endif
                            @endif
	                    </div>
	                    <div class="panel-body">
	                        <p> {!! Markdown::convertToHtml($reply->content) !!}</p>
	                    </div>
	                    <div class="panel-footer">
	                    	<p>
	                    		@if($reply->is_liked_by_auth_user())
	                    			<a href="{{ route('reply.unlike', ['id' => $reply->id ]) }}" class="btn btn-danger btn-xs">Unlike&nbsp;<span class="badge badge-info"> {{ $reply->likes()->count() }}</span></a>
	                    		@else
	                    			<a href="{{ route('reply.like', ['id' => $reply->id ]) }}" class="btn btn-success btn-xs">Like&nbsp;<span class="badge badge-light"> {{ $reply->likes()->count() }}</span></a>
	                    		@endif
	                    		
	                    	</p>
	                    </div>
	                    
	                </div>
                @endforeach
       
                <div class="panel panel-default">
                	<div class="panel-heading">
<label for="reply">Leave a reply...</label>
                	</div>
                	<div class="panel-body">
                        @if(Auth::check())
                		<form action="{{ route('discusion.reply', ['id' => $discussion->id ]) }}" method="post"> 
                			{{ csrf_field() }}
                			<div class="form-group">

                				<textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
                			</div>
                			<div class="form-group">
                				<button type="submit" class="btn btn-primary pull-right">Leave a reply</button>
                			</div>
                		</form>
                        @else
                            <div class="text-center">
                                <h2>Sign in to leave a reply</h2>
                            </div>
                        @endif
                	</div>

                </div>

@endsection
