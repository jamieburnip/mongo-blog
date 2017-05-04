<?php

namespace Blog\Application\Http\Controllers;

use Blog\Domain\Posts\Repository as PostRepository;
use Chief\CommandBus;

/**
 * Class HomeController
 *
 * @package Blog\Application\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * Controller constructor.
     *
     * @param CommandBus $chief
     * @param PostRepository $postRepository
     */
    public function __construct(CommandBus $chief, PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;

        parent::__construct($chief);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $posts = $this->postRepository->getAllPublishedPosts();

//        dd($posts->isEmpty());

        return view('home', compact('posts'));
    }
}
