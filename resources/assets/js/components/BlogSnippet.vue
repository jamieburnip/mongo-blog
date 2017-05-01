<template>
    <div class="box">
        <article class="media">
            <div class="media-content">
                <div class="content">
                    <h2><a href="/blog/1">Lorem ipsum dolor sit amet</a></h2>
                    <p>
                        Consectetur adipiscing elit. Aenean efficitur sit amet massa
                        fringilla egestas. Nullam condimentum luctus turpis.
                        <br>
                        <strong>John Smith</strong>
                        <small>@johnsmith</small>
                        <small>31m</small>
                    </p>
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
</template>

<script>
    export default {
//        name:'blog-snippet',
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
