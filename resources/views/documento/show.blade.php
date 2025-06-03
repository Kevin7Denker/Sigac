<x-app-layout>
  <div class="p-8 max-w-3xl mx-auto text-gray-900 dark:text-gray-100">
    <h2 class="text-3xl font-extrabold mb-4 text-dark-red-600 dark:text-dark-red-400">
      Documento #{{ $documento->id }}
    </h2>
    <div class="space-y-2">
      <p>
        <span class="font-semibold text-dark-red-600 dark:text-dark-red-400">URL:</span>
        {{ $documento->url }}
      </p>
      <p>
        <span class="font-semibold text-dark-red-600 dark:text-dark-red-400">Descrição:</span>
        {{ $documento->descricao }}
      </p>
      <p>
        <span class="font-semibold text-dark-red-600 dark:text-dark-red-400">Horas In:</span>
        {{ $documento->horas_in }}
      </p>
      <p>
        <span class="font-semibold text-dark-red-600 dark:text-dark-red-400">Horas Out:</span>
        {{ $documento->horas_out }}
      </p>
      <p>
        <span class="font-semibold text-dark-red-600 dark:text-dark-red-400">Status:</span>
        {{ $documento->status }}
      </p>
      <p>
        <span class="font-semibold text-dark-red-600 dark:text-dark-red-400">Comentário:</span>
        {{ $documento->comentario }}
      </p>
      <p>
        <span class="font-semibold text-dark-red-600 dark:text-dark-red-400">Categoria:</span>
        {{ $documento->categoria->nome ?? '-' }}
      </p>
      <p>
        <span class="font-semibold text-dark-red-600 dark:text-dark-red-400">Arquivo:</span>
        @if(Str::endsWith($documento->url, '.pdf'))
        <a href="{{ asset('storage/' . $documento->url) }}" target="_blank" class="text-blue-500 underline">Visualizar
          PDF</a>
        @else
        <a href="{{ $documento->url }}" target="_blank" class="text-blue-500 underline">Abrir Link</a>
        @endif
      </p>
    </div>

    @if(auth()->user()->role && auth()->user()->role->nome === 'coordenador' && $documento->status === 'Pendente')
    <div class="mt-8 flex flex-col gap-4">
      <form action="{{ route('coordenador.documentos.aprovar', $documento->id) }}" method="POST"
        class="flex items-center gap-2">
        @csrf
        <input type="number" name="horas_out" value="{{ $documento->horas_in }}" min="0" step="0.01"
          class="w-24 rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100" required>
        <input type="text" name="comentario" placeholder="Comentário (opcional)"
          class="w-48 rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100">
        <button type="submit"
          class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition">Aprovar</button>
      </form>
      <form action="{{ route('coordenador.documentos.reprovar', $documento->id) }}" method="POST"
        class="flex items-center gap-2">
        @csrf
        <input type="text" name="comentario" placeholder="Comentário (motivo da reprovação)"
          class="w-48 rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100">
        <button type="submit"
          class="px-4 py-2 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition">Reprovar</button>
      </form>
    </div>
    @endif

    <div class="mt-8 flex gap-3">
      <a href="{{ route('coordenador.documentos.edit', $documento->id) }}"
        class="px-5 py-2 bg-dark-red-600 text-white rounded-lg shadow hover:bg-dark-red-700 transition no-underline">Editar</a>
      <a href="{{ route('coordenador.documentos.index') }}"
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
