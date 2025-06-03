<x-app-layout>
  <section class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

    <article class="bg-white rounded-xl shadow-lg p-6 flex items-center">
      <div class="flex-shrink-0">
        <span
          class="inline-flex h-16 w-16 rounded-full bg-rose-100 text-rose-700 items-center justify-center text-3xl font-bold border-2 border-rose-200"
          aria-label="Avatar">
          {{ mb_substr($aluno->nome ?? $user->name, 0, 1) }}
        </span>
      </div>
      <div class="ml-6">
        <header class="text-xl font-semibold text-rose-800">{{ $aluno->nome ?? $user->name }}</header>
        <div class="text-zinc-500 text-base">{{ $aluno->email ?? $user->email }}</div>

      </div>
    </article>

    <nav class="bg-white rounded-xl shadow-lg p-6 flex flex-col justify-center" aria-label="Opções do Aluno">
      <h2 class="text-rose-700 font-semibold mb-3 text-lg">Opções</h2>
      <div class="flex flex-col gap-3">
        <a href="{{ route('aluno.documentos.create') }}"
          class="no-underline px-4 py-2 rounded-lg bg-rose-600 hover:bg-rose-700 focus:ring-2 focus:ring-rose-400 text-white text-base font-medium transition text-center shadow">
          + Novo Documento
        </a>
        <a href="{{ route('aluno.declaracao.pdf') }}"
          class="no-underline px-4 py-2 rounded-lg bg-green-600 hover:bg-green-700 focus:ring-2 focus:ring-green-400 text-white text-base font-medium transition text-center shadow">
          Gerar Declaração (PDF)
        </a>
      </div>
    </nav>
  </section>
</x-app-layout>
