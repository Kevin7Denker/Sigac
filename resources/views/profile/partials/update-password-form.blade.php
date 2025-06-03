<header class="mb-6 border-b pb-4">
    <h2 class="text-xl font-semibold text-gray-900 dark:text-red-700">
        {{ __('Atualizar Senha') }}
    </h2>
    <p class="mt-2 text-sm text-gray-600 dark:text-red-400">
        {{ __('Garanta que sua conta esteja usando uma senha longa e aleatória para manter a segurança.') }}
    </p>
</header>

<form method="post" action="{{ route('password.update') }}" class="space-y-6">
    @csrf
    @method('put')

    <div class="space-y-2">
        <x-input-label for="update_password_current_password" :value="__('Senha Atual')" class="dark:text-red-700" />
        <x-text-input id="update_password_current_password" name="current_password" type="password"
            class="block w-full dark:border-red-700" autocomplete="current-password" />
        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="dark:text-red-400" />
    </div>

    <div class="space-y-2">
        <x-input-label for="update_password_password" :value="__('Nova Senha')" class="dark:text-red-700" />
        <x-text-input id="update_password_password" name="password" type="password" class="block w-full dark:border-red-700"
            autocomplete="new-password" />
        <x-input-error :messages="$errors->updatePassword->get('password')" class="dark:text-red-400" />
    </div>

    <div class="space-y-2">
        <x-input-label for="update_password_password_confirmation" :value="__('Confirmar Senha')"
            class="dark:text-red-700" />
        <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
            class="block w-full dark:border-red-700" autocomplete="new-password" />
        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="dark:text-red-400" />
    </div>

    <div class="flex items-center gap-4 pt-4 border-t">
        <x-primary-button>{{ __('Salvar') }}</x-primary-button>
        @if (session('status') === 'password-updated')
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-gray-600 dark:text-red-400">{{ __('Salvo.') }}</p>
        @endif
    </div>
</form>
