<x-app-layout>
  @if (session('success'))
  <div
    class="mb-4 flex items-center gap-2 p-4 bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 rounded-lg shadow">
    <svg class="w-5 h-5 text-red-600 dark:text-red-300" fill="none" stroke="currentColor" stroke-width="2"
      viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
    </svg>
    <span>{{ session('success') }}</span>
  </div>
  @endif

  <div class="flex flex-col sm:flex-row sm:justify-between items-center mb-8 gap-4">
    <h1 class="text-2xl font-bold tracking-tight text-red-800 dark:text-red-100">Documentos</h1>
    <a href="{{ route('coordenador.documentos.create') }}"
      class="btn from-red-900 to-red-700 hover:from-red-950 hover:to-red-800 shadow-lg">
      <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
      </svg>
      Novo Documento
    </a>
  </div>

  <div class="overflow-x-auto rounded-xl shadow">
    <table class="min-w-full bg-white dark:bg-gray-900 border border-red-200 dark:border-red-800 rounded-xl">
      <thead>
        <tr class="text-white" style="background-color: #991b1b !important;">
          <th class="px-4 py-3 text-left font-semibold">ID</th>
          <th class="px-4 py-3 text-left font-semibold">URL</th>
          <th class="px-4 py-3 text-left font-semibold">Descrição</th>
          <th class="px-4 py-3 text-left font-semibold">Arquivo</th>
          <th class="px-4 py-3 text-left font-semibold">Ações</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($documentos as $documento)
        <tr class="hover:bg-red-50 dark:hover:bg-gray-800 transition">
          <td class="px-4 py-3">{{ $documento->id }}</td>
          <td class="px-4 py-3">
            @if(Str::endsWith($documento->url, '.pdf'))
            <a href="{{ asset('storage/' . $documento->url) }}" target="_blank" class="text-red-600 underline">PDF</a>
            @else
            <a href="{{ $documento->url }}" target="_blank" class="text-red-600 underline">Link</a>
            @endif
          </td>
          <td class="px-4 py-3">{{ $documento->descricao }}</td>
          <td class="px-4 py-3">
            @if(Str::endsWith($documento->url, '.pdf'))
            <a href="{{ asset('storage/' . $documento->url) }}" target="_blank"
              class="text-red-600 underline">Visualizar PDF</a>
            @else
            <a href="{{ $documento->url }}" target="_blank" class="text-red-600 underline">Visualizar</a>
            @endif
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex flex-wrap gap-2">
              <a href="{{ route('coordenador.documentos.show', $documento->id) }}"
                class="btn bg-red-900 hover:bg-red-950 flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                  </path>
                </svg>
                Ver
              </a>
              <a href="{{ route('coordenador.documentos.edit', $documento->id) }}"
                class="btn bg-red-900 hover:bg-red-950 flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6M3 21h18"></path>
                </svg>
                Editar
              </a>

              <form action="{{ route('coordenador.documentos.destroy', $documento->id) }}" method="POST"
                class="inline-block" onsubmit="return confirm('Tem certeza que deseja excluir este documento?');">
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
          <td colspan="5" class="text-center text-red-500 dark:text-red-400 py-8">Nenhum documento encontrado.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
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

  .btn.bg-yellow-500,
  .btn.bg-yellow-500:hover {
    background-color: #f59e42 !important;
    color: #fff !important;
  }

  .btn.bg-red-700,
  .btn.bg-red-700:hover {
    background-color: #7f1d1d !important;
  }

  .btn.bg-red-900,
  .btn.bg-red-900:hover {
    background-color: #991b1b !important;
  }

  .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    filter: brightness(0.95);
  }
  </style>
</x-app-layout>
