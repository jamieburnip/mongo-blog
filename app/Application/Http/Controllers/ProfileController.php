<?php

namespace Blog\Application\Http\Controllers;

use Blog\Domain\Models\Post;
use Blog\Domain\User\Traits\ResolvesUser;
use Blog\Service\Command\GetPostCommand;
use Blog\Service\Command\ListPostsCommand;
use Illuminate\Http\Request;
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index($username): \Illuminate\View\View
    {
        $user = $this->resolveUserFromUsername($username);

        /** @var Collection $posts */
        $posts = $this->chief->execute(new ListPostsCommand($user));

        return view('profile.show', compact('user', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string $username
     * @param  string $slug
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     * @return \Illuminate\View\View
     */
    public function show($username, $slug): \Illuminate\View\View
    {
        $user = $this->resolveUserFromUsername($username);

        /** @var Post $post */
        $post = $this->chief->execute(new GetPostCommand($user, $slug));

        if ($post === null) {
            abort(404);
        }

        return view('posts.show', compact('user', 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
