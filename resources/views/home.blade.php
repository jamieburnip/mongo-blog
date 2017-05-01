@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container container__blog">

            {{--<blog-snippet></blog-snippet>--}}

            @foreach($posts['data'] as $post)
                <div class="box">
                    <article class="media">
                        <div class="media-content">
                            <div class="content">
                                <h2><a href="{{ url("blog/{$post['slug']}") }}">{{ $post['title'] }}</a></h2>
                                <p>{{ $post['snippet'] }}</p>
                                <p>
                                    <strong>{{ $post['author']['name'] }}</strong>
                                    <small>
                                        <a href="{{ url("/profile/{$post['author']['username']}") }}">{{ $post['author']['username'] }}</a>
                                    </small>
                                    <small>{{ $post['created_at_human'] }}</small>
                                </p>
                            </div>
                            <nav class="level is-mobile">
                                <div class="level-left">
                                    <a class="level-item">
                                        <span class="icon is-small"><i class="fa fa-reply"></i></span>
                                    </a>
                                    <a class="level-item">
                                        <span class="icon is-small"><i class="fa fa-retweet"></i></span>
                                    </a>
                                    <a class="level-item">
                                        <span class="icon is-small"><i class="fa fa-heart"></i></span>
                                    </a>
                                </div>
                            </nav>
                        </div>
                    </article>
                </div>
            @endforeach

        </div>
    </section>
@endsection
