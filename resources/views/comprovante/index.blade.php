<x-app-layout>
  @if (session('success'))
  <div
    class="mb-4 flex items-center gap-2 p-4 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded-lg shadow">
    <svg class="w-5 h-5 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" stroke-width="2"
      viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
    </svg>
    <span>{{ session('success') }}</span>
  </div>
  @endif

  <div class="flex flex-col sm:flex-row sm:justify-between items-center mb-8 gap-4">
    <h1 class="text-2xl font-bold tracking-tight text-gray-800 dark:text-gray-100">Comprovantes</h1>
    <a href="{{ route('coordenador.comprovantes.create') }}"
      class="btn from-red-800 to-red-600 hover:from-red-900 hover:to-red-700 shadow-lg">
      <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
      </svg>
      Criar Novo Comprovante
    </a>
  </div>

  <div class="overflow-x-auto rounded-xl shadow">
    <table class="min-w-full bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl">
      <thead>
        <tr class="text-white" style="background-color: #991b1b !important;">
          <th class="px-4 py-3 text-left font-semibold">Horas</th>
          <th class="px-4 py-3 text-left font-semibold">Atividade</th>
          <th class="px-4 py-3 text-left font-semibold">Categoria</th>
          <th class="px-4 py-3 text-left font-semibold">Aluno</th>
          <th class="px-4 py-3 text-left font-semibold">Ações</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($comprovantes as $comprovante)
        <tr class="hover:bg-red-50 dark:hover:bg-gray-800 transition">
          <td class="px-4 py-3">{{ $comprovante->horas }}</td>
          <td class="px-4 py-3">{{ $comprovante->atividade }}</td>
          <td class="px-4 py-3">{{ $comprovante->categoria->nome ?? '-' }}</td>
          <td class="px-4 py-3">{{ $comprovante->aluno->nome ?? '-' }}</td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex flex-wrap gap-2">
              <a href="{{ route('coordenador.comprovantes.show', $comprovante->id) }}"
                class="btn bg-red-800 hover:bg-red-900 flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                  </path>
                </svg>
                Ver
              </a>
              <a href="{{ route('coordenador.comprovantes.edit', $comprovante->id) }}"
                class="btn bg-yellow-500 hover:bg-yellow-600 text-gray-900 flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6M3 21h18"></path>
                </svg>
                Editar
              </a>
              <form action="{{ route('coordenador.comprovantes.destroy', $comprovante->id) }}" method="POST"
                class="inline-block" onsubmit="return confirm('Tem certeza que deseja excluir este comprovante?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn bg-red-700 hover:bg-red-800 flex items-center gap-1">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
                  Excluir
                </button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5" class="text-center text-gray-500 dark:text-gray-400 py-8">Nenhum comprovante cadastrado.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-6">
    {{ $comprovantes->links() }}
  </div>

  <style>
  .btn {
    min-width: 130px;
    height: 40px;
    font-size: 1.05em;
    cursor: pointer;
    background-color: #991b1b !important;
    color: #fff !important;
    border: none;
    border-radius: 8px;
    transition: all .3s cubic-bezier(.4, 0, .2, 1);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    font-weight: 600;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    outline: none;
  }

  .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    background-color: #7f1d1d !important;
  }
  </style>
</x-app-layout>