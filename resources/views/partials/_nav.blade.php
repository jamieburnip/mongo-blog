<nav class="nav has-shadow">
    <div class="container">
        <div class="nav-left">
            <a class="nav-item is-tab is-hidden-mobile is-active" href="{{ url('blog') }}">Blog</a>
        </div>
        <span class="nav-toggle">
      <span></span>
      <span></span>
      <span></span>
    </span>
        <div class="nav-right nav-menu">
            <a class="nav-item is-tab is-hidden-tablet is-active" href="{{ url('blog') }}">Blog</a>
            @if (Auth::guest())
                <a href="{{ route('login') }}" class="nav-item is-tab">Login</a>
                <a href="{{ route('register') }}" class="nav-item is-tab">Register</a>
            @else
                <a class="nav-item is-tab">
                    <figure class="image is-16x16" style="margin-right: 8px;">
                        <img src="http://bulma.io/images/jgthms.png">
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