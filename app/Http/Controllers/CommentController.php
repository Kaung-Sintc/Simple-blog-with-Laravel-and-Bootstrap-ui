<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request, Article $article)
    {
        $data = [
            'content' => $request->content,
            'user_id' => $request->user()->id
        ];

        if($request->has('parent_id')) {
            $data['parent_id'] = $request->parent_id;
        }


        $article->comments()->create($data);

        return back();
    }

    public function edit(Comment $comment)
    {

        // authorize
        $this->authorize('view', $comment);
        return view('comments.edit', compact('comment'));
    }

    public function update(Comment $comment)
    {
        // authorize
        $this->authorize('update', $comment);

        $comment->update(request(['content']));

        return redirect()->route('articles.show', Article::find($comment->article_id)->slug);
    }

    public function delete(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return back();
    }
}
