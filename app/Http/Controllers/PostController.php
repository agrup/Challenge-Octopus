<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Storage;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['auth']);
    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Auth::user()->posts;
        // $posts = Post::All();
        return view('Post.posts')->with(['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  
        $this->validate(request(),[
            'title' => 'required',
            'body'=>'required',
            'file'=>'required|file|image|mimes:jpeg,png,gif,jpg|max:2048'
        ]);
        $image = $request->file('file')->store('public/images');           
        $post = new Post();
        $post->title=$request->title;
        $post->body=$request->body;
        $post->filename='storage/images/'.basename($image);
        auth::user()->publish($post);

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $publications = $post->publicationsUserName();

        // dd($publications);
        return view('Post.show')->with(['post'=>$post,'publications'=>$publications]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('Post.edit')->with(['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate(request(),[
            'title' => 'required',
            'body'=>'required',
        ]);
        
        
        $post->title=$request->title;
        $post->body=$request->body;
        $post->update();
        
        return redirect('/');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        
        if(Auth::user()->posts()->get()->contains($post))
        {
            $post->delete();
            
        }
        return redirect('/');
 
    }
}
