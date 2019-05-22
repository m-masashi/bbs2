@extends('addthreads.layout')

@section('content')
<div class="container mt-4">
  <div class="border p-4">
    <h1 class="h5 mb-4">addスレッドの新規作成</h1>

    <form method="POST" action="{{ route('addthread.store') }}">
         {{ csrf_field() }}

        <fieldset class="mb-4">
          <div class="form-group">
            <label for="title">タイトル</label>
            <input id="title" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title') }}" type="text">
            @if ($errors->has('title'))<div class="invalid-feedback">{{ $errors->first('title') }}</div>@endif
          </div>

          <div class="form-group">
            
              <label for="body">本文</label>
              <textarea id="body" name="body" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" rows="4">{{ old('body') }}</textarea>
              @if ($errors->has('body'))<div class="invalid-feedback">{{ $errors->first('body') }}</div>@endif
              
              <p>カテゴリ1</p>
              <select name="cat1" id="cat1" class="form-control{{ $errors->has('cat1') ? ' is-invalid' : '' }}">
                <option value=""@if(!old('cat1')){{ ' selected' }}@endif>選択してください</option>
                <option value="0"@if(old('cat1')=="0"){{ ' selected' }}@endif>カテゴリ1</option>
                <option value="1"@if(old('cat1')=="1"){{ ' selected' }}@endif>カテゴリ2</option>
                <option value="2"@if(old('cat1')=="2"){{ ' selected' }}@endif>カテゴリ3</option>
                <option value="3"@if(old('cat1')=="3"){{ ' selected' }}@endif>カテゴリ4</option>
              </select>
              @if ($errors->has('cat1'))<div class="invalid-feedback">エラー文：{{ $errors->first('cat1') }}</div>@endif
              <p>カテゴリ2</p>
              <select name="cat2" id="cat2" class="form-control{{ $errors->has('cat2') ? ' is-invalid' : '' }}">
                <option value=""@if(!old('cat2')){{ ' selected' }}@endif>選択してください</option>
                <option value="0"@if(old('cat2')=="0"){{ ' selected' }}@endif>カテゴリ1</option>
                <option value="1"@if(old('cat2')=="1"){{ ' selected' }}@endif>カテゴリ2</option>
                <option value="2"@if(old('cat2')=="2"){{ ' selected' }}@endif>カテゴリ3</option>
                <option value="3"@if(old('cat2')=="3"){{ ' selected' }}@endif>カテゴリ4</option>
              </select>
              @if ($errors->has('cat2'))<div class="invalid-feedback">{{ $errors->first('cat2') }}</div>@endif
              <br>
              <div class="{{ $errors->has('position01') ? 'is-invalid' : '' }}">賛成など肯定ポジション
                <input type="text" name="position01" value="{{ old('position01') ? old('position01') : '賛成' }}">
              </div>
              @if ($errors->has('position01'))<div class="invalid-feedback">{{ $errors->first('position01') }}</div>@endif
              <div class="{{ $errors->has('position02') ? 'is-invalid' : '' }}">反対など否定ポジション
                <input type="text" name="position02" value="{{ old('position02') ? old('position02') : '反対' }}">
              </div>
              @if ($errors->has('position02'))<div class="invalid-feedback">{{ $errors->first('position02') }}</div>@endif
              <div class="{{ $errors->has('position03') ? 'is-invalid' : '' }}">中立ポジション
                <input type="text" name="position03" value="@if(old('position03')){{ old('position03') }}@else{{ '中立' }}@endif">
              </div>
              @if ($errors->has('position03'))<div class="invalid-feedback">{{ $errors->first('position03') }}</div>@endif
          </div>

          <div class="mt-5">
              <a class="btn btn-secondary" href="{{ route('top') }}">キャンセル</a>
              <button type="submit" class="btn btn-primary">作成する</button>
          </div>
      </fieldset>
    </form>
  </div>
</div>
@endsection