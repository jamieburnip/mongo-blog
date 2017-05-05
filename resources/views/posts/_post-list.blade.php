@if ($posts->count() > 0)
    @foreach($posts as $post)
        <div class="box">
            <article class="media">
                <div class="media-content">
                    <div class="content">
                        <h2>
                            <a href="{{ route('profile.show', [$post->user->username, $post->slug]) }}">
                                {{ $post->title }}
                            </a>
                        </h2>
                        <p>{{ $post->getSnippet() }}</p>
                        <p>
                            <strong>{{ $post->user->name }}</strong>
                            @if($post->published_at)
                                <small><time title="{{ $post->published_at }}">{{ $post->published_at->diffForHumans() }}</time></small>
                            @endif
                        </p>
                    </div>
                    <nav class="level is-mobile">
                        <div class="level-left">
                            <a href="{{ route('profile.index', [$post->user->username]) }}" class="level-item">
                                {{ $post->user->username }}
                            </a>
                        </div>

                        @can('owns', $post)
                            <div class="level-right">
                                <a class="level-item" href="{{ route('post.edit', [$post->user->username, $post->slug]) }}">
                                    <span class="icon is-small"><i class="fa fa-pencil"></i></span>
                                </a>
                                <a class="level-item" title="Delete this post"
                                   onclick="event.preventDefault(); document.getElementById('post-delete-form').submit();">
                                    <span class="icon is-small"><i class="fa fa-trash-o"></i></span>
                                </a>

                                <form id="post-delete-form" action="{{ route('post.delete') }}"
                                      method="POST" style="display: none;">
                                    <input type="hidden" name="postId" value="{{ $post->id }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
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