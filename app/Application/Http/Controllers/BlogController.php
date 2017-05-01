<?php

namespace Blog\Application\Http\Controllers;

use Blog\Domain\Models\Post;
use Blog\Domain\Posts\PostTransformer;

/**
 * Class BlogController
 *
 * @package Blog\Application\Http\Controllers
 */
class BlogController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $paginatedPosts = Post::latest()->paginate();

        $posts = fractal($paginatedPosts, new PostTransformer())->toArray();

        return view('home', compact('posts'));
    }

    /**
     * @param $slug
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $foundPost = Post::where('slug', $slug)->firstorfail();

        $post = fractal($foundPost, new PostTransformer())->toArray();

        return view('blog.show', compact('post'));
    }
}
