<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchQuery = $request->query('q');

        return view('post.index', [
            'posts' => Post::online()
                ->when($searchQuery, function (Builder $query) use ($searchQuery) {
                    return $query->search($searchQuery);
                })
                ->orderBy('published_at', 'desc')
                ->simplePaginate(10)
                ->appends(['q' => $searchQuery]),
            'searchQuery' => $searchQuery,
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Post $post)
    {
        return view('post.show', compact('post'));
    }
}
