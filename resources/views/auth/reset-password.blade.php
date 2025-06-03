<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>{{ __('Reset Password') }}</title>
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
    min-height: 500px;
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
    margin: 10px 0 30px 0;
    font-size: 28px;
    font-weight: 800;
    color: #7f1d1d;
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
    text-decoration: underline;
    margin: 0;
    text-align: end;
    color: #7f1d1d;
    text-decoration-color: #7f1d1d;
  }

  .page-link-label {
    cursor: pointer;
    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
      "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
    font-size: 9px;
    font-weight: 700;
    color: #7f1d1d;
  }

  .page-link-label:hover {
    color: #000;
  }

  .sign-up-label {
    margin: 0;
    font-size: 10px;
    color: #747474;
    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
      "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
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
    <p class="title">{{ __('Reset Password') }}</p>
    <form class="form" method="POST" action="{{ route('password.store') }}">
      @csrf
      <input type="hidden" name="token" value="{{ $request->route('token') }}">

      <input type="email" class="input" name="email" placeholder="{{ __('Email') }}"
        value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
      @if ($errors->has('email'))
      <span style="color:#b91c1c; font-size:12px;">{{ $errors->first('email') }}</span>
      @endif

      <input type="password" class="input" name="password" placeholder="{{ __('Password') }}" required
        autocomplete="new-password">
      @if ($errors->has('password'))
      <span style="color:#b91c1c; font-size:12px;">{{ $errors->first('password') }}</span>
      @endif

      <input type="password" class="input" name="password_confirmation" placeholder="{{ __('Confirm Password') }}"
        required autocomplete="new-password">
      @if ($errors->has('password_confirmation'))
      <span style="color:#b91c1c; font-size:12px;">{{ $errors->first('password_confirmation') }}</span>
      @endif

      <button class="form-btn" type="submit">{{ __('Reset Password') }}</button>
    </form>
    <p class="sign-up-label">
      {{ __("Remember your password?") }}
      @if (Route::has('login'))
      <a href="{{ route('login') }}" class="sign-up-link">{{ __('Log in') }}</a>
      @endif
    </p>
  </div>
</body>

</html>