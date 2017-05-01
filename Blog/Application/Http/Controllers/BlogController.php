<?php

namespace Blog\Application\Http\Controllers;

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
        return view('home');
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
