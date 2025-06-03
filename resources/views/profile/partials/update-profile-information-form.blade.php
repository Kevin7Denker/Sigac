<header class="mb-6 border-b pb-4">
    <h2 class="text-xl font-semibold text-gray-900 dark:text-red-700">
        {{ __('Informações do Perfil') }}
    </h2>
    <p class="mt-2 text-sm text-gray-600 dark:text-red-400">
        {{ __('Atualize as informações do perfil e o endereço de e-mail da sua conta.') }}
    </p>
</header>

<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>

<form method="post" action="{{ route('profile.update') }}" class="space-y-6">
    @csrf
    @method('patch')

    <div class="space-y-2">
        <x-input-label for="name" :value="__('Nome')" class="dark:text-red-700" />
        <x-text-input id="name" name="name" type="text" class="block w-full dark:border-red-700"
            :value="old('name', $user->name)" required autofocus autocomplete="name" />
        <x-input-error class="dark:text-red-400" :messages="$errors->get('name')" />
    </div>

    <div class="space-y-2">
        <x-input-label for="email" :value="__('E-mail')" class="dark:text-red-700" />
        <x-text-input id="email" name="email" type="email" class="block w-full dark:border-red-700"
            :value="old('email', $user->email)" required autocomplete="username" />
        <x-input-error class="dark:text-red-400" :messages="$errors->get('email')" />

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
        <div class="mt-2 bg-yellow-50 dark:bg-red-900/30 p-3 rounded">
            <p class="text-sm text-gray-800 dark:text-red-200">
                {{ __('Seu endereço de e-mail não foi verificado.') }}
                <button form="send-verification"
                    class="ml-2 underline text-sm text-indigo-600 dark:text-red-400 hover:text-indigo-900 dark:hover:text-red-100 focus:outline-none">
                    {{ __('Clique aqui para reenviar o e-mail de verificação.') }}
                </button>
            </p>
            @if (session('status') === 'verification-link-sent')
            <p class="mt-2 font-medium text-sm text-green-600 dark:text-red-400">
                {{ __('Um novo link de verificação foi enviado para seu endereço de e-mail.') }}
            </p>
            @endif
        </div>
        @endif
    </div>

    <div class="flex items-center gap-4 pt-4 border-t">
        <x-primary-button>{{ __('Salvar') }}</x-primary-button>
        @if (session('status') === 'profile-updated')
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-gray-600 dark:text-red-400">{{ __('Salvo.') }}</p>
        @endif
    </div>
</form>
