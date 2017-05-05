@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container container__blog">

            @include('posts._post-list')

        </div>
    </section>
@endsection
