<?php

namespace App\Http\Controllers;

use App\Notifications\MyEmailNotification;
use App\Post;
use Composer\XdebugHandler\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\String\s;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $posts = Post::where('author_id', Auth::id())->get();
        return view('posts.index', compact('posts'));
}


    public function first()
    {
        $posts = Post::where([
            'group_id' => '1',
        'author_id'=> Auth::id()]) ->get();
        return view('posts.index', compact('posts'));
    }

    public function second()
    {

        $posts = Post::where([
            'group_id' => '2',
            'author_id'=> Auth::id()]) ->get();        return view('posts.index', compact('posts'));
    }

    public function third()
    {
        $posts = Post::where([
            'group_id' => '3',
            'author_id'=> Auth::id()]) ->get();

            return view('posts.index', compact('posts'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

             $request->validate([
            'label'=>'required|max:255',
            'checked'=>'required',
            'group_id'=>'required'
        ]);
        $post = new Post([
            'label' => $request->get('label'),
            'checked' => $request->get('checked'),
            'group_id' => $request->get('group_id'),
            'author_id' => Auth::id()

        ]);
        $post ->save();
            return redirect ('/posts')->with('success', 'GOOD');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $post = Post::find($id);

         return view('posts.show', compact('post'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'label'=>'required|max:255',
            'checked'=>'required',
            'group_id'=>'required'
        ]);

        $post = Post::find($id);
        $post-> label = $request->get('label');
        $post-> checked = $request->get('checked');


        $post-> group_id= $request->get('group_id');
        $post-> author_id = Auth::id();
        $post ->save();
        if($post-> checked == '1'){
            return redirect ('/send')->with('success', 'EDITED');
        }
        else {
            return redirect('/posts')->with('success', 'EDITED');
        }

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();
            return redirect('/posts') ->with('success', 'Удалено');
    }

    public function send(){

        $posts = Post::all();

        $user = auth()->user();
        $user->notify(new MyEmailNotification());

        return view('posts.index',  compact('posts'));
    }
}
