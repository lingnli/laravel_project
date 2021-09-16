@extends('layouts.article')

@section('main')

<h1>文章列表 - {{ $article->title}}</h1>
<a href="{{ route('articles.index')}}">回到列表</a>

   <div class="card mt-3" style="width: 30rem;">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('articles.show' , $article) }}">
                    {{ $article->title}}
                </a>
            </h5>
            <p class="card-text">{{ $article->created_at}} 由 {{$article->user->name}} 分享</p>
            <p class="card-text">{{ $article->content}}</p>
        </div>
    </div>
</div>


@endsection
