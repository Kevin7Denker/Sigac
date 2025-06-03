<x-app-layout>
  <h2 class="text-3xl font-extrabold mb-6 text-dark-red-600 dark:text-dark-red-400">Editar Categoria</h2>

  @if (session('success'))
  <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
    {{ session('success') }}
  </div>
  @endif

  <form action="{{ route('coordenador.categorias.update', $categoria->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
      <label for="nome" class="block text-sm font-semibold text-dark-red-600 dark:text-dark-red-400">Nome</label>
      <input type="text" name="nome" id="nome" value="{{ old('nome', $categoria->nome) }}"
        class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:ring-dark-red-600 focus:border-dark-red-600"
        required>
      @error('nome')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="maximo_horas" class="block text-sm font-semibold text-dark-red-600 dark:text-dark-red-400">Máximo de
        Horas</label>
      <input type="number" name="maximo_horas" id="maximo_horas"
        value="{{ old('maximo_horas', $categoria->maximo_horas) }}"
        class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:ring-dark-red-600 focus:border-dark-red-600"
        required>
      @error('maximo_horas')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="curso_id" class="block text-sm font-semibold text-dark-red-600 dark:text-dark-red-400">Curso</label>
      <select name="curso_id" id="curso_id"
        class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:ring-dark-red-600 focus:border-dark-red-600"
        required>
        <option value="">Selecione um curso</option>
        @foreach ($cursos as $curso)
        <option value="{{ $curso->id }}" {{ (old('curso_id', $categoria->curso_id) == $curso->id) ? 'selected' : '' }}>
          {{ $curso->nome }}
        </option>
        @endforeach
      </select>
      @error('curso_id')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div class="flex gap-3 mt-6">
      <button type="submit"
        class="px-5 py-2 bg-dark-red-600 text-white rounded-lg shadow hover:bg-dark-red-700 transition">Atualizar</button>
      <a href="{{ route('coordenador.categorias.index') }}"
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
