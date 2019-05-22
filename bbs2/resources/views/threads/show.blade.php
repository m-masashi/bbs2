@extends('threads.layout')

@section('content')
    <div class="container mt-4">
      <div class="border p-4">
            
        <div class="mb-4 text-right">
          <form style="display: inline-block;" method="POST" action="">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="DELETE">
            <button class="btn btn-danger">削除する</button>
          </form>
        </div>
@php
  //var_dump($timestamp);
@endphp
        <h1 class="h5 mb-4"> {{ $threads->title }}</h1>
        <p class="mb-5">{!! nl2br(e($threads->body)) !!}</p>

        <form class="mb-4" method="POST" action="{{ route('thread.store') }}">
          {{ csrf_field() }}
          <input name="thread_id" type="hidden" value="{{ $threads->id }}">
          <input name="title" type="hidden" value="投稿サンプル">
      
          <div class="form-group">
              <label for="body">本文</label>
              <div>
                <input type="radio" name="position" value="0">{{ $threads->position01 }}
                <input type="radio" name="position" value="1">{{ $threads->position02 }}
                <input type="radio" name="position" value="2" checked="checked">{{ $threads->position03 }}
              </div>
              <textarea id="body" name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="4">{{ old('body') }}</textarea>
              @if ($errors->has('body'))
                <div class="invalid-feedback">{{ $errors->first('body') }}</div>
              @endif
          </div>
      
        <div class="mt-4">
          <button type="submit" class="btn btn-primary">コメントする</button>
        </div>
      </form>

      <section>
        <h2 class="h5 mb-4">コメント</h2>
@php
  //var_dump($postss);
@endphp
        @forelse($posts as $post)
@php
  //ポジションのクラスと値の取得
  if($post->position == 0) {
      $posi_class = 'posi01';
      $posi_txt = $threads->position01;
  } elseif($post->position == 1) {
      $posi_class = 'posi02';
      $posi_txt = $threads->position02;
  } elseif($post->position == 2) {
      $posi_class = 'posi03';
      $posi_txt = $threads->position03;
  }
@endphp      
          <div class="border-top p-4 {{ $posi_class }}">
            <time class="text-secondary">{{ $post->created_at->format('Y.m.d H:i') }}</time>
            <p class="mt-2">
              {{ '【番号：' . $post->post_num . '】' }}
              {{ '【ハッシュID：' . $post->hash_id . '】' }}
            </p>
            <p class="mt-2">{{ $posi_txt }}</p>
            <p class="mt-2">{!! nl2br(e($post->body)) !!}</p>
          </div>
        @empty
          <p>コメントはまだありません。</p>
        @endforelse
      </section>
    </div>
  </div>
@endsection