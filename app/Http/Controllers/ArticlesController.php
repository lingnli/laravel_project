<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Article;
use App\Http\Requests\MyRequest;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    public function index(){

        $articles = Article::with('user')->orderBy('id','desc')->paginate(3);

        //articles.index == articles/index(articles資料夾下的index目錄)
        return view('articles.index',['articles'=>$articles]);
    }

    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(MyRequest $request)
    {

        $content = $request->validated();

        auth()->user()->articles()->create($content);

        return redirect()->route('root')->with('notice','文章新增成功！');

    }


    public function edit($id)
    {
        $article =  auth()->user()->articles()->find($id);

        //無判斷身份
        // $article = Article::find($id);

        return view('articles.edit', ['article' => $article]);
    }

    public function update(MyRequest $request , $id)
    {
        $article =  auth()->user()->articles->find($id);

        $content = $request->validated();

        $article->update($content);

        return redirect()->route('root')->with('notice', '文章更新成功！');
    }

    public function destroy($id){

        $article =  auth()->user()->articles->find($id);
        $article->delete();
        return redirect()->route('root')->with('notice', '文章已刪除');

    }

}
