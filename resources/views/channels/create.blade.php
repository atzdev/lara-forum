@extends('layouts.app')

@section('content')

   
            <div class="panel panel-default">
                <div class="panel-heading">Create a new channel</div>

                <div class="panel-body">
                  <form action="{{ route('channels.store') }}" method="post">
                      {{ csrf_field() }}
                      <div class="form-group row">
                        <label for="channel" class="col-sm-2 col-form-label">Channel</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" name="channel">
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-success" type="submit">Save channel</button>
                        </div>
                      </div>
                  </form>

                </div>
            </div>
        

@endsection
