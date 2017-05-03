<?php

namespace Blog\Application\Http\Controllers;

use Blog\Application\Http\Requests\MakeNewBlogPostRequest;
use Blog\Domain\Models\Post;
use Blog\Domain\Posts\PostTransformer;

/**
 * Class PagesController
 *
 * @package Blog\Application\Http\Controllers
 */
class PagesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::latest()->paginate();

//        $posts = fractal($paginatedPosts, new PostTransformer())->toArray();

        return view('home', compact('posts'));
    }

    /**
     * @param $username
     * @param $slug
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($username, $slug)
    {
        $foundPost = Post::where('slug', $slug)->where('body.published.content', '=', null)->firstorfail();

        dd($foundPost);

        $post = fractal($foundPost, new PostTransformer())->toArray();

        return view('posts.show', compact('post'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('posts.new-post');
    }

    /**
     * @param MakeNewBlogPostRequest $newBlogPostRequest
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(MakeNewBlogPostRequest $newBlogPostRequest)
    {
        $username = auth()->user()->username;
        $slug = str_slug($newBlogPostRequest->title);

        auth()->user()->posts()->create([
            'title' => $newBlogPostRequest->title,
            'slug' => $slug,
            'body' => [
                'published' => [
                    'content' => null,
                ],
                'saved' => [
                    'content' => $newBlogPostRequest->body
                ],
            ],
        ]);

        return redirect("/{$username}/{$slug}");
    }

    /**
     * @param $postId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($postId)
    {
        Post::destroy($postId);

        return back();
    }
}
