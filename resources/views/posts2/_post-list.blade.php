{{ dd($posts) }}
@if (count($posts['data']) > 1)
    @foreach($posts['data'] as $post)
        @can('update', $post)
            <h1>CAN</h1>
        @endcan
        <div class="box">
            <article class="media">
                <div class="media-content">
                    <div class="content">
                        <h2>
                            <a href="{{ url("/{$post['author']['username']}/{$post['slug']}") }}">{{ $post['title'] }}</a>
                        </h2>
                        <p>{{ $post['snippet'] }}</p>
                        <p>
                            <strong>{{ $post['author']['name'] }}</strong>
                            <small>
                                <a href="{{ url("/{$post['author']['username']}") }}">{{ $post['author']['username'] }}</a>
                            </small>
                            <small>{{ $post['created_at_human'] }}</small>
                        </p>
                    </div>
                    {{--<nav class="level is-mobile">--}}
                    {{--<div class="level-left">--}}
                    {{--<a class="level-item">--}}
                    {{--<span class="icon is-small"><i class="fa fa-bookmark-o"></i></span>--}}
                    {{--</a>--}}
                    {{--<a class="level-item">--}}
                    {{--<span class="icon is-small"><i class="fa fa-heart-o"></i></span>--}}
                    {{--</a>--}}
                    {{--</div>--}}
                    {{--</nav>--}}
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
<nav class="pagination">
    <a class="pagination-previous"
       @if(isset($posts['meta']['pagination']['links']['previous']))
       href="{{ $posts['meta']['pagination']['links']['previous'] }}"
    @else {{ 'disabled' }} @endif
    >Previous</a>
    <a class="pagination-next"
       @if(isset($posts['meta']['pagination']['links']['next']))
       href="{{ $posts['meta']['pagination']['links']['next'] }}"
    @else {{ 'disabled' }} @endif>Next page</a>
</nav>