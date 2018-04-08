<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\Reply;
use Auth;
use Notification;
use Session;
use App\User;

class DiscussionsController extends Controller
{
    public function create()
    {
    	return view('discuss');
    }

    public function store()
    {
    	//dd(request());
    	$this->validate(request(), [
    		'channel_id' => 'required',
    		'title' => 'required',
    		'content' => 'required'
    	]);

    	$discussion = Discussion::create([
    		'user_id' => Auth::id(),
    		'channel_id' => request()->channel_id,
    		'title' => request()->title,
    		'slug' => str_slug(request()->title),
    		'content' => request()->content
    	]);

    	Session::flash('success', 'Discussion successfully created.');


    	//return redirect()->route('discussions.show', ['slug' => $discussion->slug ]);
        return redirect()->route('discussion', ['slug' => $discussion->slug ]);
    }

    public function edit($slug)
    {
        return view('discussions.edit', ['discussion' => Discussion::where('slug', $slug)->first()]);
    }
    
    public function update()
    {
        $this->validate(request(), [
            'content' => 'required'
        ]);

        $discussion = Discussion::find(request()->id);
        $discussion->content = request()->content;
        $discussion->save();

        Session::flash('success', 'Discussion updated');

        return redirect()->route('discussion',['slug' => $discussion->slug ]);
    }


    public function show($slug) 
    {
    	$discussion = Discussion::where('slug', $slug)->first();
        //dd($slug);

        $best_answer = $discussion->replies()->where('best_answer', 1)->first();

    	return view('discussions.show')
                        ->with('discussion', $discussion)
                        ->with('best_answer', $best_answer);
    }

    public function reply($id)
    {
        $discussion = Discussion::findOrFail($id);
        $this->validate(request(), [
            'content' => 'required'
        ]);

        $reply = Reply::create([
            'user_id' => Auth::id(),
            'discussion_id' => $id,
            'content' => request()->content,
        ]);

        $reply->user->points += 20;
        $reply->save();


        

        $watchers = array();
        foreach($discussion->watchers as $watcher)
        {
            array_push($watchers, User::find($watcher->user_id));
        }

        //dd($watchers);
        Notification::send($watchers, new \App\Notifications\NewReplyAdded($discussion));


        Session::flash('success', 'Replied to discussion.');

        return redirect()->back();
    }
}
