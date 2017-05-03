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
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/new-post') }}">
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
                        <textarea id="body" name="body" class="textarea {{ $errors->has('body') ? ' is-danger' : '' }}"
                                  required></textarea>
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

@section('styles')
    <!-- Include external CSS. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">

    <!-- Include Editor style. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('scripts')
    <!-- Include external JS libs. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1//js/froala_editor.pkgd.min.js"></script>

    <!-- Initialize the editor. -->
    <script>
        $(function() {
            $('textarea').froalaEditor({
                heightMin: 320
            })
        });
    </script>
@endsection