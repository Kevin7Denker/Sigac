<x-app-layout>
  <form action="{{ route('coordenador.alunos.update', $aluno->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
      <label for="nome" class="block text-sm font-semibold mb-1">Nome</label>
      <input type="text" name="nome" id="nome" value="{{ old('nome', $aluno->nome) }}"
        class="w-full px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
        required>
      @error('nome')
      <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="cpf" class="block text-sm font-semibold mb-1">CPF</label>
      <input type="text" name="cpf" id="cpf" value="{{ old('cpf', $aluno->cpf) }}"
        class="w-full px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
        required>
      @error('cpf')
      <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="email" class="block text-sm font-semibold mb-1">Email</label>
      <input type="email" name="email" id="email" value="{{ old('email', $aluno->email) }}"
        class="w-full px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
        required>
      @error('email')
      <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="senha" class="block text-sm font-semibold mb-1">Senha</label>
      <input type="password" name="senha" id="senha"
        class="w-full px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500">
      <small class="text-gray-500 dark:text-gray-400">Deixe em branco para manter a senha atual.</small>
      @error('senha')
      <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="curso_id" class="block text-sm font-semibold mb-1">Curso</label>
      <select name="curso_id" id="curso_id"
        class="w-full px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
        required>
        <option value="">Selecione um curso</option>
        @foreach ($cursos as $curso)
        <option value="{{ $curso->id }}" {{ old('curso_id', $aluno->curso_id) == $curso->id ? 'selected' : '' }}>
          {{ $curso->nome }}</option>
        @endforeach
      </select>
      @error('curso_id')
      <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="turma_id" class="block text-sm font-semibold mb-1">Turma</label>
      <select name="turma_id" id="turma_id"
        class="w-full px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500"
        required>
        <option value="">Selecione uma turma</option>
        @foreach($turmas as $turma)
        @if(old('curso_id', $aluno->curso_id) == $turma->curso_id)
        <option value="{{ $turma->id }}" {{ old('turma_id', $aluno->turma_id) == $turma->id ? 'selected' : '' }}>
          {{ $turma->ano }}</option>
        @endif
        @endforeach
      </select>
      @error('turma_id')
      <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div style="margin-top: 20px; display: flex; justify-content: space-between;">

      <button type=" submit" class="px-5 py-2 bg-red-700 text-white  rounded shadow hover:bg-red-800 transition">
        Atualizar</button>
      <a href="{{ route('coordenador.alunos.index') }}"
        class="px-5 py-2 bg-gray-400 text-white rounded shadow hover:bg-gray-500 transition no-underline">Cancelar</a>
    </div>
  </form>
</x-app-layout>

<script type="module">
document.getElementById('curso_id').addEventListener('change', async function() {
  const cursoId = this.value;
  const turmaSelect = document.getElementById('turma_id');
  turmaSelect.innerHTML = '<option value="">Selecione uma turma</option>';
  if (cursoId) {
    try {
      const response = await fetch(`/coordenador/turmas/get/${cursoId}`);
      if (!response.ok) throw new Error('Erro ao carregar turmas');
      const data = await response.json();
      data.forEach(turma => {
        const option = document.createElement('option');
        option.value = turma.id;
        option.textContent = turma.ano;
        turmaSelect.appendChild(option);
      });
    } catch (error) {
      console.error(error);
    }
  }
});
</script>