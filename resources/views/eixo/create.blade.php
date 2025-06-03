<x-app-layout>

  <form action="{{ route('coordenador.eixos.store') }}" method="POST" class="space-y-6">
    @csrf
    <div>
      <label for="nome" class="block text-sm font-semibold text-gray-800 dark:text-gray-200">Nome</label>
      <input type="text" name="nome" id="nome"
        class="mt-2 block w-full rounded-lg border border-gray-300 dark:bg-gray-800 dark:text-gray-100 focus:ring-2 focus:ring-red-800 focus:border-red-800 transition"
        value="{{ old('nome') }}" required autocomplete="off">
      @error('nome')
      <div class="text-red-800 text-sm mt-2 font-medium">{{ $message }}</div>
      @enderror
    </div>
    <div class="flex gap-3">
      <button type="submit"
        class="px-5 py-2 bg-red-800 text-white rounded-lg font-semibold hover:bg-red-900 transition">Criar</button>
      <a href="{{ route('coordenador.eixos.index') }}"
        class="px-5 py-2 bg-gray-500 text-white no-underline rounded-lg font-semibold hover:bg-gray-600 transition">Cancelar</a>
    </div>
  </form>

</x-app-layout>
