@extends('layouts.app')

@section('content')
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">{{ $post['data']['title'] }}</h1>
                <h2 class="subtitle">
                    <strong>{{ $post['data']['author']['name'] }}</strong>
                    <small>
                        <a href="{{ url("/profile/{$post['data']['author']['username']}") }}">{{ $post['data']['author']['username'] }}</a>
                    </small>
                    <small>{{ $post['data']['created_at_human'] }}</small>
                </h2>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container container__blog">

            <div class="box">
                <article class="media">
                    <div class="media-content">
                        <div class="content">
                            {!! $post['data']['body'] !!}
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

        </div>
    </section>
@endsection
