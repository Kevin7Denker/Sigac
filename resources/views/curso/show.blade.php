<x-app-layout>
  <div class="p-8 max-w-3xl mx-auto text-gray-900 dark:text-gray-100">
    <h2 class="text-3xl font-extrabold mb-4 text-dark-red-600 dark:text-dark-red-400">
      {{ $curso->nome }}
    </h2>
    <div class="space-y-2">
      <p>
        <span class="font-semibold text-dark-red-600 dark:text-dark-red-400">Sigla:</span>
        {{ $curso->sigla }}
      </p>
      <p>
        <span class="font-semibold text-dark-red-600 dark:text-dark-red-400">Total de Horas:</span>
        {{ $curso->total_horas }}
      </p>
      <p>
        <span class="font-semibold text-dark-red-600 dark:text-dark-red-400">Nível:</span>
        {{ $curso->nivel->nome ?? 'N/A' }}
      </p>
      <p>
        <span class="font-semibold text-dark-red-600 dark:text-dark-red-400">Eixo:</span>
        {{ $curso->eixo->nome ?? 'N/A' }}
      </p>
      <p>
        <span class="font-semibold text-dark-red-600 dark:text-dark-red-400">Criado em:</span>
        {{ $curso->created_at }}
      </p>
      <p>
        <span class="font-semibold text-dark-red-600 dark:text-dark-red-400">Atualizado em:</span>
        {{ $curso->updated_at }}
      </p>
    </div>

    <div class="mt-8 space-y-6">
      <div>
        <h3 class="font-semibold text-lg text-dark-red-600 dark:text-dark-red-400 mb-2">Alunos</h3>
        <ul class="list-disc ml-6 space-y-1">
          @forelse($curso->aluno as $aluno)
          <li>{{ $aluno->nome }}</li>
          @empty
          <li class="text-gray-400">Nenhum aluno cadastrado.</li>
          @endforelse
        </ul>
      </div>
      <div>
        <h3 class="font-semibold text-lg text-dark-red-600 dark:text-dark-red-400 mb-2">Categorias</h3>
        <ul class="list-disc ml-6 space-y-1">
          @forelse($curso->categoria as $categoria)
          <li>{{ $categoria->nome }}</li>
          @empty
          <li class="text-gray-400">Nenhuma categoria cadastrada.</li>
          @endforelse
        </ul>
      </div>
      <div>
        <h3 class="font-semibold text-lg text-dark-red-600 dark:text-dark-red-400 mb-2">Turmas</h3>
        <ul class="list-disc ml-6 space-y-1">
          @forelse($curso->turma as $turma)
          <li>{{ $turma->ano }}</li>
          @empty
          <li class="text-gray-400">Nenhuma turma cadastrada.</li>
          @endforelse
        </ul>
      </div>
    </div>

    <div class="mt-8 flex gap-3">
      <a href="{{ route('coordenador.cursos.edit', $curso->id) }}"
        class="px-5 py-2 bg-dark-red-600 text-white rounded-lg shadow hover:bg-dark-red-700 transition no-underline">Editar</a>
      <a href="{{ route('coordenador.cursos.index') }}"
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
