@extends('layouts.app')

@section('content')
    <div class="card card-container form-blade">
        <form class="form-signin" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <br/>
            <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="">
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                    @if ($errors->has('email'))
                        <div id="help-err">
                            <p><strong>{{ $errors->first('email') }}</strong></p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" id="password" name="password" placeholder="Password" required="required">
                @if ($errors->has('password'))
                    <div id="help-err">
                        <p><strong>{{ $errors->first('password') }}</strong></p>
                    </div>
                @endif
            </div>

            <div id="remember" class="checkbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
            </div>
            <button type="submit" class="button expanded btn-signin">Submit</button>

            <a href="{{ route('password.request') }}" class="">
                Forgot the password?
            </a>
        </form>
    </div>

@endsection
