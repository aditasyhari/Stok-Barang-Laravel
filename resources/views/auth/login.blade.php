@extends('auth.layouts')

@section('content')
<div class="brand-logo">
    <img src="https://i.ibb.co/DpbskFt/Ud-Wangi-Agung.png" alt="logo">
</div>
<h4>Halo! selamat datang.</h4>
<h6 class="font-weight-light">Sign in untuk melanjutkan.</h6>

<form class="pt-3" action="{{ route('login') }}" method="POST">
    @csrf
    <div class="form-group">
        <!-- <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email"> -->
        <input type="text" class="form-control form-control-lg {{ $errors->has('username') || $errors->has('email') ?'is-invalid':'' }}" name="login" value="{{ old('username') ? old('username') : old('email')  }}" placeholder="Username or Email" required />
        @if ($errors->has('username') || $errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('username') ? $errors->first('username') : $errors->first('email')  }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <!-- <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password"> -->
        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="mt-3">
        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
    </div>
</form>

@endsection
