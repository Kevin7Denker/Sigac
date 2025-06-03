<x-app-layout>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('coordenador.turmas.update', $turma->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="ano" class="block text-sm font-medium">Ano</label>
            <input type="text" name="ano" id="ano" value="{{ old('ano', $turma->ano) }}" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100" required>
            @error('ano')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="curso_id" class="block text-sm font-medium">Curso</label>
            <select name="curso_id" id="curso_id" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-100">
                <option value="">Selecione um curso</option>
                @foreach ($cursos as $curso)
                    <option value="{{ $curso->id }}" {{ $turma->curso_id == $curso->id ? 'selected' : '' }}>
                        {{ $curso->nome }}
                    </option>
                @endforeach
            </select>
            @error('curso_id')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex gap-2">
            <button type="submit" class="px-4 py-2 bg-red-800 text-white rounded hover:bg-red-900">Atualizar</button>
            <a href="{{ route('coordenador.turmas.index') }}" class="px-4 py-2 bg-gray-400 text-white no-underline rounded hover:bg-gray-500">Cancelar</a>
        </div>
    </form>

</x-app-layout>
