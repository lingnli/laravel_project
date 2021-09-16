@extends('layouts.article')

@section('main')

@if ($errors->any())
<ul class="list-group">

    @foreach ($errors->all() as $error)
        <li class="list-group-item list-group-item-danger">{{ $error }}</li>
    @endforeach

</ul>
@endif

<h1>文章 > 編輯文章</h1>
<a href="{{ route('articles.index')}}">回到列表</a>

<form action="{{ route('articles.update',$article)}}" method="post" class="w-50">
    @csrf
    @method('patch')
  <div class="form-group">
    <label for="title">標題</label>
    <input type="text" value="{{ $article->title }}" class="form-control" id="title" name="title">
  </div>

    <div class="form-group">
    <label for="content">內文</label>
    <textarea rows=10 class="form-control" id="content" name="content">{{$article->content }}</textarea>
  </div>

   <button type="submit" class="btn btn-primary">編輯文章</button>
</form>

@endsection
