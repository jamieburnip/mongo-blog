<?php

namespace Blog\Application\Http\Controllers;

use Blog\Domain\Models\Post;
use Blog\Domain\Posts\Repository as PostRepository;
use Blog\Domain\User\Traits\ResolvesUser;
use Chief\CommandBus;
use Illuminate\Support\Collection;

/**
 * Class ProfileController
 *
 * @package Blog\Application\Http\Controllers
 */
class ProfileController extends Controller
{
    use ResolvesUser;

    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * ProfileController constructor.
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
    public function index($username): \Illuminate\View\View
    {
        $user = $this->resolveUserFromUsername($username);

        /** @var Collection $posts */
        $posts = $this->postRepository->getPublishedPostsByUser($user);

        return view('profile.show', compact('user', 'posts'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function draft(): \Illuminate\View\View
    {
        $user = auth()->user();

        /** @var Collection $posts */
        $posts = $this->postRepository->getDraftPostsByUser($user);

        return view('profile.draft', compact('user', 'posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string $username
     * @param  string $slug
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show($username, $slug): \Illuminate\View\View
    {
        $user = $this->resolveUserFromUsername($username);

        /** @var Post $post */
        $post = $this->postRepository->getPostByUserAndSlug($user, $slug);

        if ($post->isPublished() === false) {
            $this->authorize('draft', $post);
        }

        return view('posts.show', compact('user', 'post'));
    }
}
