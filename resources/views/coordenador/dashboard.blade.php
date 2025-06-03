<x-app-layout>
  <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

    @php
    $cards = [
    ['route' => 'coordenador.alunos.index', 'label' => 'Gerenciar Alunos', 'icon' => '👨‍🎓', 'color' => 'bg-indigo-100
    text-indigo-700 border-indigo-200'],
    ['route' => 'coordenador.categorias.index', 'label' => 'Gerenciar Categorias', 'icon' => '🏷️', 'color' =>
    'bg-pink-100 text-pink-700 border-pink-200'],
    ['route' => 'coordenador.comprovantes.index', 'label' => 'Gerenciar Comprovantes', 'icon' => '📄', 'color' =>
    'bg-green-100 text-green-700 border-green-200'],
    ['route' => 'coordenador.cursos.index', 'label' => 'Gerenciar Cursos', 'icon' => '📚', 'color' => 'bg-yellow-100
    text-yellow-700 border-yellow-200'],
    ['route' => 'coordenador.declaracoes.index', 'label' => 'Gerenciar Declarações', 'icon' => '📝', 'color' =>
    'bg-blue-100 text-blue-700 border-blue-200'],
    ['route' => 'coordenador.documentos.index', 'label' => 'Gerenciar Documentos', 'icon' => '📁', 'color' =>
    'bg-purple-100 text-purple-700 border-purple-200'],
    ['route' => 'coordenador.eixos.index', 'label' => 'Gerenciar Eixos', 'icon' => '🧭', 'color' => 'bg-teal-100
    text-teal-700 border-teal-200'],
    ['route' => 'coordenador.niveis.index', 'label' => 'Gerenciar Níveis', 'icon' => '📊', 'color' => 'bg-orange-100
    text-orange-700 border-orange-200'],
    ['route' => 'coordenador.turmas.index', 'label' => 'Gerenciar Turmas', 'icon' => '🏫', 'color' => 'bg-red-100
    text-red-700 border-red-200'],
    ];
    @endphp

    <article class="bg-white rounded-xl shadow-lg p-6 flex items-center col-span-full mb-2">
      <div class="flex-shrink-0">
        <span
          class="inline-flex h-16 w-16 rounded-full bg-red-900 text-red-100 items-center justify-center text-3xl font-bold border-2 border-red-800"
          aria-label="Avatar">
          {{ mb_substr(Auth::user()->name, 0, 1) }}
        </span>
      </div>
      <div class="ml-6">
        <header class="text-xl font-semibold text-red-800">Bem-vindo de volta, {{ Auth::user()->name }}!</header>
        <div class="text-red-600 text-base">{{ Auth::user()->email }}</div>
      </div>
    </article>

    @foreach($cards as $card)
    <a href="{{ route($card['route']) }}"
      class="no-underline flex flex-col items-center justify-center p-3 rounded-xl shadow bg-white hover:shadow-lg transition border {{ $card['color'] }}">
      <span class="text-4xl mb-3">{{ $card['icon'] }}</span>
      <span class="text-lg font-semibold text-center">{{ $card['label'] }}</span>
    </a>
    @endforeach

  </section>
</x-app-layout>
