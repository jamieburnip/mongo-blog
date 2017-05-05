@extends('layouts.app')

@section('content')
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">{{ $post->title }}</h1>
                <h2 class="subtitle">
                    <strong>{{ $user->name }}</strong>
                    <small>
                        <a href="{{ route('profile.index', [$user->username]) }}">{{ $user->username }}</a>
                    </small>
                    <br>
                    @if($post->published_at)
                        <small>
                            <time title="{{ $post->published_at }}">{{ $post->published_at->diffForHumans() }}</time>
                        </small>
                    @else
                        <small>Last Updated: {{ $post->updated_at }}</small>
                    @endif
                </h2>
            </div>
        </div>
    </section>

    @can('owns', $post)
        @if(null === $post->published_at)
            <nav class="nav publish-bar">
                <div class="container">
                    <div class="nav-right nav-menu">
                        <p class="nav-item">
                            This post has not yet been published....
                        </p>

                        <div class="nav-item">
                            <div class="field is-grouped">
                                <p class="control">
                                    <a class="level-item button is-white" title="Edit Now"
                                       href="{{ route('post.edit', [$post->user->username, $post->slug]) }}">
                                        <span class="icon is-small"><i class="fa fa-pencil"></i></span>
                                    </a>
                                </p>
                                <form class="form-horizontal" role="form" method="POST"
                                      action="{{ route('post.quick-publish', [
                                        'username'=> $post->user->username,
                                        'slug' => $post->slug,
                                        ]) }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{ $post->id }}">
                                    <input type="hidden" name="publish" value="1">


                                    <p class="control">
                                        <button type="submit" class="button is-white">Publish Now</button>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        @endif
    @endcan

    <section class="section">
        <div class="container container__blog">

            <div class="bosx">
                <article class="media">
                    <div class="media-content">
                        <div class="content fr-view">
                            {!! $post->body !!}
                        </div>
                        <hr>
                        <nav class="level is-mobile">
                            @cannot('owns', $post)
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
                            @endcannot
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
                    this.page.url = '{{ route('profile.index', [$user->username]) }}';
                    this.page.identifier = '{{ $post->id }}';
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_style.min.css" rel="stylesheet"
          type="text/css"/>
@endsection