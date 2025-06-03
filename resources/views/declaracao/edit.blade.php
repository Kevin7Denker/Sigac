<x-app-layout>
  <h2 class="text-3xl font-extrabold mb-6 text-dark-red-600 dark:text-dark-red-400">Editar Declaração</h2>

  @if (session('success'))
  <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
    {{ session('success') }}
  </div>
  @endif

  <form action="{{ route('coordenador.declaracoes.update', $declaraco->id) }}" method="POST" class="space-y-6">
    @csrf
    @method('PUT')

    <div>
      <label for="hash" class="block text-sm font-semibold text-dark-red-600 dark:text-dark-red-400">Hash</label>
      <input type="text" id="hash" name="hash" value="{{ old('hash', $declaraco->hash) }}"
        class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:ring-dark-red-600 focus:border-dark-red-600" />
      @error('hash')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="data" class="block text-sm font-semibold text-dark-red-600 dark:text-dark-red-400">Data</label>
      <input type="datetime-local" id="data" name="data" value="{{ old('data', $declaraco->data) }}"
        class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:ring-dark-red-600 focus:border-dark-red-600" />
      @error('data')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="aluno_id" class="block text-sm font-semibold text-dark-red-600 dark:text-dark-red-400">Aluno</label>
      <select id="aluno_id" name="aluno_id"
        class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:ring-dark-red-600 focus:border-dark-red-600">
        <option value="">Selecione um Aluno</option>
        @foreach($alunos as $aluno)
        <option value="{{ $aluno->id }}" {{ old('aluno_id', $declaraco->aluno_id) == $aluno->id ? 'selected' : '' }}>
          {{ $aluno->nome }}
        </option>
        @endforeach
      </select>
      @error('aluno_id')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="comprovante_id"
        class="block text-sm font-semibold text-dark-red-600 dark:text-dark-red-400">Comprovante</label>
      <select id="comprovante_id" name="comprovante_id"
        class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:ring-dark-red-600 focus:border-dark-red-600">
        <option value="">Selecione um Comprovante</option>
        @foreach($comprovantes as $comprovante)
        <option value="{{ $comprovante->id }}"
          {{ old('comprovante_id', $declaraco->comprovante_id) == $comprovante->id ? 'selected' : '' }}>
          {{ $comprovante->atividade }}
        </option>
        @endforeach
      </select>
      @error('comprovante_id')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div class="flex gap-3 mt-6">
      <button type="submit"
        class="px-5 py-2 bg-dark-red-600 text-white rounded-lg shadow hover:bg-dark-red-700 transition">Atualizar</button>
      <a href="{{ route('coordenador.declaracoes.index') }}"
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