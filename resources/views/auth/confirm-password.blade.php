<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ __('Confirm Password') }}</title>
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
        min-height: 350px;
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
    .desc {
        text-align: center;
        color: #555;
        font-size: 14px;
        margin-bottom: 25px;
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
        font-size: 16px;
        font-weight: 700;
    }
    .form-btn:active {
        box-shadow: none;
    }
    .error-message {
        color: #b91c1c;
        font-size: 12px;
        margin-top: -10px;
        margin-bottom: 5px;
    }
    </style>
</head>
<body>
    <div class="form-container">
        <p class="title">{{ __('Confirm Password') }}</p>
        <div class="desc">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>
        <form class="form" method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <input
                id="password"
                class="input"
                type="password"
                name="password"
                placeholder="{{ __('Password') }}"
                required
                autocomplete="current-password"
            >
            @if ($errors->has('password'))
                <span class="error-message">{{ $errors->first('password') }}</span>
            @endif
            <button class="form-btn" type="submit">{{ __('Confirm') }}</button>
        </form>
    </div>
</body>
</html>
