@extends('layouts.app')

@section('title')
    Админка | План Эксперт
@endsection


@section('content')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

    <main class="my-10 px-10">
        <div class="max-w-6xl w-full mx-auto my-0 text-center mb-10">
            <h1 class="text-5xl font-black text-zinc-800 mb-5 max-[500px]:!text-2xl">
                Панель администратора
            </h1>
        </div>
        <div class="max-w-6xl w-full h-auto p-10 mx-auto my-0 bg-white rounded-xl border border-purple-300">
            <div class="w-full flex gap-10 mb-10 max-[840px]:flex-col">
                <img src="{{ asset('/img/avatar-default.svg') }}" alt=""
                    class="w-64 rounded-xl border border-gray-300">
                <div class="w-full pr-10 flex flex-col gap-5">
                    <p class="text-2xl font-black text-gray-800">
                        {{ Auth::user()->name }} <span class="text-purple-400">| Администратор</span>
                    </p>
                    <hr>
                    <p class="text-xl font-bold text-gray-800">
                        {{ Auth::user()->email }}
                    </p>
                </div>
            </div>
            <form class="flex items-center mb-5 gap-2" method="POST" action="{{ route('admin.search') }}">
                @csrf
                <input type="search" name="word" id="word"
                    class="w-full h-10 border-gray-300 rounded-lg text-gray-800 transition-all focus:ring-2 focus:ring-purple-300 focus:!border-purple-300"
                    placeholder="Введите ник пользователя, чтобы найти его">
                <button>
                    <svg class="w-10 h-10 text-gray-800 dark:text-white transition-all hover:text-purple-400 p-2 hover:bg-purple-50 rounded-md"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                    </svg>
                </button>
            </form>
            @foreach ($users as $item)
                <div class="user-line pb-2">
                    <div
                        class="user-line-block w-full h-14 border border-gray-300 transition-all rounded-lg flex items-center justify-between px-4">
                        <p class="user-line-text font-semibold text-gray-800 transition-all">
                            {{ $item->name }}
                        </p>
                        <div class="flex items-center gap-3">
                            @if ($item->isBan == 0)
                                <a href="{{ route('user.ban', $item->id) }}">
                                    <svg class="user-line-icon w-6 h-6 text-gray-800 dark:text-white cursor-pointer transition-all opacity-60 hover:text-red-400 hover:opacity-100"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                            d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </a>
                            @else
                                <a href="{{ route('user.ban', $item->id) }}">
                                    <svg class="user-line-icon w-6 h-6 text-gray-800 dark:text-white cursor-pointer transition-all opacity-60 hover:text-blue-400 hover:opacity-100"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m8.032 12 1.984 1.984 4.96-4.96m4.55 5.272.893-.893a1.984 1.984 0 0 0 0-2.806l-.893-.893a1.984 1.984 0 0 1-.581-1.403V7.04a1.984 1.984 0 0 0-1.984-1.984h-1.262a1.983 1.983 0 0 1-1.403-.581l-.893-.893a1.984 1.984 0 0 0-2.806 0l-.893.893a1.984 1.984 0 0 1-1.403.581H7.04A1.984 1.984 0 0 0 5.055 7.04v1.262c0 .527-.209 1.031-.581 1.403l-.893.893a1.984 1.984 0 0 0 0 2.806l.893.893c.372.372.581.876.581 1.403v1.262a1.984 1.984 0 0 0 1.984 1.984h1.262c.527 0 1.031.209 1.403.581l.893.893a1.984 1.984 0 0 0 2.806 0l.893-.893a1.985 1.985 0 0 1 1.403-.581h1.262a1.984 1.984 0 0 0 1.984-1.984V15.7c0-.527.209-1.031.581-1.403Z" />
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    <style>
        .user-line:hover .user-line-block {
            border-color: rgb(202 191 253);
        }

        .user-line:hover .user-line-text {
            color: rgb(202 191 253);
        }

        .user-line:hover .user-line-icon {
            opacity: 100;
        }
    </style>
@endsection
