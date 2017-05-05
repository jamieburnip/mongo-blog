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
            <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}


                <div class="field">
                    <p class="control has-icons-left">
                        <input id="email" name="email" type="email" placeholder="Email"
                               class="input {{ $errors->has('email') ? ' is-danger' : '' }}" required
                               autofocus>
                        <span class="icon is-small is-left">
                                  <i class="fa fa-envelope"></i>
                                </span>
                    </p>
                    @if ($errors->has('email'))
                        <p class="help is-danger">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>

                <div class="field">
                    <p class="control has-icons-left">
                        <input id="password" name="password" type="password" placeholder="Password"
                               class="input" required>
                        <span class="icon is-small is-left">
                                  <i class="fa fa-lock"></i>
                                </span>
                    </p>
                    @if ($errors->has('password'))
                        <p class="help is-danger">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>

                <div class="field">
                    <p class="control">
                        <label class="checkbox">
                            <input type="checkbox"
                                   name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </p>
                </div>

                <div class="field">
                    <p class="control">
                        <button class="button is-success">
                            Login
                        </button>
                    </p>
                </div>
            </form>
        </div>
    </section>
@endsection
