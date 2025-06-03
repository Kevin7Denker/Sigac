<x-app-layout>

    <div class="overflow-x-auto">
        <h2 class="text-xl font-extrabold mb-4 text-dark-red-600 dark:text-dark-red-400">{{ $aluno->nome }}</h2>
        <div class="space-y-2 text-sm">
            <p><span class="font-semibold text-dark-red-600 dark:text-dark-red-400">CPF:</span> {{ $aluno->cpf }}</p>
            <p><span class="font-semibold text-dark-red-600 dark:text-dark-red-400">Email:</span> {{ $aluno->email }}</p>
            <p><span class="font-semibold text-dark-red-600 dark:text-dark-red-400">Curso:</span>
                {{ $aluno->curso->nome ?? '-' }}</p>
            <p><span class="font-semibold text-dark-red-600 dark:text-dark-red-400">Turma:</span>
                {{ $aluno->turma->ano ?? '-' }}</p>
            <p><span class="font-semibold text-dark-red-600 dark:text-dark-red-400">Criado em:</span> {{ $aluno->created_at }}
            </p>
            <p><span class="font-semibold text-dark-red-600 dark:text-dark-red-400">Atualizado em:</span>
                {{ $aluno->updated_at }}</p>
        </div>
        <div class="mt-6 flex gap-3">
            <a href="{{ route('coordenador.alunos.edit', $aluno->id) }}"
                class="px-4 py-1.5 text-sm bg-dark-red-600 text-white rounded-lg shadow hover:bg-dark-red-700 transition no-underline">Editar</a>
            <a href="{{ route('coordenador.alunos.index') }}"
                class="px-4 py-1.5 text-sm bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600 transition no-underline">Voltar</a>
        </div>
    </div>

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

    .hover\:bg-dark-red-700:hover {
        background-color: #7f1d1d;
    }
    </style>
    </style>
</x-app-layout>
