<x-app-layout>
  @if (session('success'))
  <div class="bg-green-600 text-white px-4 py-2 rounded mb-4">
    {{ session('success') }}
  </div>
  @endif

  <form action="{{ route('coordenador.declaracoes.store') }}" method="POST" class="space-y-6">
    @csrf

    <div>
      <label for="hash" class="block text-sm font-semibold text-gray-700 dark:text-gray-200">Hash</label>
      <input type="text" id="hash" name="hash" value="{{ old('hash') }}"
        class="mt-2 block w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-red-700 focus:border-red-700 transition" />
      @error('hash')
      <div class="text-red-700 dark:text-red-400 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="data" class="block text-sm font-semibold text-gray-700 dark:text-gray-200">Data</label>
      <input type="datetime-local" id="data" name="data" value="{{ old('data') }}"
        class="mt-2 block w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-red-700 focus:border-red-700 transition" />
      @error('data')
      <div class="text-red-700 dark:text-red-400 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="aluno_id" class="block text-sm font-semibold text-gray-700 dark:text-gray-200">Aluno</label>
      <select id="aluno_id" name="aluno_id"
        class="mt-2 block w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-red-700 focus:border-red-700 transition">
        <option value="">Selecione um Aluno</option>
        @foreach($alunos as $aluno)
        <option value="{{ $aluno->id }}" {{ old('aluno_id') == $aluno->id ? 'selected' : '' }}>{{ $aluno->nome }}
        </option>
        @endforeach
      </select>
      @error('aluno_id')
      <div class="text-red-700 dark:text-red-400 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="comprovante_id"
        class="block text-sm font-semibold text-gray-700 dark:text-gray-200">Comprovante</label>
      <select id="comprovante_id" name="comprovante_id"
        class="mt-2 block w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-2 focus:ring-red-700 focus:border-red-700 transition">
        <option value="">Selecione um Comprovante</option>
        @foreach($comprovantes as $comprovante)
        <option value="{{ $comprovante->id }}" {{ old('comprovante_id') == $comprovante->id ? 'selected' : '' }}>
          {{ $comprovante->atividade }}</option>
        @endforeach
      </select>
      @error('comprovante_id')
      <div class="text-red-700 dark:text-red-400 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div class="flex gap-3 justify-end mt-6">
      <button type="submit"
        class="px-6 py-2 bg-red-700 hover:bg-red-800 text-white font-semibold rounded-lg shadow transition">Criar</button>
      <a href="{{ route('coordenador.declaracoes.index') }}"
        class="px-6 py-2 bg-gray-500 hover:bg-gray-600 text-white font-semibold rounded-lg shadow transition no-underline">Cancelar</a>
    </div>
  </form>
</x-app-layout>
