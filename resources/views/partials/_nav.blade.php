<nav class="nav has-shadow">
    <div class="container">
        <div class="nav-left">
            <a class="nav-item is-tab is-hidden-mobile is-active" href="{{ url('/') }}">Blog</a>
        </div>
        <span :class="[{ 'is-active': showNav}, 'nav-toggle']" @click="showNav = !showNav">
      <span></span>
      <span></span>
      <span></span>
    </span>
        <div :class="[{ 'is-active': showNav}, 'nav-right', 'nav-menu']">
            <a class="nav-item is-tab is-hidden-tablet is-active" href="{{ url('/') }}">Blog</a>
            @if (Auth::guest())
                <a href="{{ route('login') }}" class="nav-item is-tab">Login</a>
                <a href="{{ route('register') }}" class="nav-item is-tab">Register</a>
            @else
                <a href="{{ route('post.create') }}" class="nav-item is-tab">New Post</a>
                <a href="{{ route('profile.index', [auth()->user()->username]) }}" class="nav-item is-tab">
                    <figure class="image is-24x24" style="margin-right: 8px;">
                        <img src="{{ auth()->user()->getAvatar() }}">
                    </figure>
                    Profile
                </a>
                <a href="{{ route('logout') }}"
                   class="nav-item is-tab"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Log out
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endif
        </div>
    </div>
</nav>