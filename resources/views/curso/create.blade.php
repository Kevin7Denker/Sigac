<x-app-layout>
  @if (session('success'))
  <div class="bg-green-600 text-white px-4 py-2 rounded mb-4">
    {{ session('success') }}
  </div>
  @endif

  <form action="{{ route('coordenador.cursos.store') }}" method="POST" class="space-y-6">
    @csrf

    <div>
      <label for="nome" class="block text-sm font-semibold text-gray-700 dark:text-gray-200">Nome</label>
      <input type="text" name="nome" id="nome"
        class="mt-2 block w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-red-700 focus:border-red-700 transition"
        value="{{ old('nome') }}" required>
      @error('nome')
      <div class="text-red-700 dark:text-red-400 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="sigla" class="block text-sm font-semibold text-gray-700 dark:text-gray-200">Sigla</label>
      <input type="text" name="sigla" id="sigla"
        class="mt-2 block w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-red-700 focus:border-red-700 transition"
        value="{{ old('sigla') }}" required>
      @error('sigla')
      <div class="text-red-700 dark:text-red-400 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="total_horas" class="block text-sm font-semibold text-gray-700 dark:text-gray-200">Total de
        Horas</label>
      <input type="number" name="total_horas" id="total_horas"
        class="mt-2 block w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-red-700 focus:border-red-700 transition"
        value="{{ old('total_horas') }}" required>
      @error('total_horas')
      <div class="text-red-700 dark:text-red-400 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="nivel_id" class="block text-sm font-semibold text-gray-700 dark:text-gray-200">Nível</label>
      <select name="nivel_id" id="nivel_id"
        class="mt-2 block w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-red-700 focus:border-red-700 transition"
        required>
        <option value="">Selecione um nível</option>
        @foreach ($niveis as $nivel)
        <option value="{{ $nivel->id }}" {{ old('nivel_id') == $nivel->id ? 'selected' : '' }}>{{ $nivel->nome }}
        </option>
        @endforeach
      </select>
      @error('nivel_id')
      <div class="text-red-700 dark:text-red-400 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="eixo_id" class="block text-sm font-semibold text-gray-700 dark:text-gray-200">Eixo</label>
      <select name="eixo_id" id="eixo_id"
        class="mt-2 block w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-red-700 focus:border-red-700 transition">
        <option value="">Selecione um eixo</option>
        @foreach ($eixos as $eixo)
        <option value="{{ $eixo->id }}" {{ old('eixo_id') == $eixo->id ? 'selected' : '' }}>{{ $eixo->nome }}</option>
        @endforeach
      </select>
    </div>

    <div class="flex gap-3 justify-end mt-6">
      <button type="submit"
        class="px-6 py-2 bg-red-700 hover:bg-red-800 text-white font-semibold rounded-lg shadow transition">Criar
        Curso</button>
      <a href="{{ route('coordenador.cursos.index') }}"
        class="px-6 py-2 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg shadow transition no-underline">Cancelar</a>
    </div>
  </form>
</x-app-layout>
