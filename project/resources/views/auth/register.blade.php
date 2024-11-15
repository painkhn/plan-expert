@extends('layouts.app')

@section('title')
    Регистрация | План Эксперт
@endsection

@section('content')
    <main class="w-full h-screen flex items-center justify-center px-10">
        <div class="max-w-6xl w-full h-auto p-10 rounded-xl border border-purple-300 bg-white mx-auto my-0">
            <div class="grid grid-cols-2 max-[1050px]:!grid-cols-1">
                <div class="w-1/2 mb-10">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('/img/logo.svg') }}" alt="" class="w-64 transition-all hover:opacity-80">
                    </a>
                </div>
                <div class="w-full">
                    <form class="flex flex-col pl-10 gap-5 max-[1050px]:!pl-0" method="POST"
                        action="{{ route('register') }}">
                        @csrf
                        <div class="flex flex-col gap-1">
                            <label class="text-black/70">Имя</label>
                            <input type="text" name="name"
                                class="border border-gray-300 w-full h-10 px-4 rounded-md outline-none transition-all focus:ring-2 focus:ring-purple-300 focus:!border-purple-300"
                                required>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="text-black/70">Электронная почта</label>
                            <input type="text" name="email"
                                class="border border-gray-300 w-full h-10 px-4 rounded-md outline-none transition-all focus:ring-2 focus:ring-purple-300 focus:!border-purple-300"
                                required>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="text-black/70">Пароль</label>
                            <input type="password" name="password" autocomplete="new-password"
                                class="border border-gray-300 w-full h-10 px-4 rounded-md outline-none transition-all focus:ring-2 focus:ring-purple-300 focus:!border-purple-300"
                                required>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="text-black/70">Повторите пароль</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                autocomplete="new-password"
                                class="border border-gray-300 w-full h-10 px-4 rounded-md outline-none transition-all focus:ring-2 focus:ring-purple-300 focus:!border-purple-300"
                                required>
                        </div>
                        <button type="submit"
                            class="bg-purple-300 py-2 rounded-lg font-semibold text-black/70 transition-all hover:bg-purple-400 hover:text-black/90">
                            Зарегистрироваться
                        </button>
                        <div class="flex justify-end">
                            <a href="{{ route('login') }}"
                                class="text-purple-300 font-black transition-all hover:text-purple-400">У
                                меня уже есть аккаунт</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
