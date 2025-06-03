<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>{{ __('Register') }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
  :root {
    --primary: #7f1d1d;
    --background: #f5f5f5;
    --white: #fff;
    --input-bg: #f5f5f5;
    --input-border: #c0c0c0;
    --error: #b91c1c;
    --shadow: 0 4px 24px rgba(127, 29, 29, 0.10);
    --radius: 16px;
    --transition: 0.2s cubic-bezier(.4, 0, .2, 1);
  }

  body {
    min-height: 100vh;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--background);
    font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
  }

  .form-container {
    width: 100%;
    max-width: 420px;
    background: var(--white);
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    padding: 2.5rem 2rem 2rem 2rem;
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
  }

  .title {
    text-align: center;
    font-size: 2rem;
    font-weight: 900;
    color: var(--primary);
    margin-bottom: 0.5rem;
    letter-spacing: -1px;
  }

  .form {
    display: flex;
    flex-direction: column;
    gap: 1.1rem;
  }

  .input,
  select {
    border-radius: var(--radius);
    border: 1.5px solid var(--input-border);
    background: var(--input-bg);
    color: #222;
    font-size: 1rem;
    padding: 0.85rem 1.1rem;
    outline: none;
    transition: border-color var(--transition), box-shadow var(--transition);
    box-sizing: border-box;
  }

  .input:focus,
  select:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 2px rgba(127, 29, 29, 0.08);
  }

  .input-error {
    color: var(--error);
    font-size: 0.92rem;
    margin-top: -0.7rem;
    margin-bottom: 0.5rem;
    padding-left: 0.2rem;
    letter-spacing: -0.2px;
  }

  .form-btn {
    padding: 0.85rem 1.1rem;
    border-radius: var(--radius);
    border: none;
    background: var(--primary);
    color: var(--white);
    font-size: 1.1rem;
    font-weight: 700;
    cursor: pointer;
    box-shadow: 0 2px 8px rgba(127, 29, 29, 0.10);
    transition: background var(--transition), box-shadow var(--transition);
    margin-top: 0.5rem;
  }

  .form-btn:hover,
  .form-btn:focus {
    background: #a83232;
    box-shadow: 0 4px 16px rgba(127, 29, 29, 0.15);
  }

  .sign-up-label {
    font-size: 0.98rem;
    color: #747474;
    text-align: center;
    margin-top: 1.2rem;
  }

  .sign-up-link {
    margin-left: 2px;
    font-size: 1rem;
    text-decoration: underline;
    color: var(--primary);
    font-weight: 800;
    transition: color var(--transition);
  }

  .sign-up-link:hover {
    color: #a83232;
  }

  @media (max-width: 500px) {
    .form-container {
      padding: 1.2rem 0.7rem;
      max-width: 98vw;
    }

    .title {
      font-size: 1.4rem;
    }
  }
  </style>
</head>

<body>
  <div class="form-container">
    <p class="title">{{ __('Register') }}</p>
    <form class="form" method="POST" action="{{ route('register') }}">
      @csrf

      <input type="text" class="input" name="name" placeholder="{{ __('Nome') }}" value="{{ old('name') }}" required
        autofocus autocomplete="name">
      @if ($errors->has('name'))
      <div class="input-error">{{ $errors->first('name') }}</div>
      @endif

      <input type="text" class="input" name="cpf" placeholder="{{ __('CPF') }}" value="{{ old('cpf') }}" required>
      @if ($errors->has('cpf'))
      <div class="input-error">{{ $errors->first('cpf') }}</div>
      @endif

      <input type="email" class="input" name="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required
        autocomplete="username">
      @if ($errors->has('email'))
      <div class="input-error">{{ $errors->first('email') }}</div>
      @endif

      <input type="password" class="input" name="password" placeholder="{{ __('Password') }}" required
        autocomplete="new-password">
      @if ($errors->has('password'))
      <div class="input-error">{{ $errors->first('password') }}</div>
      @endif

      <input type="password" class="input" name="password_confirmation" placeholder="{{ __('Confirm Password') }}"
        required autocomplete="new-password">
      @if ($errors->has('password_confirmation'))
      <div class="input-error">{{ $errors->first('password_confirmation') }}</div>
      @endif

      <select name="curso_id" class="input" required>
        <option value="">{{ __('Selecione um curso') }}</option>
        @foreach($cursos as $curso)
        <option value="{{ $curso->id }}" {{ old('curso_id') == $curso->id ? 'selected' : '' }}>{{ $curso->nome }}
        </option>
        @endforeach
      </select>
      @if ($errors->has('curso_id'))
      <div class="input-error">{{ $errors->first('curso_id') }}</div>
      @endif

      <select name="turma_id" class="input" required>
        <option value="">{{ __('Selecione uma turma') }}</option>
        @foreach($turmas as $turma)
        <option value="{{ $turma->id }}" {{ old('turma_id') == $turma->id ? 'selected' : '' }}>{{ $turma->ano }}
          ({{ $turma->curso->nome ?? '' }})</option>
        @endforeach
      </select>
      @if ($errors->has('turma_id'))
      <div class="input-error">{{ $errors->first('turma_id') }}</div>
      @endif

      <button class="form-btn" type="submit">{{ __('Register') }}</button>
    </form>
    <p class="sign-up-label">
      {{ __('Already registered?') }}
      <a href="{{ route('login') }}" class="sign-up-link">{{ __('Log in') }}</a>
    </p>
  </div>
</body>

</html>