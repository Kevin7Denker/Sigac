<x-app-layout>

  <form action="{{ route('coordenador.niveis.update', $nivei->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')
    <div>
      <label for="nome" class="block text-sm font-medium">Nome</label>
      <input type="text" name="nome" id="nome" value="{{ old('nome', $nivei->nome) }}"
        class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100" required>
      @error('nome')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>
    <div class="flex gap-2">
      <button type="submit" class="px-4 py-2 bg-red-800 text-white rounded hover:bg-red-900">Atualizar</button>
      <a href="{{ route('coordenador.niveis.index') }}"
        class="px-4 py-2 bg-gray-400 text-white rounded no-underline hover:bg-gray-500">Cancelar</a>
    </div>
  </form>

</x-app-layout>
