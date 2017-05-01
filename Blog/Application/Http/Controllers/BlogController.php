<?php

namespace Blog\Application\Http\Controllers;

class BlogController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
