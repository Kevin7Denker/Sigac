<x-app-layout>
  <h2 class="text-3xl font-extrabold mb-6 text-dark-red-600 dark:text-dark-red-400">Editar Comprovante</h2>

  @if (session('success'))
  <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
    {{ session('success') }}
  </div>
  @endif

  <form action="{{ route('coordenador.comprovantes.update', $comprovante->id) }}" method="POST" class="space-y-6">
    @csrf
    @method('PUT')

    <div>
      <label for="horas" class="block text-sm font-semibold text-dark-red-600 dark:text-dark-red-400">Horas</label>
      <input type="number" name="horas" id="horas" value="{{ old('horas', $comprovante->horas) }}"
        class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:ring-dark-red-600 focus:border-dark-red-600"
        required>
      @error('horas')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="atividade"
        class="block text-sm font-semibold text-dark-red-600 dark:text-dark-red-400">Atividade</label>
      <input type="text" name="atividade" id="atividade" value="{{ old('atividade', $comprovante->atividade) }}"
        class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:ring-dark-red-600 focus:border-dark-red-600"
        required>
      @error('atividade')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="categoria_id"
        class="block text-sm font-semibold text-dark-red-600 dark:text-dark-red-400">Categoria</label>
      <select name="categoria_id" id="categoria_id"
        class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:ring-dark-red-600 focus:border-dark-red-600"
        required>
        <option value="">Selecione uma categoria</option>
        @foreach ($categorias as $categoria)
        <option value="{{ $categoria->id }}"
          {{ old('categoria_id', $comprovante->categoria_id) == $categoria->id ? 'selected' : '' }}>
          {{ $categoria->nome }}
        </option>
        @endforeach
      </select>
      @error('categoria_id')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="aluno_id" class="block text-sm font-semibold text-dark-red-600 dark:text-dark-red-400">Aluno</label>
      <select name="aluno_id" id="aluno_id"
        class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:ring-dark-red-600 focus:border-dark-red-600"
        required>
        <option value="">Selecione um aluno</option>
        @foreach ($alunos as $aluno)
        <option value="{{ $aluno->id }}" {{ old('aluno_id', $comprovante->aluno_id) == $aluno->id ? 'selected' : '' }}>
          {{ $aluno->nome }}
        </option>
        @endforeach
      </select>
      @error('aluno_id')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div class="flex gap-3 mt-6">
      <button type="submit"
        class="px-5 py-2 bg-dark-red-600 text-white rounded-lg shadow hover:bg-dark-red-700 transition">Atualizar</button>
      <a href="{{ route('coordenador.comprovantes.index') }}"
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
