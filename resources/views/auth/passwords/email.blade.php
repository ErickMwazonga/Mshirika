@extends('layouts.app')

@section('content')
    {{--<div class="row">--}}
        {{--<div class="form-blade medium-6 medium-offset-3 columns">--}}
            {{--<form>--}}
                {{--<label for="email">Email address</label>--}}
                {{--<input type="email" id="email" placeholder="Email">--}}
                {{--<label for="name">Name</label>--}}
                {{--<input type="text" id="name" placeholder="Name">--}}
                {{--<label for="msg">Your Message</label>--}}
                {{--<textarea id="msg" rows="5" placeholder="Message"></textarea>--}}
                {{--<button type="button" class="button success">Submit</button>--}}
            {{--</form>--}}
        {{--</div>--}}
    {{--</div>--}}

<div class="container">
    <div class="row">
        <div class="form-blade large-6 large-offset-3 columns">
            <div class="form-signin panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-signin form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="button primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
