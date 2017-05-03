@if ($posts->count() > 1)
    @foreach($posts as $post)
        <div class="box">
            <article class="media">
                <div class="media-content">
                    <div class="content">
                        <h2>
                            <a href="{{ url("/{$post->user->username}/{$post->slug}") }}">{{ $post->title }}</a>
                        </h2>
                        <p>{{ $post->getSnippet() }}</p>
                        <p>
                            <strong>{{ $post->user->name }}</strong>
                            <small>
                                <a href="{{ url("/{$post->user->username}") }}">{{ $post->user->username }}</a>
                            </small>
                            {{--                            <small>{{ $post['created_at_human'] }}</small>--}}
                        </p>
                    </div>
                    <nav class="level is-mobile">
                        <div class="level-left">
                            <a class="level-item">
                                <span class="icon is-small"><i class="fa fa-bookmark-o"></i></span>
                            </a>
                            <a class="level-item">
                                <span class="icon is-small"><i class="fa fa-heart-o"></i></span>
                            </a>
                        </div>

                        @can('owns', $post)
                            <div class="level-right">
                                <a class="level-item">
                                    <span class="icon is-small"><i class="fa fa-pencil"></i></span>
                                </a>
                                <a class="level-item">
                                    <span class="icon is-small"><i class="fa fa-trash-o"></i></span>
                                </a>
                            </div>
                        @endcan
                    </nav>
                </div>
            </article>
        </div>
    @endforeach
@else
    <div class="box">
        <article class="media">
            <div class="media-content">
                <div class="content">
                    <p>
                        <strong>What?</strong> No posts!
                    </p>
                </div>
            </div>
        </article>
    </div>
@endif
{{ $posts->links() }}