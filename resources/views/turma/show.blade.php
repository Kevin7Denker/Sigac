<x-app-layout>

  <h2 class="text-3xl font-bold mb-4 text-red-900">Ano: {{ $turma->ano }}</h2>
  <div class="mb-4">
    <p class="mb-2"><span class="font-semibold">Curso:</span> {{ $turma->curso->nome ?? 'N/A' }}</p>
    <p class="mb-2"><span class="font-semibold">Criado em:</span> {{ $turma->created_at }}</p>
    <p class="mb-2"><span class="font-semibold">Atualizado em:</span> {{ $turma->updated_at }}</p>
  </div>
  <div class="flex gap-4 mb-4">
    <a href="{{ route('coordenador.turmas.edit', $turma->id) }}"
      class="flex-1 px-4 py-2 bg-red-800 text-white no-underline rounded hover:bg-red-900 text-center">Editar</a>
    <a href="{{ route('coordenador.turmas.index') }}"
      class="flex-1 px-4 py-2 bg-gray-400 no-underline text-white rounded hover:bg-gray-500 text-center">Voltar</a>
  </div>
  <a href="{{ route('coordenador.turmas.grafico_horas', $turma->id) }}"
    class="block w-full px-4 py-2 bg-red-800  no-underline text-white rounded shadow hover:bg-red-900 transition text-center">Ver
    Gráfico de Horas Cumpridas</a>

</x-app-layout>
