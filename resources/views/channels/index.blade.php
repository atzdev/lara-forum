@extends('layouts.app')

@section('content')
<!-- <div class="container">-->
    @if(Auth::user()->admin)
            <div class="panel panel-default">
                <div class="panel-heading">Channels
                  <a href="{{ route('channels.create') }}" class="btn btn-primary btn-xs pull-right">New Channel</a>
                </div>

                <div class="panel-body">
                   <table class="table table-hover">
                       <thead>
                           <th>Name</th>
                           <th>Edit</th>
                           <th>Delete</th>
                       </thead>
                       <tbody>
                           @foreach($channels as $channel)

                                <tr>
                                    <td>{{ $channel->title }}</td>
                                    <td><a href="{{ route('channels.edit', ['channel' => $channel->id]) }}" class="btn btn-xs btn-info">Edit</a></td>
                                    <td>
                                        <form action="{{ route('channels.destroy', 
                                        ['channel' => $channel->id ]) }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-xs btn-danger">Destroy</button>
                                        </form>
                                    </td>
                                </tr>
                           @endforeach
                       </tbody>
                   </table>

                </div>
            </div>
    @else
        <div class="panel panel-default">
          <div class="panel-body text-center">
            <h4>Admin area.</h4>
          </div>
        </div>
    @endif
<!-- </div> -->
@endsection
