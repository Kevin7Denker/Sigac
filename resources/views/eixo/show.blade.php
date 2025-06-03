<x-app-layout>

  <h3 class="text-2xl font-bold mb-6 text-red-800 dark:text-red-400">Detalhes do Eixo</h3>
  <div class="space-y-2">
    <p><strong class="text-red-800 dark:text-red-400">ID:</strong> <span
        class="text-red-900 dark:text-red-300">{{ $eixo->id }}</span></p>
    <p><strong class="text-red-800 dark:text-red-400">Nome:</strong> <span
        class="text-red-900 dark:text-red-300">{{ $eixo->nome }}</span></p>
  </div>
  <div class="mt-6 flex gap-3">
    <a href="{{ route('coordenador.eixos.edit', $eixo->id) }}"
      class="px-5 py-2 bg-red-800 text-white rounded-lg no-underline shadow hover:bg-red-900 transition">Editar</a>
    <a href="{{ route('coordenador.eixos.index') }}"
      class="px-5 py-2 bg-gray-500 text-white rounded-lg no-underline shadow hover:bg-gray-600 transition">Voltar</a>
  </div>

</x-app-layout>
