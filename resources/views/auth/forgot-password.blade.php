<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>{{ __('Forgot Password') }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
  body {
    min-height: 100vh;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f5f5f5;
    overflow: hidden;
  }

  .form-container {
    width: 350px;
    min-height: 400px;
    background-color: #fff;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    border-radius: 10px;
    box-sizing: border-box;
    padding: 20px 30px;
  }

  .title {
    text-align: center;
    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
      "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
    margin: 10px 0 20px 0;
    font-size: 28px;
    font-weight: 800;
    color: #7f1d1d;
  }

  .desc {
    text-align: center;
    font-size: 13px;
    color: #555;
    margin-bottom: 25px;
    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
      "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
  }

  .form {
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 18px;
    margin-bottom: 15px;
  }

  .input {
    border-radius: 20px;
    border: 1px solid #c0c0c0;
    outline: 0 !important;
    box-sizing: border-box;
    padding: 12px 15px;
    background: #f5f5f5;
    color: #222;
  }

  .form-btn {
    padding: 10px 15px;
    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
      "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
    border-radius: 20px;
    border: 0 !important;
    outline: 0 !important;
    background: #7f1d1d;
    color: white;
    cursor: pointer;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
  }

  .form-btn:active {
    box-shadow: none;
  }

  .page-link {
    margin: 0;
    text-align: center;
    color: #7f1d1d;
    font-size: 12px;
  }

  .page-link-label {
    cursor: pointer;
    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
      "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
    font-size: 10px;
    font-weight: 700;
    color: #7f1d1d;
    text-decoration: none;
  }

  .page-link-label:hover {
    color: #000;
  }

  .sign-up-label {
    margin-top: 1rem;
    font-size: 10px;
    color: #747474;
    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
      "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
    text-align: center;
  }

  .sign-up-link {

    margin-left: 1px;
    font-size: 11px;
    text-decoration: underline;
    text-decoration-color: #7f1d1d;
    color: #7f1d1d;
    cursor: pointer;
    font-weight: 800;
    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
      "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
  }
  </style>
</head>

<body>
  <div class="form-container">
    <p class="title">{{ __('Forgot Password') }}</p>
    <div class="desc">
      {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>
    @if (session('status'))
    <div style="color: #16a34a; font-size:13px; text-align:center; margin-bottom:10px;">
      {{ session('status') }}
    </div>
    @endif
    <form class="form" method="POST" action="{{ route('password.email') }}">
      @csrf
      <input type="email" class="input" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus
        autocomplete="username">
      @if ($errors->has('email'))
      <span style="color:#b91c1c; font-size:12px;">{{ $errors->first('email') }}</span>
      @endif
      <button class="form-btn" type="submit">{{ __('Email Password Reset Link') }}</button>
    </form>
    <p class="page-link">
      <a class="page-link-label" href="{{ route('login') }}">{{ __('Back to login') }}</a>
    </p>
    <p class="sign-up-label">
      {{ __("Don't have an account?") }}
      @if (Route::has('register'))
      <a href="{{ route('register') }}" class="sign-up-link">Sign up</a>
      @endif
    </p>
  </div>
</body>

</html>