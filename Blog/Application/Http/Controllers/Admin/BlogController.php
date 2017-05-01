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
    public function create()
    {
        return view('admin.new-post');
    }

    /**
     * @param MakeNewBlogPostRequest $newBlogPostRequest
     */
    public function store(MakeNewBlogPostRequest $newBlogPostRequest)
    {
        dd($newBlogPostRequest);
    }
}
