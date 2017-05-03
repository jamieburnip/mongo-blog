<?php

namespace Blog\Application\Http\Controllers;

use Blog\Domain\Models\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProfileController extends Controller
{
    public function show($username)
    {
        $user = User::where('username', ltrim($username, '@'))->firstorfail();

        $posts = $user->posts()->latest()->paginate();

        return view('user.show', compact('user', 'posts'));
    }
}