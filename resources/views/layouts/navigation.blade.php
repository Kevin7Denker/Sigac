<nav x-data="{ open: false }"
    class="bg-red-900 dark:bg-red-950 border-b border-red-700 dark:border-red-800 no-underline">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 no-underline">
        <div class="flex items-center justify-between h-16 no-underline">

            <div class="flex-shrink-0 flex items-center no-underline">
                <a href="{{ route('dashboard') }}" class="no-underline font-extrabold text-xl text-white tracking-widest ">
                    Sigac by Denker
                </a>
            </div>

            @auth
            @php $role = Auth::user()->role->nome ?? null; @endphp
            <div class="hidden md:flex md:items-center md:space-x-6 no-underline">
                @switch($role)
                @case('aluno')
                <x-nav-link :href="route('aluno.dashboard')" :active="request()->routeIs('aluno.dashboard*')"
                    class="text-white no-underline">
                    {{ __('Painel do Aluno') }}
                </x-nav-link>
                <x-nav-link :href="route('aluno.declaracao.pdf')" class="text-white no-underline">
                    {{ __('Gerar Declaração PDF') }}
                </x-nav-link>
                <x-nav-link :href="route('aluno.documentos.create')" class="text-white no-underline">
                    {{ __('Submeter Documento') }}
                </x-nav-link>
                @break
                @case('coordenador')
                @break
                @endswitch
            </div>
            @endauth

            @auth
            <div class="hidden md:flex md:items-center no-underline">
                <x-dropdown align="right" width="48" class="no-underline">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center gap-2 px-4 py-2  border-transparent text-sm font-semibold rounded-lg text-white bg-red-900 dark:bg-red-950 hover:bg-red-800 dark:hover:bg-red-900 focus:outline-none transition-all duration-150 shadow-sm">
                            <span class="truncate max-w-[120px]">{{ Auth::user()->name }}</span>
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="no-underline flex items-center gap-2">
                            <svg class="h-4 w-4 text-red-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M5.121 17.804A13.937 13.937 0 0112 15c2.485 0 4.797.657 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            {{ __('Perfil') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" class="no-underline flex items-center gap-2"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <svg class="h-4 w-4 text-red-700" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7" />
                                </svg>
                                {{ __('Sair') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @endauth

            <div class="flex md:hidden">
                <button @click="open = !open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-white hover:bg-red-800 dark:hover:bg-red-900 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': !open}" class="md:hidden">
        @auth
        @php $role = Auth::user()->role->nome ?? null; @endphp
        <div class="pt-2 pb-3 space-y-1">
            @switch($role)
            @case('aluno')
            <x-responsive-nav-link :href="route('aluno.dashboard')" class="text-white">{{ __('Painel do Aluno') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('aluno.declaracao.pdf')" class="text-white">{{ __('Gerar Declaração PDF') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('aluno.documentos.create')" class="text-white">{{ __('Submeter Documento') }}
            </x-responsive-nav-link>
            @break
            @case('coordenador')
            <x-responsive-nav-link :href="route('coordenador.alunos.index')" class="text-white">{{ __('Alunos') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('coordenador.turmas.index')" class="text-white">{{ __('Turmas') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('coordenador.cursos.index')" class="text-white">{{ __('Cursos') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('coordenador.comprovantes.index')" class="text-white">{{ __('Comprovantes') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('coordenador.declaracoes.index')" class="text-white">{{ __('Declarações') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('coordenador.documentos.index')" class="text-white">{{ __('Documentos') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('coordenador.categorias.index')" class="text-white">{{ __('Categorias') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('coordenador.eixos.index')" class="text-white">{{ __('Eixos') }}
            </x-responsive-nav-link>
            @break
            @endswitch
        </div>
        <div class="pt-4 pb-1 border-t border-red-800 dark:border-red-900">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-white">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-white">
                    {{ __('Perfil') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();" class="text-white">
                        {{ __('Sair') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @endauth
    </div>
</nav>
