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
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        return view('blog.show');
    }
}
