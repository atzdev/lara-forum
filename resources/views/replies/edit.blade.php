@extends('layouts.app')

@section('content')

<div class="panel panel-default">
                	<div class="panel-heading">
<label for="reply">Edit a reply</label>
                	</div>
                	<div class="panel-body">
                        @if(Auth::id() == $reply->user_id)
                		<form action="{{ route('reply.update', ['id' => $reply->id ]) }}" method="post"> 
                			{{ csrf_field() }}
                            {{ method_field('PUT') }}
                			<div class="form-group">

                				<textarea name="content" id="content" class="form-control" cols="30" rows="10">{{ $reply->content }}</textarea>
                			</div>
                			<div class="form-group">
                				<button type="submit" class="btn btn-primary pull-right">Update a reply</button>
                			</div>
                		</form>
                        @else
                            <div class="text-center">
                                <h2>Update only your reply</h2>
                            </div>
                        @endif
                	</div>

                </div>

@endsection