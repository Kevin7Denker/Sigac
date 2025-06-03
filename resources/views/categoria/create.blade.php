<x-app-layout>
  @if (session('success'))
  <div class="bg-green-600 text-white px-4 py-2 rounded mb-4">
    {{ session('success') }}
  </div>
  @endif

  <form action="{{ route('coordenador.categorias.store') }}" method="POST">
    @csrf
    <div>
      <label for="nome" class="block text-sm font-semibold text-gray-700 dark:text-gray-200">Nome</label>
      <input type="text" name="nome" id="nome" value="{{ old('nome') }}"
        class="mt-2 block w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-red-700 focus:border-red-700 transition"
        required>
      @error('nome')
      <div class="text-red-700 dark:text-red-400 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="maximo_horas" class="block text-sm font-semibold text-gray-700 dark:text-gray-200">Máximo de
        Horas</label>
      <input type="number"
        class="mt-2 block w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-red-700 focus:border-red-700 transition"
        id="maximo_horas" name="maximo_horas" value="{{ old('maximo_horas') }}" required>
      @error('maximo_horas')
      <div class="text-red-700 dark:text-red-400 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="curso_id" class="block text-sm font-semibold text-gray-700 dark:text-gray-200">Curso</label>
      <select
        class="mt-2 block w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-red-700 focus:border-red-700 transition"
        id="curso_id" name="curso_id" required>
        <option value="">Selecione um curso</option>
        @foreach ($cursos as $curso)
        <option value="{{ $curso->id }}" {{ old('curso_id') == $curso->id ? 'selected' : '' }}>
          {{ $curso->nome }}
        </option>
        @endforeach
      </select>
      @error('curso_id')
      <div class="text-red-700 dark:text-red-400 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div class="flex gap-3 justify-end" style="margin-top: 20px;">
      <button type="submit"
        class="px-6 py-2 bg-red-700 hover:bg-red-800 text-white font-semibold rounded-lg shadow transition">Criar</button>
      <a href="{{ route('coordenador.categorias.index') }}"
        class="px-6 py-2 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg shadow transition no-underline">Cancelar</a>
    </div>
  </form>
</x-app-layout>
