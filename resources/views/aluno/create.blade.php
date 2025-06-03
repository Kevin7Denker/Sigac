<x-app-layout>

  <form action="{{ route('coordenador.alunos.store') }}" method="POST">
    @csrf
    <div>
      <label for="nome" class="block text-sm font-medium text-red-900">Nome</label>
      <input type="text" name="nome" id="nome" value="{{ old('nome') }}"
        class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-100 dark:text-gray-900 focus:ring-red-400 focus:border-red-400"
        required>
      @error('nome')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="cpf" class="block text-sm font-medium text-red-900">CPF</label>
      <input type="text" name="cpf" id="cpf" value="{{ old('cpf') }}"
        class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-100 dark:text-gray-900 focus:ring-red-400 focus:border-red-400"
        required>
      @error('cpf')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="email" class="block text-sm font-medium text-red-900">Email</label>
      <input type="email" name="email" id="email" value="{{ old('email') }}"
        class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-100 dark:text-gray-900 focus:ring-red-400 focus:border-red-400"
        required>
      @error('email')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="senha" class="block text-sm font-medium text-red-900">Senha</label>
      <input type="password" name="senha" id="senha"
        class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-100 dark:text-gray-900 focus:ring-red-400 focus:border-red-400"
        required>
      @error('senha')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="curso_id" class="block text-sm font-medium text-red-900">Curso</label>
      <select name="curso_id" id="curso_id"
        class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-100 dark:text-gray-900 focus:ring-red-400 focus:border-red-400"
        required>
        <option value="">Selecione um curso</option>
        @foreach ($cursos as $curso)
        <option value="{{ $curso->id }}" {{ old('curso_id') == $curso->id ? 'selected' : '' }}>
          {{ $curso->nome }}</option>
        @endforeach
      </select>
      @error('curso_id')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label for="turma_id" class="block text-sm font-medium text-red-900">Turma</label>
      <select name="turma_id" id="turma_id"
        class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-100 dark:text-gray-900 focus:ring-red-400 focus:border-red-400"
        required>
        <option value="">Selecione uma turma</option>
        @if(old('curso_id'))
        @foreach($turmas as $turma)
        @if($turma->curso_id == old('curso_id'))
        <option value="{{ $turma->id }}" {{ old('turma_id') == $turma->id ? 'selected' : '' }}>{{ $turma->ano }}
        </option>
        @endif
        @endforeach
        @endif
      </select>
      @error('turma_id')
      <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
      @enderror
    </div>

    <div class="flex gap-4 justify-center mt-8">
      <button type="submit" class="btn">Criar</button>
      <a href="{{ route('coordenador.alunos.index') }}" class="btn bg-gray-400 hover:bg-gray-500">Cancelar</a>
    </div>
  </form>



  <style>
  .btn {
    width: 130px;
    height: 40px;
    font-size: 1.1em;
    cursor: pointer;
    background-color: #7f1d1d !important;
    color: #fff !important;
    border: none;
    border-radius: 5px;
    transition: all .4s !important;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    font-weight: bold;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
  }

  .btn:hover {
    border-radius: 5px;
    transform: translateY(-10px);
    box-shadow: 0 7px 0 -2px #b91c1c,
      0 15px 0 -4px #ef4444,
      0 16px 10px -3px #fca5a5;
    background-color: #991b1b;
  }
  </style>

  <script>
  document.getElementById('curso_id').addEventListener('change', function() {
    const cursoId = this.value;
    const turmaSelect = document.getElementById('turma_id');

    turmaSelect.innerHTML = '<option value="">Selecione uma turma</option>';

    if (cursoId) {
      fetch(`/coordenador/turmas/get/${cursoId}`)
        .then(response => response.json())
        .then(data => {
          data.forEach(turma => {
            const option = document.createElement('option');
            option.value = turma.id;
            option.textContent = turma.ano;
            turmaSelect.appendChild(option);
          });
        })
        .catch(error => console.error('Erro ao carregar turmas:', error));
    }
  });
  </script>
</x-app-layout>
