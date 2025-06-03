<x-app-layout>

  <form action="{{ route('coordenador.eixos.update', $eixo->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
      <label for="nome" class="block text-sm font-semibold text-gray-700 dark:text-gray-200">Nome</label>
      <input type="text" name="nome" id="nome"
        class="mt-2 block w-full rounded-lg border border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:ring-2 focus:ring-red-900 focus:border-red-900 transition"
        value="{{ old('nome', $eixo->nome) }}" required>
      @error('nome')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>
    <div class="flex gap-3 mt-6">
      <button type=" submit"
        class="px-5 py-2 bg-red-900 text-white rounded-lg font-semibold hover:bg-red-800 transition">Salvar</button>
      <a href="{{ route('coordenador.eixos.index') }}"
        class="px-5 py-2 bg-gray-400 text-white  no-underline rounded-lg font-semibold hover:bg-gray-500 transition">Cancelar</a>
    </div>
  </form>

</x-app-layout>
