<x-app-layout>

  @if (session('success'))
  <div class="bg-green-600 text-white px-4 py-2 rounded mb-6 shadow">
    {{ session('success') }}
  </div>
  @endif


  <h2 class="text-2xl font-bold mb-8 text-gray-800 dark:text-gray-100">Novo Documento</h2>
  <form action="{{ route('coordenador.documentos.store') }}" method="POST" class="space-y-6">
    @csrf

    <div>
      <label for="url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">URL do PDF</label>
      <input type="text" name="url" id="url"
        class="mt-2 block w-full rounded-md border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-red-700 focus:border-red-700 transition"
        value="{{ old('url') }}">
      <small class="text-gray-400">Opcional: Cole aqui a URL de um PDF já existente, se necessário.</small>
    </div>

    <div>
      <label for="descricao" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Descrição</label>
      <input type="text" name="descricao" id="descricao"
        class="mt-2 block w-full rounded-md border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-red-700 focus:border-red-700 transition"
        value="{{ old('descricao') }}" required>
      @error('descricao')
      <div class="text-red-700 dark:text-red-400 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <label for="horas_in" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Horas In</label>
        <input type="number" step="0.01" name="horas_in" id="horas_in"
          class="mt-2 block w-full rounded-md border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-red-700 focus:border-red-700 transition"
          value="{{ old('horas_in') }}" required>
        @error('horas_in')
        <div class="text-red-700 dark:text-red-400 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>
      <div>
        <label for="horas_out" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Horas Out</label>
        <input type="number" step="0.01" name="horas_out" id="horas_out"
          class="mt-2 block w-full rounded-md border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-red-700 focus:border-red-700 transition"
          value="{{ old('horas_out') }}" required>
        @error('horas_out')
        <div class="text-red-700 dark:text-red-400 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
        <input type="text" name="status" id="status"
          class="mt-2 block w-full rounded-md border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-red-700 focus:border-red-700 transition"
          value="{{ old('status') }}" required>
        @error('status')
        <div class="text-red-700 dark:text-red-400 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>
      <div>
        <label for="categoria_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Categoria</label>
        <select name="categoria_id" id="categoria_id"
          class="mt-2 block w-full rounded-md border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-red-700 focus:border-red-700 transition"
          required>
          <option value="">Selecione uma categoria</option>
          @foreach ($categorias as $categoria)
          <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
            {{ $categoria->nome }}
          </option>
          @endforeach
        </select>
        @error('categoria_id')
        <div class="text-red-700 dark:text-red-400 text-sm mt-1">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <div>
      <label for="comentario" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Comentário</label>
      <textarea name="comentario" id="comentario"
        class="mt-2 block w-full rounded-md border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-red-700 focus:border-red-700 transition"
        required>{{ old('comentario') }}</textarea>
      @error('comentario')
      <div class="text-red-700 dark:text-red-400 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div class="flex gap-3 justify-end mt-8">
      <button type="submit"
        class="px-6 py-2 bg-red-700 hover:bg-red-800 text-white font-semibold rounded-lg shadow transition">Criar
        Documento</button>
      <a href="{{ route('coordenador.documentos.index') }}"
        class="px-6 py-2 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg shadow transition no-underline">Cancelar</a>
    </div>
  </form>
</x-app-layout>
