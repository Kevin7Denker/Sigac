<x-app-layout>


  <h2 class="text-3xl font-extrabold mb-4 text-dark-red-600 dark:text-dark-red-400">
    {{ $comprovante->atividade }}</h2>
  <div class="space-y-2">
    <p>
      <span class="font-semibold text-dark-red-600 dark:text-dark-red-400">Horas:</span>
      {{ $comprovante->horas }}
    </p>
    <p>
      <span class="font-semibold text-dark-red-600 dark:text-dark-red-400">Categoria:</span>
      {{ $comprovante->categoria->nome ?? '-' }}
    </p>
    <p>
      <span class="font-semibold text-dark-red-600 dark:text-dark-red-400">Aluno:</span>
      {{ $comprovante->aluno->nome ?? '-' }}
    </p>
  </div>
  <div class="mt-6 flex gap-3">
    <a href="{{ route('coordenador.comprovantes.edit', $comprovante->id) }}"
      class="px-5 py-2 bg-dark-red-600 text-white rounded-lg shadow hover:bg-dark-red-700 transition no-underline">Editar</a>
    <a href="{{ route('coordenador.comprovantes.index') }}"
      class="px-5 py-2 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600 transition no-underline">Voltar</a>
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