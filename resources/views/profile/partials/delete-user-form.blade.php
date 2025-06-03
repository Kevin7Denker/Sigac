<header class="mb-6 border-b pb-4">
    <h2 class="text-xl font-semibold text-gray-900 dark:text-red-700">
        {{ __('Excluir Conta') }}
    </h2>
    <p class="mt-2 text-sm text-gray-600 dark:text-red-400">
        {{ __('Uma vez que sua conta for excluída, todos os seus recursos e dados serão permanentemente apagados. Antes de excluir sua conta, faça o download de quaisquer dados ou informações que deseja manter.') }}
    </p>
</header>

<div class="flex justify-end">
    <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        {{ __('Excluir Conta') }}</x-danger-button>
</div>

<x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
        @csrf
        @method('delete')

        <h2 class="text-lg font-medium text-gray-900 dark:text-red-700"></h2>
        {{ __('Tem certeza de que deseja excluir sua conta?') }}
        </h2>

        <p class="mt-2 text-sm text-gray-600 dark:text-red-400">
            {{ __('Uma vez que sua conta for excluída, todos os seus recursos e dados serão permanentemente apagados. Por favor, digite sua senha para confirmar que deseja excluir sua conta permanentemente.') }}
        </p>

        <div class="mt-6 space-y-2">
            <x-input-label for="password" :value="__('Senha')" class="dark:text-red-700 sr-only" />
            <x-text-input id="password" name="password" type="password" class="block w-full dark:border-red-700"
                placeholder="{{ __('Senha') }}" />
            <x-input-error :messages="$errors->userDeletion->get('password')" class="dark:text-red-400 mt-2" />
        </div>

        <div class="mt-6 flex justify-end gap-3 border-t pt-4">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancelar') }}
            </x-secondary-button>
            <x-danger-button>
                {{ __('Excluir Conta') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>
