<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ThreadsTableSeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carbon = new Carbon();
        DB::table('threads')->delete();
        $param = [
            'title' => 'スレッドタイトル111',
            'body' => 'これはスレッド１の説明文です。こちらをみて投稿してね',
            'cat1' => 001,
            'cat2' => 002,
            'ip' => '123.000.000.000',
            'flag' => 0,
            'position01' => '賛成',
            'position02' => '反対',
            'position03' => '中立',
            'created_at' => $carbon->now(),
            'updated_at' => $carbon->now(),
        ];
        DB::table('threads')->insert($param);
        $param = [
            'title' => 'スレッドタイトル222',
            'body' => 'これはスレッド2の説明文です。こちらをみて投稿してね',
            'cat1' => 001,
            'cat2' => 002,
            'ip' => '123.000.000.000',
            'flag' => 0,
            'position01' => '賛成',
            'position02' => '反対',
            'position03' => '中立',
            'created_at' => $carbon->now(),
            'updated_at' => $carbon->now(),
        ];
        DB::table('threads')->insert($param);
        $param = [
            'title' => 'スレッドタイトル333',
            'body' => 'これはスレッド3の説明文です。こちらをみて投稿してね',
            'cat1' => 001,
            'cat2' => 002,
            'ip' => '123.000.000.000',
            'flag' => 0,
            'position01' => '賛成',
            'position02' => '反対',
            'position03' => '中立',
            'created_at' => $carbon->now(),
            'updated_at' => $carbon->now(),
        ];
        DB::table('threads')->insert($param);
    }
}