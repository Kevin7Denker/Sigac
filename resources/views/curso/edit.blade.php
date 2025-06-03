<x-app-layout>
  <h2 class="text-3xl font-extrabold mb-6 text-dark-red-600 dark:text-dark-red-400">Editar Curso</h2>

  @if (session('success'))
  <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
    {{ session('success') }}
  </div>
  @endif

  <form action="{{ route('coordenador.cursos.update', $curso->id) }}" method="POST" class="space-y-6">
    @csrf
    @method('PUT')

    <div>
      <label for="nome" class="block text-sm font-semibold text-dark-red-600 dark:text-dark-red-400">Nome</label>
      <input type="text" name="nome" id="nome" value="{{ old('nome', $curso->nome) }}"
        class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:ring-dark-red-600 focus:border-dark-red-600"
        required>
      @error('nome')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="sigla" class="block text-sm font-semibold text-dark-red-600 dark:text-dark-red-400">Sigla</label>
      <input type="text" name="sigla" id="sigla" value="{{ old('sigla', $curso->sigla) }}"
        class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:ring-dark-red-600 focus:border-dark-red-600"
        required>
      @error('sigla')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="total_horas" class="block text-sm font-semibold text-dark-red-600 dark:text-dark-red-400">Total de
        Horas</label>
      <input type="number" name="total_horas" id="total_horas" value="{{ old('total_horas', $curso->total_horas) }}"
        class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:ring-dark-red-600 focus:border-dark-red-600"
        required>
      @error('total_horas')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="nivel_id" class="block text-sm font-semibold text-dark-red-600 dark:text-dark-red-400">Nível</label>
      <select name="nivel_id" id="nivel_id"
        class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:ring-dark-red-600 focus:border-dark-red-600"
        required>
        <option value="">Selecione um nível</option>
        @foreach ($niveis as $nivel)
        <option value="{{ $nivel->id }}" {{ old('nivel_id', $curso->nivel_id) == $nivel->id ? 'selected' : '' }}>
          {{ $nivel->nome }}
        </option>
        @endforeach
      </select>
      @error('nivel_id')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="eixo_id" class="block text-sm font-semibold text-dark-red-600 dark:text-dark-red-400">Eixo</label>
      <select name="eixo_id" id="eixo_id"
        class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:ring-dark-red-600 focus:border-dark-red-600"
        required>
        <option value="">Selecione um eixo</option>
        @foreach ($eixos as $eixo)
        <option value="{{ $eixo->id }}" {{ old('eixo_id', $curso->eixo_id) == $eixo->id ? 'selected' : '' }}>
          {{ $eixo->nome }}
        </option>
        @endforeach
      </select>
      @error('eixo_id')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div class="flex gap-3 mt-6">
      <button type="submit"
        class="px-5 py-2 bg-dark-red-600 text-white rounded-lg shadow hover:bg-dark-red-700 transition">Atualizar</button>
      <a href="{{ route('coordenador.cursos.index') }}"
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