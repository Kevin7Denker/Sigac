<x-app-layout>
  <div class="p-8 max-w-2xl mx-auto text-gray-900 dark:text-gray-100">
    <h2 class="text-3xl font-extrabold mb-4 text-dark-red-600 dark:text-dark-red-400">
      Declaração
    </h2>
    <div class="space-y-3">
      <p>
        <span class="font-semibold text-dark-red-600 dark:text-dark-red-400">Hash:</span>
        {{ $declaraco->hash }}
      </p>
      <p>
        <span class="font-semibold text-dark-red-600 dark:text-dark-red-400">Data:</span>
        {{ $declaraco->data }}
      </p>
      <p>
        <span class="font-semibold text-dark-red-600 dark:text-dark-red-400">Aluno:</span>
        {{ $declaraco->aluno->nome ?? '-' }}
      </p>
      <p>
        <span class="font-semibold text-dark-red-600 dark:text-dark-red-400">Comprovante:</span>
        {{ $declaraco->comprovante->atividade ?? '-' }}
      </p>
    </div>

    <div class="mt-8 flex gap-3">
      <a href="{{ route('coordenador.declaracoes.edit', $declaraco->id) }}"
        class="px-5 py-2 bg-dark-red-600 text-white rounded-lg shadow hover:bg-dark-red-700 transition no-underline">Editar</a>
      <a href="{{ route('coordenador.declaracoes.index') }}"
        class="px-5 py-2 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600 transition no-underline">Voltar</a>
    </div>
  </div>

  <style>
  .text-dark-red-600 {
    color: #991b1b;
  }

  .text-dark-red-400 {
    color: #f87171;
  }

  .bg-dark-red-600 {
    background-color: #991b1b;
  }

  .bg-dark-red-700 {
    background-color: #7f1d1d;
  }
  </style>
</x-app-layout>
