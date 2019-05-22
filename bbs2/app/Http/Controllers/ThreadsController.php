<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Post;

class ThreadsController extends Controller
{
    //スレッド一覧の閲覧
    public function index()
    {
        //$threads = Thread::all();
        $threads = Thread::orderBy('created_at', 'desc')->get();
        //$posts = Post::orderBy('created_at', 'desc')->paginate(10);

        return view('threads.index', ['threads' => $threads]);
    }
    
    //スレッド作成用ページへの遷移
    public function create()
    {
        return view('threads.create');
    }
    
    //スレッド詳細の閲覧
    public function show($thread_id)
    {
        $threads = Thread::findOrFail($thread_id);
        $posts = Post::where('thread_id', $thread_id)->orderBy('created_at', 'desc')->get();
        //$posts = Post::findOrFail($thread_id);
        //$posts = Post::all();
        //$posts = Post::findOrFail($thread_id)->orderBy('created_at')->get();
        //dd($postss);
    
        return view('threads.show', [
          'threads' => $threads,
          'posts' => $posts,
        ]);
    }
    
    //スレッドへのコメント追加
    public function store(Request $request)
    {
        //POSTデータのバリデーション
        $params = $request->validate([
          'thread_id' => 'required',
          'title' => 'required|max:50',
          'body' => 'required|max:2000',
          'position' => 'required',
        ]);
        //DBへのinsert
        Post::create($params);
        
        $postss = Post::findOrFail($params['thread_id']);
        //dd($posts);
        //$posts = Post::where('thread_id', $params['thread_id'])->orderBy('created_at', 'desc')->get();
        //return redirect()->route('thread');
        //$posts = Post::where('thread_id', $params['thread_id'])->get();
        //$posts = Post::all();
        //$post->comments()->create($params);
        return redirect()->route('thread.show', ['postss' => $postss]);
    }
    
}
