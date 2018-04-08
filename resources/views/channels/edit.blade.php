@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading">Edit channel: {{ $channel->title }}</div>

                <div class="panel-body">
                  <form action="{{ route('channels.update', ['channel' => $channel->id]) }}" method="post">
                  
                      {{ csrf_field() }}
                      {{ method_field('patch') }}
                      <div class="form-group row">
                        <label for="channel" class="col-sm-2 col-form-label">Channel</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" name="channel" value="{{ $channel->title }}">
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-success" type="submit">Update channel</button>
                        </div>
                      </div>
                  </form>

                </div>
            </div>
        

@endsection
