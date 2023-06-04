<?php

namespace App\Http\Controllers;

use Stringable;
use App\Models\Article;
use Illuminate\Support\Str;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display articles.
     */
    public function index()
    {
        return view('articles.index', [
            'articles' => Article::latest()
                                ->paginate(5)
                                ->withQueryString()
        ]);
    }

    /**
     * Show the form for creating an article.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created article in database.
     */
    public function store(StoreArticleRequest $request)
    {
        $this->authorize('update', $request->user()->article);

        $request->user()->articles()->create(array_merge($request->only('title', 'content'), [
            'slug' => Str::slug($request->title) . uniqid("-"),
            'category_id' => $request->category
        ]));

        return redirect()->route('articles.index')->with('success', 'Article created successfully');
    }

    /**
     * Display the specified article.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * form for editing the specified article.
     */
    public function edit(Article $article)
    {
        $this->authorize('view', $article);

        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified article in database.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        // authorization
        $this->authorize('update', $article);

        $article->update(array_merge($request->only('title', 'content'), [
            'slug' => Str::slug($request->title) . uniqid('-'),
        ]));

        return redirect()->route('articles.index')->with('success', 'Article updated');
    }

    /**
     * Remove the specified resource from database.
     */
    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);

        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article deleted successfully');
    }
}
