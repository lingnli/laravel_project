@extends('layouts.article')

@section('main')

<h1>文章列表</h1>
<a href="{{ route('articles.create')}}">新增文章</a>

@foreach ($articles as $article)
   <div class="card mt-3" style="width: 30rem;">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('articles.show' , $article) }}">
                    {{ $article->title}}
                </a>
            </h5>
            <p class="card-text">{{ $article->created_at}} 由 {{$article->user->name}} 分享</p>
            <a href="{{route('articles.edit' ,$article)}}">編輯</a>

            <form action="{{ route('articles.destroy',$article)}}" method="post">
            @csrf
            @method('delete')
           <button type="submit" class="btn btn-danger">刪除</button>
            </form>
        </div>
    </div>
</div>
@endforeach

{{$articles->links()}}

@endsection
