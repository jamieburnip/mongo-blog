<nav class="nav draft-bar">
    <div class="container">
        <div class="nav-left">
            <div class="nav-item">
                <div class="field is-grouped">
                    <p class="control level-item" title="You have {{ $user->getTotalPostCount() }} posts in total">
                        You have {{ $user->getPublishedPostCount() }} published posts
                    </p>
                </div>
            </div>
        </div>
        <div class="nav-right nav-menu">
            <div class="nav-item">
                <div class="field is-grouped">
                    <p class="control">
                        <a class="level-item button is-white" title="View Drafts"
                           href="{{ route('post.drafts') }}">
                            ({{ $user->getDraftPostCount() }}) Drafts
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</nav>