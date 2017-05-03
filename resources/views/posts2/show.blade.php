@extends('layouts.app')

@section('content')
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">{{ $post['data']['title'] }}</h1>
                <h2 class="subtitle">
                    <strong>{{ $post['data']['author']['name'] }}</strong>
                    <small>
                        <a href="{{ url("/{$post['data']['author']['username']}") }}">{{ $post['data']['author']['username'] }}</a>
                    </small>
                    <small>{{ $post['data']['created_at_human'] }}</small>
                </h2>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container container__blog">

            <div class="bosx">
                <article class="media">
                    <div class="media-content">
                        <div class="content fr-view">
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

    <section>
        <div class="container container__blog">
            <div id="disqus_thread"></div>
            <script>
                var disqus_config = function () {
                    this.page.url = '{{ url("/{$post['data']['author']['username']}/{$post['data']['slug']}") }}';
                    this.page.identifier = '{{ $post['data']['id'] }}';
                };
                (function () { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://mongo-blog.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered
                    by Disqus.</a></noscript>
        </div>
    </section>
@endsection

@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection