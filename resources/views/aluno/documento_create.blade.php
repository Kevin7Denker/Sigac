<x-app-layout>

  @if (session('success'))
  <div class="mb-4 p-3 bg-green-100 text-green-800 rounded border border-green-300">
    {{ session('success') }}
  </div>
  @endif

  @if ($errors->any())
  <div class="mb-4 p-3 bg-red-100 text-red-800 rounded border border-red-300">
    <ul class="list-disc pl-5">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <h2 class="text-2xl font-bold mb-6 text-center text-red-900">Submeter Novo Documento</h2>

  <form action="{{ route('aluno.documentos.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
    @csrf

    <div>
      <label for="descricao" class="block text-sm font-semibold mb-1">Descrição</label>
      <input type="text" name="descricao" id="descricao" value="{{ old('descricao') }}"
        class="w-full px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
        required>
    </div>

    <div>
      <label for="horas" class="block text-sm font-semibold mb-1">Horas a Solicitar</label>
      <input type="number" step="0.01" name="horas" id="horas" value="{{ old('horas') }}"
        class="w-full px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
        required>
    </div>

    <div>
      <label for="categoria_id" class="block text-sm font-semibold mb-1">Categoria</label>
      <select name="categoria_id" id="categoria_id"
        class="w-full px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
        required>
        <option value="">Selecione uma categoria</option>
        @foreach ($categorias as $categoria)
        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
        @endforeach
      </select>
    </div>

    <div>
      <label for="arquivo" class="block text-sm font-semibold mb-1">Arquivo PDF</label>
      <input type="file" name="arquivo" id="arquivo" accept="application/pdf"
        class="w-full px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
        required>
    </div>

    <div class="flex justify-between items-center mt-6">
      <button type="submit" class="px-6 py-2 bg-red-900 text-white font-semibold rounded hover:bg-red-800 transition">
        Submeter Documento
      </button>
      <a href="{{ route('aluno.dashboard') }}"
        class="px-6 py-2 bg-gray-400 text-white font-semibold rounded hover:bg-gray-500 transition">
        Cancelar
      </a>
    </div>
  </form>

</x-app-layout>