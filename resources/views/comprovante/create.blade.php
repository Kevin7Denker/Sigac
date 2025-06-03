<x-app-layout>
  @if (session('success'))
  <div class="bg-green-600 text-white px-4 py-2 rounded mb-4">
    {{ session('success') }}
  </div>
  @endif


  <form action="{{ route('coordenador.comprovantes.store') }}" method="POST" class="space-y-6">
    @csrf

    <div>
      <label for="horas" class="block text-sm font-semibold text-gray-700 dark:text-gray-200">Horas</label>
      <input type="number" name="horas" id="horas" value="{{ old('horas') }}"
        class="mt-2 block w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-red-700 focus:border-red-700 transition"
        required>
      @error('horas')
      <div class="text-red-700 dark:text-red-400 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="atividade" class="block text-sm font-semibold text-gray-700 dark:text-gray-200">Atividade</label>
      <input type="text" name="atividade" id="atividade" value="{{ old('atividade') }}"
        class="mt-2 block w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-red-700 focus:border-red-700 transition"
        required>
      @error('atividade')
      <div class="text-red-700 dark:text-red-400 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="categoria_id" class="block text-sm font-semibold text-gray-700 dark:text-gray-200">Categoria</label>
      <select name="categoria_id" id="categoria_id"
        class="mt-2 block w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-red-700 focus:border-red-700 transition"
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

    <div>
      <label for="aluno_id" class="block text-sm font-semibold text-gray-700 dark:text-gray-200">Aluno</label>
      <select name="aluno_id" id="aluno_id"
        class="mt-2 block w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-red-700 focus:border-red-700 transition"
        required>
        <option value="">Selecione um aluno</option>
        @foreach ($alunos as $aluno)
        <option value="{{ $aluno->id }}" {{ old('aluno_id') == $aluno->id ? 'selected' : '' }}>
          {{ $aluno->nome }}
        </option>
        @endforeach
      </select>
      @error('aluno_id')
      <div class="text-red-700 dark:text-red-400 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div class="flex gap-3 justify-end mt-6">
      <button type="submit"
        class="px-6 py-2 bg-red-700 hover:bg-red-800 text-white font-semibold rounded-lg shadow transition">Criar</button>
      <a href="{{ route('coordenador.comprovantes.index') }}"
        class="px-6 py-2 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg shadow transition no-underline">Cancelar</a>
    </div>
  </form>

</x-app-layout>