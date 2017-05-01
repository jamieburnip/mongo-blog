@extends('layouts.app')

@section('content')
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Primary title
                </h1>
                <h2 class="subtitle">
                    Primary subtitle
                </h2>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container container__blog">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/new-post') }}">
                {{ csrf_field() }}

                <div class="field">
                    <label for="title" class="label">Post Title</label>
                    <p class="control">
                        <input id="title" name="title" class="input {{ $errors->has('title') ? ' is-danger' : '' }}"
                               type="text" required autofocus>
                    </p>
                    @if ($errors->has('title'))
                        <p class="help is-danger">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>

                <div class="field">
                    <label for="body" class="label">Post</label>
                    <p class="control">
                        <textarea id="body" name="body" class="textarea {{ $errors->has('body') ? ' is-danger' : '' }}" required></textarea>
                    </p>
                    @if ($errors->has('body'))
                        <p class="help is-danger">
                            {{ $errors->first('body') }}
                        </p>
                    @endif
                </div>

                <div class="field">
                    <p class="control">
                        <button class="button is-success">
                            Post
                        </button>
                    </p>
                </div>
            </form>
        </div>
    </section>
@endsection
