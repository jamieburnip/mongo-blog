@extends('layouts.app')

@section('content')
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <div class="media">
                    <div class="media-content">
                        <h1 class="title">{{ $user->name }}</h1>
                        <h2 class="subtitle">
                            <strong>{{ $user->username }}</strong>
                            <br>
                            <small>Member since: {{ $user->created_at->diffForHumans() }}</small>
                        </h2>
                    </div>
                    <div class="media-right">
                        <figure class="image is-96x96">
                            <img src="{{ $user->getAvatar() }}" alt="Image">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @can('self', $user)
        @include('profile._draft-bar')
    @endcan
    @cannot('self', $user)
        @include('profile._posts-bar')
    @endcannot

    <section class="section">
        <div class="container container__blog">
            @include('posts._post-list')
        </div>
    </section>


    {{--<section class="section">--}}
    {{--<div class="container container__blog">--}}

    {{--<div class="box">--}}
    {{--<article class="media">--}}
    {{--<div class="media-content">--}}
    {{--<div class="content">--}}
    {{--{!! $post['data']['body'] !!}--}}
    {{--</div>--}}
    {{--<nav class="level is-mobile">--}}
    {{--<div class="level-left">--}}
    {{--<a class="level-item">--}}
    {{--<span class="icon is-small"><i class="fa fa-reply"></i></span>--}}
    {{--</a>--}}
    {{--<a class="level-item">--}}
    {{--<span class="icon is-small"><i class="fa fa-retweet"></i></span>--}}
    {{--</a>--}}
    {{--<a class="level-item">--}}
    {{--<span class="icon is-small"><i class="fa fa-heart"></i></span>--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</nav>--}}
    {{--</div>--}}
    {{--</article>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--</section>--}}

    {{--<section>--}}
    {{--<div class="container container__blog">--}}
    {{--<div id="disqus_thread"></div>--}}
    {{--<script>--}}
    {{--var disqus_config = function () {--}}
    {{--this.page.url = '{{ url("/{$post['data']['author']['username']}/{$post['data']['slug']}") }}';--}}
    {{--this.page.identifier = '{{ $post['data']['id'] }}';--}}
    {{--};--}}
    {{--(function () { // DON'T EDIT BELOW THIS LINE--}}
    {{--var d = document, s = d.createElement('script');--}}
    {{--s.src = 'https://mongo-blog.disqus.com/embed.js';--}}
    {{--s.setAttribute('data-timestamp', +new Date());--}}
    {{--(d.head || d.body).appendChild(s);--}}
    {{--})();--}}
    {{--</script>--}}
    {{--<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered--}}
    {{--by Disqus.</a></noscript>--}}
    {{--</div>--}}
    {{--</section>--}}
@endsection
