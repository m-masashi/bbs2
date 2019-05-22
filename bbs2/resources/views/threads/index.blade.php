@extends('threads.layout')

@section('content')
    <div class="container mt-4">
        <div class="mb-4">
            <a href="{{ route('addthread.create') }}" class="btn btn-primary">スレッドを新規作成する</a>
        </div>
        
        @foreach ($threads as $thread)
            <div class="card mb-4">
                <div class="card-header">
                    {{ $thread->title }}
                </div>
                <div class="card-body">
                    <p class="card-text">{{$thread->body}}</p>
                    <a class="card-link" href="/thread/{{ $thread->id }}">続きを読む</a>
                </div>
                <div class="card-footer">
                    <span class="mr-2">
                        投稿日時 {{ $thread->created_at->format('Y.m.d') }}
                    </span>
                    @if ($thread->post->count())
                        <span class="badge badge-primary">
                            コメント {{ $thread->post->count() }}件
                        </span>
                    @endif

                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center mb-5">
</div>
    </div>
@endsection