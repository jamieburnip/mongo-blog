@extends('layouts.app')

@section('content')
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <div class="media">
                    <div class="media-content">
                        <h1 class="title">Edit post</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--{{ dd($errors->all()) }}--}}

    <section class="section">
        <div class="container">
            @include('posts._post-form', [
                'action' => route('post.update', [
                    'username'=> $post->user->username,
                    'slug' => $post->slug,
                ]),
                'method' => 'POST',
            ])
        </div>
    </section>
@endsection

@include('posts._assets')