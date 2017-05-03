@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container container__blog">

            {{--<blog-snippet></blog-snippet>--}}

            @include('posts._post-list')

        </div>
    </section>
@endsection
