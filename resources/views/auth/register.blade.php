@extends('layouts.app')

@section('content')
    <div class="card card-container form-blade">
        <form class="form-signin" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <br/>

            <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                <div class="">
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>
                    @if ($errors->has('name'))
                        <div id="help-err">
                            <p><strong>{{ $errors->first('name') }}</strong></p>
                        </div>
                    @endif
                </div>
            </div>

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

            <div class="">
                <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password" required>
            </div>


            <button type="submit" class="button expanded btn-signin">Register</button>

        </form>
    </div>

@endsection
