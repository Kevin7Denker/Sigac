<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIGAC - Sistema de Gerenciamento de Atividades Complementares</title>
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @endif
</head>

<style>
.btn {
  width: 130px;
  height: 40px;
  font-size: 1.1em;
  cursor: pointer;
  background-color: #7f1d1d !important;
  color: #fff !important;
  border: none;
  border-radius: 5px;
  transition: all .4s !important;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
  font-weight: bold;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
}

.btn:hover {
  border-radius: 5px;
  transform: translateY(-10px);
  box-shadow: 0 7px 0 -2px #b91c1c,
    0 15px 0 -4px #ef4444,
    0 16px 10px -3px #fca5a5;
  background-color: #991b1b;
}
</style>

<body class="min-h-screen bg-gradient-to-br from-red-50 via-neutral-100 to-neutral-200 flex flex-col">
  <main class="flex-1 flex flex-row items-stretch justify-center gap-0 px-0 py-0">
    <aside
      class="hidden lg:flex flex-col justify-center items-center bg-red-900/90 w-1/2 p-12 relative overflow-hidden">

      <div class="relative flex flex-col items-center z-10 gap-8">
        <img src="{{ asset('Assets/dashboard.png') }}" alt="Prévia do Painel"
          class="w-full max-w-md rounded-lg shadow-lg mb-8">
        <div class="absolute -top-8 -left-8 w-32 h-32 bg-white rounded-full blur-2xl opacity-20"></div>
        <div class="absolute -bottom-8 -right-8 w-24 h-24 bg-white rounded-full blur-2xl opacity-10"></div>
      </div>
    </aside>
    <section
      class="flex flex-col justify-center items-center w-full lg:w-1/2 bg-white p-12 gap-8 relative overflow-hidden">

      <div class="absolute top-4 left-4 w-16 h-16 bg-red-200 rounded-full blur-xl opacity-60 z-0"></div>
      <div class="absolute bottom-8 right-8 w-24 h-24 bg-red-300 rounded-full blur-2xl opacity-40 z-0"></div>
      <div class="absolute top-1/2 right-0 w-12 h-12 bg-red-100 rounded-full blur-lg opacity-50 z-0"></div>
      <div class="absolute bottom-1/4 left-12 w-10 h-10 bg-red-400 rounded-full blur-lg opacity-30 z-0"></div>

      <h1 class="text-4xl lg:text-5xl font-black mb-6 text-red-900 leading-tight drop-shadow text-center z-10">SIGAC by
        DENKER</h1>
      <p class="text-lg text-neutral-700 mb-8 text-center z-10">Esta é uma versão de teste do SIGAC.
        Alguns recursos ainda podem estar em desenvolvimento ou sujeitos a alterações.
        Agradecemos seu feedback para ajudar a melhorar o sistema.</p>
      @if (Route::has('login'))
      <div class="flex flex-col gap-6 w-full max-w-xs mx-auto z-10">
        <div class="flex justify-center">
          <a href="{{ route('login') }}" class="btn text-center justify-center items-center" role="button"
            aria-label="Entrar" style="display: flex;">
            <span class="flex items-center gap-2 justify-center w-full text-center">
              <span class="w-full text-center">Entrar</span>
            </span>
          </a>
        </div>
        @if (Route::has('register'))
        <p class="text-center text-neutral-700 text-l">
          Não possui uma conta?
          <a href="{{ route('register') }}"
            class="text-red-900 hover:text-red-700 transition no-underline">Cadastre-se!</a>
        </p>
        @endif
      </div>
      @endif
    </section>
  </main>
</body>

</html>
