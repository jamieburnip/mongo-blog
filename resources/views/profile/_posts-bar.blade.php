<nav class="nav draft-bar">
    <div class="container">
        <div class="nav-left">
            <div class="nav-item">
                <div class="field is-grouped">
                    <p class="control level-item" title="You have {{ $user->getTotalPostCount() }} posts in total">
                        {{ $user->name }} has {{ $user->getPublishedPostCount() }} published posts
                    </p>
                </div>
            </div>
        </div>
    </div>
</nav>