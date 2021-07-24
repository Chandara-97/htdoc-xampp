<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;
use App\http\Resources\Article as ArticlesResource;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $articles = DB::table('Articles')->paginate(15);
//        dd($articles);
        Return ArticlesResource::collection($articles);
    }

    public function singleArticle ($id){
        $a_articles = DB::table('Articles')->find($id);
        Return [
            'id' => $a_articles->id,
            'title' => $a_articles->title,
            'body' => $a_articles->body,

        ];
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Article
     */
    public function store(Request $request)
    {
        $article = $request->isMethod('put') ? Articles::findOrFail($request->article_id) : new Articles;

        $article->id = $request->input('id');
        $article->title = $request->input('title');
        $article->body = $request->input('body');

        if($article->save()) {
            return new ArticlesResource($article);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function show(Articles $articles)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function edit(Articles $articles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articles $articles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articles $articles,$id)
    {
        $article = Articles::findOrFail($id);

        if($article->delete()) {
            return new ArticleResource($article);
        }
    }
}
