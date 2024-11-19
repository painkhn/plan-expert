<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Обновление пароля') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label class="text-black/70" for="current_password">{{ __('Действительный пароль') }}</label>
            <input type="password" name="current_password" id="current_password"
                class="border border-gray-300 w-full h-10 px-4 rounded-md outline-none transition-all focus:ring-2 focus:ring-purple-300 focus:!border-purple-300">
        </div>

        <div>
            <label class="text-black/70" for="password">{{ __('Новый пароль') }}</label>
            <input type="password" name="password" id="password"
                class="border border-gray-300 w-full h-10 px-4 rounded-md outline-none transition-all focus:ring-2 focus:ring-purple-300 focus:!border-purple-300"
                autocomplete="new-password">
        </div>

        <div>
            <label class="text-black/70" for="password_confirmation">{{ __('Подтверждение пароля') }}</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                class="border border-gray-300 w-full h-10 px-4 rounded-md outline-none transition-all focus:ring-2 focus:ring-purple-300 focus:!border-purple-300"
                autocomplete="new-password">
        </div>

        <div class="flex items-center gap-4">
            <button type="submit"
                class="bg-purple-300 py-2 rounded-lg font-semibold text-black/70 transition-all hover:bg-purple-400 hover:text-black/90 p-3">
                {{ __('Сохранить') }}
            </button>
        </div>
    </form>
</section>
