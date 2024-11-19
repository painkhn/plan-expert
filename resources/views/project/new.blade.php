@extends('layouts.app')

@section('title')
    Создать проект | План Эксперт
@endsection

<?php
$today = date('m/d/Y');
$tomorrow = date('m/d/Y');
?>

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

    <main class="my-10 px-10 max-[580px]:px-5">
        <div class="max-w-6xl w-full mx-auto my-0 text-center mb-10">
            <h1 class="text-5xl font-black text-zinc-800 mb-5">
                Создайте новый проект
            </h1>
        </div>
        <div class="max-w-6xl w-full bg-white rounded-xl h-auto p-10 mx-auto my-0 border border-purple-300">
            <form class="flex flex-col gap-5" method="POST" action="{{ route('project.upload') }}">
                @csrf
                <div class="flex flex-col gap-1">
                    <label class="text-black/70 max-[580px]:text-center">Введите название вашего проекта</label>
                    <input type="text" name="name"
                        class="border border-gray-300 w-full h-10 px-4 rounded-md outline-none transition-all focus:ring-2 focus:ring-purple-300 focus:!border-purple-300"
                        required>
                </div>
                <div class="flex flex-col gap-1">
                    <label class="text-black/70 max-[580px]:text-center">Опишите, что вы хотите достичь</label>
                    <textarea rows="4" name="description" id="description"
                        class="border border-gray-300 w-full px-4 rounded-md outline-none transition-all focus:ring-2 focus:ring-purple-300 focus:!border-purple-300"></textarea>
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-black/70 max-[580px]:text-center">Выберите дату начала и окончания проекта</label>
                    <div>
                        <div id="date-range-picker" date-rangepicker class="flex items-center max-[580px]:flex-col">
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input id="datepicker-range-start" name="start" type="text" datepicker
                                    datepicker-min-date="<?php echo $tomorrow; ?>"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:!ring-purple-300 focus:!border-purple-300 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:!focus:ring-purple-300 dark:focus:!border-purple-300"
                                    placeholder="Начало проекта">
                            </div>
                            <span class="mx-4 text-gray-500">до</span>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input id="datepicker-range-end" name="end" type="text" datepicker
                                    datepicker-min-date="<?php echo $tomorrow; ?>"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:!ring-purple-300 focus:!border-purple-300 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:!focus:ring-purple-300 dark:!focus:border-purple-300"
                                    placeholder="Окончание проекта">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="bg-purple-300 py-2 rounded-lg font-semibold text-black/70 transition-all hover:bg-purple-400 hover:text-black/90">Создать
                    проект</button>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
@endsection
