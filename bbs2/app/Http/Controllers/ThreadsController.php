<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Post;
use Carbon\Carbon;

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
    
    //スレッドへの投稿
    public function store(Request $request)
    {
        //protected $fillable = ['thread_id', 'title', 'body', 'position'];
        
        //POSTデータのバリデーション
        $params = $request->validate([
          'thread_id' => 'required',
          'title' => 'required|max:50',
          'body' => 'required|max:2000',
          'position' => 'required',
        ]);
        
        //スレッドIDの取得
        $thread_id = $request->thread_id;
        
        //投稿カウントの取得
        //$post_num = Post::findOrFail($thread_id)->count();
        $post_num = Post::where('thread_id', $thread_id)->count();

        //IPの取得
        $ip = request()->ip();

        //////ハッシュ値の取得//////
        $carbon = new Carbon();
        $timestamp = $carbon->now();
        //初期パラメータ
        $today = $timestamp->format('y-m-d');
        $secret = "babababibibibubebobubo"; 
        //sha1を使ってハッシュ化
        $id_hash = hash_hmac("sha1", $today.$ip, $secret);
        //base64の形式に変換
        $id_base64 = base64_encode($id_hash);
        //先頭の8文字だけ抜き取る
        $hash =  substr($id_base64, 0, 8);

        $article = new Post;
        $article->thread_id = $thread_id;
        $article->title = $request->title;
        $article->body = $request->body;
        $article->position = $request->position;
        $article->post_num = $post_num + 1;
        $article->hash_id = $hash;
        $article->ip = $ip;

        $article->save();

        //DBへのinsert
        //Post::create($params);
        
        $postss = Post::findOrFail($thread_id);
        //$postss = Post::findOrFail($params['thread_id']);
        return redirect()->route('thread.show', ['postss' => $postss]);
        // redirect()->route('thread.show', ['postss' => $postss, 'timestamp' => $timestamp]);
        //return redirect()->route('thread.show');
    }
    
}
