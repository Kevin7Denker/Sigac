<x-app-layout>

  <h2 class="text-3xl font-extrabold mb-6 text-dark-red-600 dark:text-dark-red-400">
    Editar Documento
  </h2>

  @if (session('success'))
  <div class="mb-4 px-4 py-3 rounded bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
    {{ session('success') }}
  </div>
  @endif

  <form action="{{ route('coordenador.documentos.update', $documento->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
      <label for="url" class="block text-sm font-semibold text-dark-red-600 dark:text-dark-red-400">URL do PDF</label>
      <input type="text" name="url" id="url" value="{{ old('url', $documento->url) }}"
        class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100" readonly>
      <a href="{{ asset('storage/' . $documento->url) }}" target="_blank"
        class="text-dark-red-600 dark:text-dark-red-400 underline text-sm">Visualizar PDF</a>
    </div>

    <div>
      <label for="descricao"
        class="block text-sm font-semibold text-dark-red-600 dark:text-dark-red-400">Descrição</label>
      <input type="text" name="descricao" id="descricao" value="{{ old('descricao', $documento->descricao) }}"
        class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100">
      @error('descricao')
      <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <label for="horas_in" class="block text-sm font-semibold text-dark-red-600 dark:text-dark-red-400">Horas
          In</label>
        <input type="number" name="horas_in" id="horas_in" value="{{ old('horas_in', $documento->horas_in) }}"
          class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100">
        @error('horas_in')
        <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
        @enderror
      </div>
      <div>
        <label for="horas_out" class="block text-sm font-semibold text-dark-red-600 dark:text-dark-red-400">Horas
          Out</label>
        <input type="number" name="horas_out" id="horas_out" value="{{ old('horas_out', $documento->horas_out) }}"
          class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100">
        @error('horas_out')
        <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <div>
      <label for="status" class="block text-sm font-semibold text-dark-red-600 dark:text-dark-red-400">Status</label>
      <input type="text" name="status" id="status" value="{{ old('status', $documento->status) }}"
        class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100">
      @error('status')
      <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="comentario"
        class="block text-sm font-semibold text-dark-red-600 dark:text-dark-red-400">Comentário</label>
      <textarea name="comentario" id="comentario"
        class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100">{{ old('comentario', $documento->comentario) }}</textarea>
      @error('comentario')
      <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="categoria_id"
        class="block text-sm font-semibold text-dark-red-600 dark:text-dark-red-400">Categoria</label>
      <select name="categoria_id" id="categoria_id"
        class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100">
        @foreach ($categorias as $categoria)
        <option value="{{ $categoria->id }}" {{ $documento->categoria_id == $categoria->id ? 'selected' : '' }}>
          {{ $categoria->nome }}
        </option>
        @endforeach
      </select>
      @error('categoria_id')
      <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div class="flex gap-3 mt-6">
      <button type="submit"
        class="px-5 py-2 bg-dark-red-600 text-white rounded-lg shadow hover:bg-dark-red-700 transition">Atualizar
        Documento</button>
      <a href="{{ route('coordenador.documentos.index') }}"
        class="px-5 py-2 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600 transition no-underline">Cancelar</a>
    </div>
  </form>


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
