<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\Channel;
use Auth;
use Illuminate\Pagination\Paginator;

class ForumsController extends Controller
{
    public function index()
    {
    	//$discussions = Discussion::orderBy('created_at', 'desc')->paginate(5);
        switch (request('filter')) {
            case 'me':
                $results = Discussion::orderBy('created_at', 'desc')
                            ->where('user_id',Auth::id())
                            ->paginate(5);
                            //dd($results);
                break;
            case 'solved':

                $answered = array();
                foreach(Discussion::all() as $discussion)
                    {
                        if($discussion->hasBestAnswer())
                        {
                            array_push($answered, $discussion->id);
                        }
                    }

                    //dd($answered);
                    $results = Discussion::orderBy('id','desc')->whereIn('id', $answered)->paginate(5);
                    //$results = new Paginator(Discussion::where('id',$answered), 5);
                    //dd($results);
                break;
            case 'unsolved':
                    $unanswered = array();
                    foreach(Discussion::all() as $discussion)
                    {
                        if(!$discussion->hasBestAnswer())
                        {
                            array_push($unanswered, $discussion->id);    
                        }
                    }

                    $results = Discussion::orderBy('id', 'desc')
                                ->whereIn('id', $unanswered)
                                ->paginate(5);

                    break;
            default:
                $results = Discussion::orderBy('created_at', 'desc')->paginate(5);
                break;
        }
    	return view('forum', ['discussions' => $results ]);
    }

    public function channel($slug)
    {
        //echo $slug;
    	$channel = Channel::where('slug', $slug)->first();
        $discussions = $channel->discussions()->paginate(5);
        //dd($channel);

        return view('channel')->with('discussions', $discussions);
        //return view('channel')->with('discussions', $channel->discussions()->paginate(5));

    	//dd($channel);
        //return view('channel')->with('channel', $channel)->with('discussions', $channel->discussions());
        //return view('channel')->with('channel', $channel)->with('discussions', $channel->discussions);
    }
}
