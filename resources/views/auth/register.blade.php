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
            <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="field">
                    <label class="label" for="name">Name</label>
                    <p class="control has-icons-left">
                        <input id="name" name="name" type="text" value="{{ old('name') }}"
                               class="input {{ $errors->has('name') ? ' is-danger' : '' }}" required autofocus>
                        <span class="icon is-small is-left">
                                  <i class="fa fa-user"></i>
                                </span>
                    </p>
                    @if ($errors->has('name'))
                        <p class="help is-danger">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>

                <div class="field">
                    <label class="label" for="username">Username</label>
                    <p class="control has-icons-left">
                        <input id="username" name="username" type="text" value="{{ old('username') }}"
                               class="input {{ $errors->has('username') ? ' is-danger' : '' }}" required>
                        <span class="icon is-small is-left">
                                  <i class="fa fa-at"></i>
                                </span>
                    </p>
                    @if ($errors->has('username'))
                        <p class="help is-danger">
                            {{ $errors->first('username') }}
                        </p>
                    @endif
                </div>

                <div class="field">
                    <label class="label" for="email">Email</label>
                    <p class="control has-icons-left">
                        <input id="email" name="email" type="email" value="{{ old('email') }}"
                               class="input {{ $errors->has('email') ? ' is-danger' : '' }}" required>
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
                    <label class="label" for="password">Password</label>
                    <p class="control has-icons-left">
                        <input id="password" name="password" type="password"
                               class="input {{ $errors->has('password') ? ' is-danger' : '' }}" required>
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
                    <label class="label" for="password-confirm">Confirm Password</label>
                    <p class="control has-icons-left">
                        <input id="password-confirm" name="password_confirmation" type="password" class="input" required>
                        <span class="icon is-small is-left">
                            <i class="fa fa-lock"></i>
                        </span>
                    </p>
                </div>

                <div class="field">
                    <p class="control">
                        <button type="submit" class="button is-success">
                            Register
                        </button>
                    </p>
                </div>
            </form>
        </div>
    </section>
@endsection
