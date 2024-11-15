@extends('layouts.app')

@section('title')
    Создать проект | План Эксперт
@endsection

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <main class="my-10 px-10">
        <div class="max-w-6xl w-full h-auto p-10 bg-white rounded-lg border border-purple-300 mx-auto my-0">
            <div class="w-full flex gap-10 mb-10 max-[820px]:flex-col max-[820px]:gap-5">
                <div class="flex flex-col justify-between gap-3">
                    <img src="{{ asset('/img/avatar-default.svg') }}" alt=""
                        class="w-64 rounded-xl border border-gray-300">
                    <button
                        class="w-full h-10 text-gray-800/80 bg-purple-400 transition-all hover:bg-purple-300 hover:text-gray-800/100 font-semibold rounded-lg"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Выход</button>
                </div>
                <div class="w-full flex flex-col gap-5">
                    <div class="flex justify-between max-[480px]:flex-col max-[480px]:justify-start max-[480px]:gap-3">
                        <p class="text-2xl font-black text-gray-800">
                            {{ Auth::user()->name }}
                        </p>
                        <button data-modal-target="static-modal-2" data-modal-toggle="static-modal-2" type="button"
                            class="text-2xl font-black text-gray-800 transition-all hover:text-purple-300 max-[480px]:text-left">
                            Приглашения
                        </button>
                        <div id="static-modal-2" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Приглашения
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="static-modal-2">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-10">
                                        <ul class="flex flex-col gap-5">
                                            <li>
                                                <div
                                                    class="w-full h-10 border border-gray-300 rounded-lg flex items-center justify-between px-4">
                                                    <div class="flex items-center gap-1">
                                                        <p class="text-gray-800 font-semibold">
                                                            Название проекта
                                                        </p>
                                                        <a href="#!"
                                                            class="text-purple-400 font-semibold transition-all hover:text-purple-300">
                                                            | Username
                                                        </a>
                                                    </div>
                                                    <div class="flex items-center gap-3">
                                                        <svg class="w-6 h-6 cursor-pointer transition-all text-gray-800 hover:text-red-400 dark:text-white opacity-60 hover:opacity-100"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" fill="none"
                                                            viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M6 18 17.94 6M18 18 6.06 6" />
                                                        </svg>
                                                        <svg class="w-6 h-6 cursor-pointer transition-all text-gray-800 hover:text-green-400 dark:text-white opacity-60 hover:opacity-100"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" fill="none"
                                                            viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M5 11.917 9.724 16.5 19 7.5" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div
                                                    class="w-full h-10 border border-gray-300 rounded-lg flex items-center justify-between px-4">
                                                    <div class="flex items-center gap-1">
                                                        <p class="text-gray-800 font-semibold">
                                                            Название проекта
                                                        </p>
                                                        <a href="#!"
                                                            class="text-purple-400 font-semibold transition-all hover:text-purple-300">
                                                            | Username
                                                        </a>
                                                    </div>
                                                    <div class="flex items-center gap-3">
                                                        <svg class="w-6 h-6 cursor-pointer transition-all text-gray-800 hover:text-red-400 dark:text-white opacity-60 hover:opacity-100"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" fill="none"
                                                            viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M6 18 17.94 6M18 18 6.06 6" />
                                                        </svg>
                                                        <svg class="w-6 h-6 cursor-pointer transition-all text-gray-800 hover:text-green-400 dark:text-white opacity-60 hover:opacity-100"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" fill="none"
                                                            viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M5 11.917 9.724 16.5 19 7.5" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <p class="text-xl font-bold text-gray-800">
                        {{ Auth::user()->email }}
                    </p>
                    <p class="text-xl font-bold text-gray-800 flex items-center gap-2">
                        Всего проектов:
                        <span class="text-purple-400 px-2 py-1 bg-purple-50 rounded-lg">
                            32
                        </span>
                    </p>
                    <p class="text-xl font-bold text-gray-800 flex items-center gap-2">
                        Незаконченных проектов:
                        <span class="text-purple-400 px-2 py-1 bg-purple-50 rounded-lg">
                            10
                        </span>
                    </p>
                    <p class="text-xl font-bold text-gray-800 flex items-center gap-2">
                        Завершённых проектов:
                        <span class="text-purple-400 px-2 py-1 bg-purple-50 rounded-lg">
                            22
                        </span>
                    </p>
                </div>
            </div>
            <hr class="mb-10">
            <div class="flex items-center mb-5 gap-2">
                <input type="search" name="" id=""
                    class="w-full h-10 border-gray-300 rounded-lg text-gray-800 transition-all focus:ring-2 focus:ring-purple-300 focus:!border-purple-300"
                    placeholder="Введите ник пользователя, чтобы найти его">
                <button>
                    <svg class="w-10 h-10 text-gray-800 dark:text-white transition-all hover:text-purple-400 p-2 hover:bg-purple-50 rounded-md"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                    </svg>
                </button>
            </div>
            <a href="#!" class="user-line">
                <div
                    class="user-line-block w-full h-14 border border-gray-300 transition-all rounded-lg flex items-center justify-between px-4">
                    <p class="user-line-text font-semibold text-gray-800 transition-all">
                        Username
                    </p>
                    <button data-modal-target="static-modal" data-modal-toggle="static-modal" type="button">
                        <svg class="user-line-icon transition-all w-6 h-6 text-gray-800 opacity-60 dark:text-white hover:text-purple-300"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </button>
                </div>
            </a>



            <!-- Main modal -->
            <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Добавить пользователя в команду
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="static-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            <div class="flex flex-col gap-1">
                                <label class="text-black/70">Выберите проект</label>
                                <select name="" id=""
                                    class="mb-5 w-full text-center border-gray-300 rounded-lg font-bold text-gray-800/80 transition-all hover:border-purple-300 cursor-pointer focus:ring-2 focus:!ring-purple-300 focus:!border-purple-300">
                                    <option value="">
                                        Не назначено
                                    </option>
                                    <option value="value">
                                        Сделать дена не лохом
                                    </option>
                                    <option value="value">
                                        Сделать лоха не деном
                                    </option>
                                    <option value="value">
                                        Лоха деном сделать не
                                    </option>
                                </select>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="static-modal" type="button"
                                class="transition-all text-gray-800 bg-purple-400 hover:bg-purple-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Пригласить</button>
                            <button data-modal-hide="static-modal" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none transition-all bg-white rounded-lg border border-gray-300 hover:text-purple-300 hover:border-purple-300 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Отмена</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

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

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
