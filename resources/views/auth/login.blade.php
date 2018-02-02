@extends('layouts.login')

@section('head')

    <link rel="stylesheet" href="/css/signin.css">
    <link rel="stylesheet" href="/css/parsley.css">

@stop

@section('content')


    {!! Form::open(['url' => url('login'), 'class' => 'form-signin', 'data-parsley-validate' ] ) !!}


    @include('partials.status')

    <h2 class="form-signin-heading">Please sign in</h2>

    <label for="username" class="sr-only">Username</label>
    {!! Form::text('username', null, [
        'class'                         => 'form-control',
        'placeholder'                   => 'Username',
        'required',
        'id'                            => 'username',
        'data-parsley-required-message' => 'Username is required',
        'data-parsley-trigger'          => 'change focusout',
        'data-parsley-type'             => 'string'
    ]) !!}

    <label for="password" class="sr-only">Password</label>
    {!! Form::password('password', [
        'class'                         => 'form-control',
        'placeholder'                   => 'Password',
        'required',
        'id'                            => 'password',
        'data-parsley-required-message' => 'Password is required',
        'data-parsley-trigger'          => 'change focusout',
        'data-parsley-minlength'        => '5',
        'data-parsley-maxlength'        => '20'
    ]) !!}

    <div style="height:15px;"></div>
    <div class="row">
        <div class="col-md-12">
            <fieldset class="form-group">
                {!! Form::checkbox('remember', 1, null, ['id' => 'remember-me']) !!}
                <label for="remember-me">Remember me</label>
            </fieldset>
        </div>
    </div>

    <button class="btn btn-lg btn-primary btn-block login-btn" type="submit">Sign in</button>
    <p><a href="{{ url('password/reset') }}">Forgot password?</a></p>

    <p class="or-social">Or Use Social Login</p>

    @include('partials.socials')

    {!! Form::close() !!}

@stop

@section('footer')

    <script type="text/javascript">
        window.ParsleyConfig = {
            errorsWrapper: '<div></div>',
            errorTemplate: '<span class="error-text"></span>',
            classHandler: function (el) {
                return el.$element.closest('input');
            },
            successClass: 'valid',
            errorClass: 'invalid'
        };
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.5.0/parsley.min.js"></script>

@stop
