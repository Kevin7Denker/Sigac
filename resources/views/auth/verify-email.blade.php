<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>{{ __('Verify Email') }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
  body {
    min-height: 100vh;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f5f5f5;
    font-family: "Lucida Sans", Geneva, Verdana, sans-serif;
  }

  .form-container {
    width: 350px;
    min-height: 350px;
    background-color: #fff;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    border-radius: 10px;
    box-sizing: border-box;
    padding: 30px 30px 20px 30px;
    display: flex;
    flex-direction: column;
    gap: 20px;
  }

  .title {
    text-align: center;
    font-size: 24px;
    font-weight: 800;
    color: #7f1d1d;
    margin-bottom: 10px;
  }

  .message {
    color: #444;
    font-size: 14px;
    text-align: center;
  }

  .success {
    color: #15803d;
    background: #dcfce7;
    border-radius: 8px;
    padding: 10px;
    font-size: 13px;
    text-align: center;
  }

  .actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 25px;
  }

  .form-btn {
    padding: 10px 18px;
    border-radius: 20px;
    border: none;
    background: #7f1d1d;
    color: #fff;
    font-weight: 700;
    cursor: pointer;
    font-size: 13px;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    transition: background 0.2s;
  }

  .form-btn:hover {
    background: #a83232;
  }

  .logout-btn {
    background: none;
    border: none;
    color: #7f1d1d;
    text-decoration: underline;
    font-size: 13px;
    cursor: pointer;
    font-weight: 700;
    padding: 0;
  }

  .logout-btn:hover {
    color: #000;
  }
  </style>
</head>

<body>
  <div class="form-container">
    <div class="title">{{ __('Verify Email') }}</div>
    <div class="message">
      {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
    <div class="success">
      {{ __('A new verification link has been sent to the email address you provided during registration.') }}
    </div>
    @endif

    <div class="actions">
      <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button class="form-btn" type="submit">{{ __('Resend Email') }}</button>
      </form>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout-btn">{{ __('Log Out') }}</button>
      </form>
    </div>
  </div>
</body>

</html>