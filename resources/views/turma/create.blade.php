<x-app-layout>

  @if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif

  <form action="{{ route('coordenador.turmas.store') }}" method="POST">
    @csrf
    @method('POST')

    <div>
      <label for="ano" class="block text-sm font-semibold text-gray-700 dark:text-gray-200">Ano</label>
      <input type="text" name="ano" id="ano" value="{{ old('ano') }}"
        class="mt-2 block w-full rounded-lg border border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:ring-2 focus:ring-red-800 focus:border-red-800 transition"
        required>
      @error('ano')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="curso_id" class="block text-sm font-semibold text-gray-700 dark:text-gray-200">Curso</label>
      <select name="curso_id" id="curso_id"
        class="mt-2 block w-full rounded-lg border border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:ring-2 focus:ring-red-800 focus:border-red-800 transition">
        <option value="">Selecione um curso</option>
        @foreach ($cursos as $curso)
        <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
        @endforeach
      </select>
      @error('curso_id')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div class="flex gap-2 justify-end " style="margin-top: 20px;">
      <button type="submit"
        class="px-5 py-2 bg-red-800 text-white rounded-lg font-semibold shadow hover:bg-red-900 transition">Criar</button>
      <a href="{{ route('coordenador.turmas.index') }}"
        class="px-5 py-2 bg-gray-400 text-white rounded-lg no-underline font-semibold shadow hover:bg-gray-500 transition">Cancelar</a>
    </div>
  </form>

</x-app-layout>