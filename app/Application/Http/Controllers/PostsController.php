<?php

namespace Blog\Application\Http\Controllers;

use Blog\Application\Http\Requests\CreateBlogPostRequest;
use Blog\Application\Http\Requests\DeletePostRequest;
use Blog\Application\Http\Requests\QuickPublishPostRequest;
use Blog\Application\Http\Requests\UpdatePostRequest;
use Blog\Domain\Models\Post;
use Blog\Domain\Models\User;
use Blog\Domain\Posts\Repository as PostRepository;
use Blog\Domain\User\Traits\ResolvesUser;
use Blog\Service\Command\CreateBlogPostCommand;
use Blog\Service\Command\PublishBlogPostCommand;
use Blog\Service\Command\UpdatePostCommand;
use Chief\CommandBus;
use Illuminate\Http\RedirectResponse;

/**
 * Class PostsController
 *
 * @package Blog\Application\Http\Controllers
 */
class PostsController extends Controller
{
    Use ResolvesUser;

    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * PostsController constructor.
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        $post = new Post;

        return view('posts.new-post', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateBlogPostRequest $newBlogPostRequest
     *
     * @return RedirectResponse
     */
    public function store(CreateBlogPostRequest $newBlogPostRequest): RedirectResponse
    {
        /** @var User $user */
        $user = auth()->user();
        $slug = str_slug($newBlogPostRequest->title);

        $createNewBlogPostCommand = new CreateBlogPostCommand($user);
        $createNewBlogPostCommand->title = $newBlogPostRequest->title;
        $createNewBlogPostCommand->slug = $slug;
        $createNewBlogPostCommand->body = $newBlogPostRequest->body;
        $createNewBlogPostCommand->published = $newBlogPostRequest->publish;

        /** @var Post $createdPost */
        $createdPost = $this->chief->execute($createNewBlogPostCommand);

        return redirect()->route('profile.show', [
            'username' => $user->username,
            'slug' => $createdPost->slug
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $username
     * @param $slug
     *
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @internal param int $id
     *
     */
    public function edit($username, $slug): \Illuminate\View\View
    {
        /** @var Post $post */
        $post = $this->postRepository->getPostByUserAndSlug(auth()->user(), $slug);

        if ($post === null) {
            abort(404);
        }

        $this->authorize('update', $post);

        return view('posts.edit-post', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $updatePostRequest
     * @param $username
     * @param $slug
     *
     * @return \Illuminate\Http\RedirectResponse
     * @internal param UpdatePostRequest $request
     * @internal param int $id
     */
    public function update(UpdatePostRequest $updatePostRequest, $username, $slug): \Illuminate\Http\RedirectResponse
    {
        $updatePostCommand = new UpdatePostCommand(auth()->user());
        $updatePostCommand->id = $updatePostRequest->id;
        $updatePostCommand->title = $updatePostRequest->title;
        $updatePostCommand->body = $updatePostRequest->body;
        $updatePostCommand->published = $updatePostRequest->publish; // if null it's already published

        $this->chief->execute($updatePostCommand);

        return redirect()->route('profile.show', [
            'username' => $username,
            'slug' => $slug
        ]);
    }

    /**
     * @param QuickPublishPostRequest $quickPublishPostRequest
     * @param $username
     * @param $slug
     *
     * @return RedirectResponse
     */
    public function publish(
        QuickPublishPostRequest $quickPublishPostRequest,
        $username,
        $slug
    ): \Illuminate\Http\RedirectResponse {
        $publishBlogCommand = new PublishBlogPostCommand(auth()->user());
        $publishBlogCommand->id = $quickPublishPostRequest->id;

        $this->chief->execute($publishBlogCommand);

        return redirect()->route('profile.show', [
            'username' => $username,
            'slug' => $slug
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeletePostRequest $deletePostRequest
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(DeletePostRequest $deletePostRequest): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('delete', $this->postRepository->getPostById($deletePostRequest->postId));

        $this->postRepository->destroyPostById($deletePostRequest->postId);

        return back();
    }
}
