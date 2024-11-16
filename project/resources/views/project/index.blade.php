@extends('layouts.app')

@section('title')
    Название проекта | План Эксперт
@endsection

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

    <main class="my-10 px-10">
        <div class="max-w-6xl w-full mx-auto my-0 text-center mb-10">
            <h1 class="text-5xl font-black text-zinc-800 mb-5">
                {{ $project->name }}
            </h1>
            <div class="w-full rounded-xl border border-purple-300 p-10 mx-auto my-0 bg-white">
                <p class="mb-5 text-purple-300 font-bold text-xl">
                    {{ $project->description }}
                </p>
                <a href="#!" class="do-new">
                    <div
                        class="do-line w-full transition-all hover:border-purple-300 hover:ring-2 hover:ring-purple-300 h-14 border border-gray-300 rounded-lg flex items-center justify-center mb-5">
                        <svg class="do-line-text opacity-60 transition-all w-6 h-6 text-gray-800 dark:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                </a>
                <form class="mb-5 w-full p-3 border border-gray-300 rounded-lg do-new-form hidden">
                    <div class="flex flex-col gap-1 mb-2">
                        <div class="flex items-center justify-between mb-2">
                            <label class="text-black/70 text-left">Новый текст для вашей задачи</label>
                            <svg class="w-6 h-6 text-gray-800 dark:text-white do-new-close cursor-pointer opacity-60 transition-all hover:text-red-400 hover:opacity-100"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                        <input type="text"
                            class="border border-gray-300 w-full h-14 px-4 rounded-md outline-none transition-all focus:ring-2 focus:ring-purple-300 focus:!border-purple-300">
                        <div class="flex flex-col gap-1 mb-2">
                            <label class="text-black/70 text-left">Дедлайн до:</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input datepicker id="default-datepicker" type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg transition-all focus:ring-2 focus:ring-purple-300 focus:!border-purple-300 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-300 dark:focus:border-purple-300"
                                    placeholder="Выберите дату">
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="text-black/70 text-left">Выберите ответственного</label>
                            <select name="" id=""
                                class="mb-5 w-full text-center border-gray-300 rounded-lg font-bold text-gray-800/80 transition-all hover:border-purple-300 cursor-pointer focus:ring-2 focus:!ring-purple-300 focus:!border-purple-300">
                                <option value="">
                                    Не назначено
                                </option>
                                <option value="value">
                                    Пользователь 1
                                </option>
                                <option value="value">
                                    Пользователь 2
                                </option>
                                <option value="value">
                                    Пользователь 3 ден лох
                                </option>
                            </select>
                        </div>
                    </div>
                    <button type="submit"
                        class="bg-purple-300 py-3 w-full rounded-lg font-semibold text-black/70 transition-all hover:bg-purple-400 hover:text-black/90">Отправить</button>
                </form>
                <ul class="grid grid-cols-3 mb-5">
                    <li>
                        <p class="text-xl font-bold text-gray-800 flex items-center gap-2">
                            Всего задач:
                            <span class="text-purple-400 px-2 py-1 bg-purple-50 rounded-lg">
                                54
                            </span>
                        </p>
                    </li>
                    <li class="justify-self-center">
                        <p class="text-xl font-bold text-gray-800 flex items-center gap-2">
                            Завершённых задач:
                            <span class="text-purple-400 px-2 py-1 bg-purple-50 rounded-lg">
                                20
                            </span>
                        </p>
                    </li>
                    <li class="justify-self-end">
                        <p class="text-xl font-bold text-gray-800 flex items-center gap-2">
                            Незавершённых задач:
                            <span class="text-purple-400 px-2 py-1 bg-purple-50 rounded-lg">
                                34
                            </span>
                        </p>
                    </li>
                </ul>
                <ul class="flex flex-col gap-5">
                    <li>
                        <a href="#!">
                            <div
                                class="do-line w-full h-14 border border-gray-300 rounded-lg px-5 flex flex-start items-center gap-5">
                                <svg class="do-line-icon w-6 h-6 text-purple-400 dark:text-white transition-all opacity-100"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                                </svg>
                                <p class="do-line-text transition-all text-purple-400 font-bold line-through">
                                    Выполненная задача
                                </p>
                                <div class="ml-auto flex gap-3">
                                    <p href="#!"
                                        class="text-purple-400/60 cursor-pointer font-semibold transition-all hover:text-purple-400/100">
                                        Отв. пользователь
                                    </p>
                                    <p class="text-purple-400 font-semibold">
                                        Выполнено 16.03
                                    </p>
                                    <svg class="do-line-icon transition-all hover:text-red-400 w-6 h-6 text-gray-800 dark:text-white opacity-60"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                    </svg>
                                </div>

                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#!" class="do-line">
                            <div
                                class="w-full h-14 border border-gray-300 rounded-lg px-5 flex flex-start items-center gap-5 bg-yellow-50">
                                <svg class="do-line-icon w-6 h-6 text-purple-400 dark:text-white transition-all opacity-10"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                                </svg>
                                <p class="do-line-text transition-all text-gray-800/80 font-bold">
                                    Задача
                                </p>
                                <div class="ml-auto flex gap-3">
                                    <p href="#!"
                                        class="text-purple-400/60 cursor-pointer font-semibold transition-all hover:text-purple-400/100">
                                        Отв. пользователь
                                    </p>
                                    <p class="font-semibold text-red-400">
                                        до 25.03
                                    </p>
                                    <svg class="do-line-icon transition-all hover:text-blue-400 w-6 h-6 text-gray-800 dark:text-white opacity-60 edit-button"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                    </svg>
                                    <svg class="do-line-icon transition-all hover:text-red-400 w-6 h-6 text-gray-800 dark:text-white opacity-60"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <form class="mt-3 hidden">
                            <div class="flex flex-col gap-1 mb-2">
                                <label class="text-black/70 text-left">Новый текст для вашей задачи</label>
                                <input type="text"
                                    class="border border-gray-300 w-full h-14 px-4 rounded-md outline-none transition-all focus:ring-2 focus:ring-purple-300 focus:!border-purple-300">
                            </div>
                            <button type="submit"
                                class="bg-purple-300 py-3 w-full rounded-lg font-semibold text-black/70 transition-all hover:bg-purple-400 hover:text-black/90">Отправить</button>
                        </form>
                    </li>
                    <li>
                        <a href="#!" class="do-line">
                            <div
                                class="w-full h-14 border border-gray-300 rounded-lg px-5 flex flex-start items-center gap-5">
                                <svg class="do-line-icon w-6 h-6 text-purple-400 dark:text-white transition-all opacity-10"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                                </svg>
                                <p class="do-line-text transition-all text-gray-800/80 font-bold">
                                    Задача
                                </p>
                                <div class="ml-auto flex gap-3">
                                    <p href="#!"
                                        class="text-purple-400/60 cursor-pointer font-semibold transition-all hover:text-purple-400/100">
                                        Отв. пользователь
                                    </p>
                                    <p class="text-purple-400 font-semibold">
                                        до 25.03
                                    </p>
                                    <svg class="do-line-icon transition-all hover:text-blue-400 w-6 h-6 text-gray-800 dark:text-white opacity-60 edit-button"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                    </svg>
                                    <svg class="do-line-icon transition-all hover:text-red-400 w-6 h-6 text-gray-800 dark:text-white opacity-60"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <form class="mt-3 hidden">
                            <div class="flex flex-col gap-1 mb-2">
                                <label class="text-black/70 text-left">Новый текст для вашей задачи</label>
                                <input type="text"
                                    class="border border-gray-300 w-full h-14 px-4 rounded-md outline-none transition-all focus:ring-2 focus:ring-purple-300 focus:!border-purple-300">
                            </div>
                            <button type="submit"
                                class="bg-purple-300 py-3 w-full rounded-lg font-semibold text-black/70 transition-all hover:bg-purple-400 hover:text-black/90">Отправить</button>
                        </form>
                    </li>
                    <li>
                        <a href="#!" class="do-line">
                            <div
                                class="w-full h-14 border border-gray-300 rounded-lg px-5 flex flex-start items-center gap-5">
                                <svg class="do-line-icon w-6 h-6 text-purple-400 dark:text-white transition-all opacity-10"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                                </svg>
                                <p class="do-line-text transition-all text-gray-800/80 font-bold">
                                    Задача
                                </p>
                                <div class="ml-auto flex gap-3">
                                    <p href="#!"
                                        class="text-purple-400/60 cursor-pointer font-semibold transition-all hover:text-purple-400/100">
                                        Отв. пользователь
                                    </p>
                                    <p class="text-purple-400 font-semibold">
                                        до 25.03
                                    </p>
                                    <svg class="do-line-icon transition-all hover:text-blue-400 w-6 h-6 text-gray-800 dark:text-white opacity-60 edit-button"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                    </svg>
                                    <svg class="do-line-icon transition-all hover:text-red-400 w-6 h-6 text-gray-800 dark:text-white opacity-60"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <form class="mt-3 hidden">
                            <div class="flex flex-col gap-1 mb-2">
                                <label class="text-black/70 text-left">Новый текст для вашей задачи</label>
                                <input type="text"
                                    class="border border-gray-300 w-full h-14 px-4 rounded-md outline-none transition-all focus:ring-2 focus:ring-purple-300 focus:!border-purple-300">
                            </div>
                            <button type="submit"
                                class="bg-purple-300 py-3 w-full rounded-lg font-semibold text-black/70 transition-all hover:bg-purple-400 hover:text-black/90">Отправить</button>
                        </form>
                    </li>
                    <!-- <li>
                                                                                                                                            <a href="#!">
                                                                                                                                                <div class="do-line w-full h-14 border border-gray-300 rounded-lg px-5 flex flex-start items-center gap-5">
                                                                                                                                                    <svg class="do-line-icon w-6 h-6 text-purple-400 dark:text-white transition-all opacity-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                                                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>
                                                                                                                                                    </svg>
                                                                                                                                                    <p class="do-line-text transition-all text-gray-800/80 font-bold">
                                                                                                                                                        Задача
                                                                                                                                                    </p>
                                                                                                                                                    <div class="ml-auto flex gap-3">
                                                                                                                                                        <svg class="do-line-icon transition-all hover:text-blue-400 w-6 h-6 text-gray-800 dark:text-white opacity-60 edit-button" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                                                                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                                                                                                                                        </svg>
                                                                                                                                                        <svg class="do-line-icon transition-all hover:text-red-400 w-6 h-6 text-gray-800 dark:text-white opacity-60" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                                                                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                                                                                                                        </svg>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </a>
                                                                                                                                            <form class="mt-3 hidden .do-line-form">
                                                                                                                                                <div class="flex flex-col gap-1 mb-2">
                                                                                                                                                    <label class="text-black/70 text-left">Новый текст для вашей задачи</label>
                                                                                                                                                    <input type="text" class="border border-gray-300 w-full h-14 px-4 rounded-md outline-none transition-all focus:ring-2 focus:ring-purple-300 focus:!border-purple-300">
                                                                                                                                                </div>
                                                                                                                                                <button type="submit" class="bg-purple-300 py-3 w-full rounded-lg font-semibold text-black/70 transition-all hover:bg-purple-400 hover:text-black/90">Отправить</button>
                                                                                                                                            </form>
                                                                                                                                        </li> -->
                </ul>
                <div class="text-right mt-10">
                    <a href="#!" class="text-gray-800/60 font-semibold transition-all hover:text-gray-800/100">
                        Скачать отчёт
                    </a>
                </div>
            </div>
        </div>
    </main>

    <style>
        .do-line:hover .do-line-icon {
            opacity: 1;
        }

        .do-line:hover .do-line-text {
            color: rgb(172 148 250);
            opacity: 1;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const doNew = document.querySelector('.do-new');
            const doNewForm = document.querySelector('.do-new-form');
            const doNewClose = document.querySelector('.do-new-close');

            if (doNew && doNewForm && doNewClose) {
                doNew.addEventListener('click', function(event) {
                    event.preventDefault();
                    doNew.classList.add('hidden');
                    doNewForm.classList.remove('hidden');
                });

                doNewClose.addEventListener('click', function(event) {
                    event.preventDefault();
                    doNewForm.classList.add('hidden');
                    doNew.classList.remove('hidden');
                });
            } else {
                console.error('One or more elements not found');
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-button');

            editButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const doLine = this.closest('.do-line');
                    if (!doLine) {
                        console.error('do-line element not found');
                        return;
                    }

                    const form = doLine.nextElementSibling;
                    if (!form || form.tagName !== 'FORM') {
                        console.error('Form not found or not a form element');
                        console.log('Next sibling:', form);
                        return;
                    }

                    form.classList.toggle('hidden');
                });
            });
        });
    </script>
@endsection
