<?php

namespace Blog\Application\Http\Controllers\Admin;

use Blog\Application\Http\Controllers\Controller;
use Blog\Application\Http\Requests\MakeNewBlogPostRequest;

/**
 * Class BlogController
 *
 * @package Blog\Application\Http\Controllers\Admin
 */
class BlogController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.new-post');
    }

    /**
     * @param MakeNewBlogPostRequest $newBlogPostRequest
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(MakeNewBlogPostRequest $newBlogPostRequest)
    {
        auth()->user()->posts()->create([
            'title' => $newBlogPostRequest->title,
            'slug' => str_slug($newBlogPostRequest->title),
            'body' => $newBlogPostRequest->body,
        ]);

        return redirect('/blog');
    }
}
