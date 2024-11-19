<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Информация профиля') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <label class="text-black/70" for="name" :value="__('Имя')"></label>
            <input type="name" name="name" value="{{ old('name', $user->name) }}"
                class="border border-gray-300 w-full h-10 px-4 rounded-md outline-none transition-all focus:ring-2 focus:ring-purple-300 focus:!border-purple-300 @error('email') bg-red-50 text-red-900 placeholder-red-700 @enderror">
        </div>

        <div>
            <label class="text-black/70" for="email" :value="__('Email')"></label>
            <input type="email" name="email" value="{{ old('name', $user->email) }}"
                class="border border-gray-300 w-full h-10 px-4 rounded-md outline-none transition-all focus:ring-2 focus:ring-purple-300 focus:!border-purple-300 @error('email') bg-red-50 text-red-900 placeholder-red-700 @enderror">
        </div>
        <div class="flex items-center gap-4">
            <button type="submit"
                class="bg-purple-300 py-2 rounded-lg font-semibold text-black/70 transition-all hover:bg-purple-400 hover:text-black/90 p-3">
                Сохранить
            </button>
        </div>
    </form>
</section>
