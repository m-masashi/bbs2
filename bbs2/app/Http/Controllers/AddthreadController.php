<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Post;

class AddthreadController extends Controller
{
    //スレッド作成用ページへの遷移
    public function create()
    {
        return view('addthreads.create');
    }
    //スレッド作成
    public function store(Request $request)
    {
        //スレッドバリデーション
        $params = $request->validate([
          'title' => 'required|max:50',
          'body' => 'required|max:2000',
          'cat1' => 'required',
          'cat2' => 'required',
          'position01' => 'required',
          'position02' => 'required',
          'position03' => 'required',
        ]);
        //DBへのinsert
        $thread = new Thread;
        $form =$params;
        $thread->fill($form)->save();
        
        //id取得
        $thread_id = $thread->id;
        
        $threads = Thread::findOrFail($thread_id);
        $posts = Post::where('thread_id', $thread_id)->orderBy('created_at', 'desc')->get();

        return view('threads.show', [
          'threads' => $threads,
          'posts' => $posts,
        ]);
    }
}
