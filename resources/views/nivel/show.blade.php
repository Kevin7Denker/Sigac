<x-app-layout>


  <div class="p-6 text-gray-900 dark:text-gray-100">
    <h2 class="text-2xl font-bold mb-2">{{ $nivei->nome }}</h2>
    <div class="mt-4 flex gap-2">
      <a href="{{ route('coordenador.niveis.edit', $nivei->id) }}"
        class="px-4 py-2 bg-red-800 text-white rounded no-underline hover:bg-red-900">Editar</a>
      <a href="{{ route('coordenador.niveis.index') }}"
        class="px-4 py-2 bg-gray-400 text-white rounded no-underline hover:bg-gray-500">Voltar</a>
    </div>
  </div>

</x-app-layout>
