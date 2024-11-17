@extends('layouts.app')

@section('title')
    Проекты | План Эксперт
@endsection

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

    <main class="my-10 px-10">
        <div class="max-w-6xl w-full mx-auto my-0 text-center mb-10">
            <h1 class="text-5xl font-black text-zinc-800 mb-5">
                Ваши проекты и задачи
            </h1>
        </div>
        <div class="max-w-6xl w-full h-auto p-10 bg-white border border-purple-300 rounded-xl mx-auto my-0">
            <div class="w-full flex max-[1130px]:flex-col max-[1130px]:gap-5">
                <div class="w-2/3 max-[1130px]:w-full">
                    <div class="w-full flex gap-10 mb-10 max-[770px]:flex-col">
                        <img src="{{ asset('/img/avatar-default.svg') }}" alt=""
                            class="w-64 rounded-xl border border-gray-300">
                        <div class="w-full pr-10 flex flex-col gap-5 max-[1130px]:pr-0">
                            <p class="text-2xl font-black text-gray-800">
                                {{ Auth::user()->name }}
                            </p>
                            <hr>
                            <p class="text-xl font-bold text-gray-800">
                                {{ Auth::user()->email }}
                            </p>
                            <p class="text-xl font-bold text-gray-800 flex items-center gap-2">
                                Всего проектов:
                                <span class="text-purple-400 px-2 py-1 bg-purple-50 rounded-lg">
                                    {{ $totalProjectsCount }}
                                </span>
                            </p>
                            <p class="text-xl font-bold text-gray-800 flex items-center gap-2">
                                Незаконченных проектов:
                                <span class="text-purple-400 px-2 py-1 bg-purple-50 rounded-lg">
                                    {{ $unfinishedProjectsCount }}
                                </span>
                            </p>
                            <p class="text-xl font-bold text-gray-800 flex items-center gap-2">
                                Завершённых проектов:
                                <span class="text-purple-400 px-2 py-1 bg-purple-50 rounded-lg">
                                    {{ $finishedProjectsCount }}
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="pr-10 max-[1130px]:pr-0">
                        <form class="flex items-center mb-5 gap-2" method="POST" action="{{ route('panel.search') }}">
                            @csrf
                            <input type="search" name="word" id="word"
                                class="w-full h-10 border-gray-300 rounded-lg text-gray-800 transition-all focus:ring-2 focus:ring-purple-300 focus:!border-purple-300"
                                placeholder="Введите название проекта">
                            <button>
                                <svg class="w-10 h-10 text-gray-800 dark:text-white transition-all hover:text-purple-400 p-2 hover:bg-purple-50 rounded-md"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                        d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                </svg>
                            </button>
                        </form>
                        <form action="{{ route('panel.sort') }}" method="POST">
                            @csrf
                            <select name="sort_by" id="sort_by"
                                class="mb-5 w-full text-center border-gray-300 rounded-lg font-bold text-gray-800/80 transition-all hover:border-purple-300 cursor-pointer focus:ring-2 focus:!ring-purple-300 focus:!border-purple-300"
                                onchange="this.form.submit()">
                                <option value="">
                                    Сортировать
                                </option>
                                <option value="name">
                                    По названию
                                </option>
                                <option value="created_at">
                                    По дате создания
                                </option>
                                <option value="task_count">
                                    По количеству задач
                                </option>
                                <option value="completed">
                                    Завершённые
                                </option>
                                <option value="unfinished">
                                    Незавершённые
                                </option>
                            </select>
                        </form>
                        @if (count($completed) > 0)
                            <ul
                                class="grid grid-cols-2 gap-5 max-[1130px]:!grid-cols-3 max-[900px]:!grid-cols-2 max-[630px]:!grid-cols-1 mb-5">
                                @foreach ($completed as $item)
                                    <li>
                                        <a href="{{ route('project.show', [$item->id]) }}">
                                            <div
                                                class="relative w-full h-44 rounded-lg border bg-green-400/10 border-gray-300 p-5 overflow-hidden transition-all hover:ring-2 hover:ring-purple-300">
                                                <h3 class="text-xl font-bold text-gray-800 mb-2">
                                                    {{ $item->name }}
                                                </h3>
                                                <ul class="ml-5">
                                                    @foreach ($item->tasks as $item)
                                                        <li class="list-disc text-black/70 font-semibold">
                                                            {{ $item->name }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <div
                                                    class="absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-green-400/30 to-transparent blur">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        @if (count($unfinished) > 0)
                            <ul
                                class="grid grid-cols-2 gap-5 max-[1130px]:!grid-cols-3 max-[900px]:!grid-cols-2 max-[630px]:!grid-cols-1">
                                @foreach ($unfinished as $item)
                                    <li class="w-full">
                                        <a href="{{ route('project.show', [$item->id]) }}">
                                            <div
                                                class="relative w-full h-44 rounded-lg border border-gray-300 p-5 overflow-hidden transition-all hover:ring-2 hover:ring-purple-300">
                                                <h3 class="text-xl font-bold text-gray-800 mb-2">
                                                    {{ $item->name }}
                                                </h3>
                                                <ul class="ml-5">
                                                    @foreach ($item->tasks as $tasks)
                                                        <li class="list-disc text-black/70 font-semibold">
                                                            {{ $tasks->name }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <div
                                                    class="absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-white to-transparent blur">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                <div class="w-1/3 max-[1130px]:w-full">
                    <div class="w-sm w-full bg-white rounded-lg border border-gray-300 dark:bg-gray-800 p-4 md:p-6">
                        <div class="flex justify-between items-start w-full">
                            <div class="flex-col items-center">
                                <div class="flex items-center mb-1">
                                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">
                                        Статистика проектов</h5>
                                    <svg data-popover-target="chart-info" data-popover-placement="bottom"
                                        class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z" />
                                    </svg>
                                    <div data-popover id="chart-info" role="tooltip"
                                        class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                        <div class="p-3 space-y-2">
                                            <h3 class="font-semibold text-gray-900 dark:text-white">Незаконченные проекты
                                            </h3>
                                            <p>Незаконченные проекты - это проекты, в которых есть незаконченные задачи</p>
                                            <h3 class="font-semibold text-gray-900 dark:text-white">Завершенные проекты
                                            </h3>
                                            <p>Завершенные проекты - это проекты, в которых выполнены все задачи</p>
                                        </div>
                                        <div data-popper-arrow></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-6" id="pie-chart"></div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script>
        const getChartOptions = () => {
            return {
                series: [{{ $unfinishedProjectsCount }}, {{ $finishedProjectsCount }}],
                colors: ["#1C64F2", "#9061F9"],
                chart: {
                    height: 420,
                    width: "100%",
                    type: "pie",
                },
                stroke: {
                    colors: ["white"],
                    lineCap: "",
                },
                plotOptions: {
                    pie: {
                        labels: {
                            show: true,
                        },
                        size: "100%",
                        dataLabels: {
                            offset: -25
                        }
                    },
                },
                labels: ["Незаконченных проектов", "Завершённых проектов"],
                dataLabels: {
                    enabled: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                    },
                },
                legend: {
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                },
                yaxis: {
                    labels: {
                        formatter: function(value) {
                            return value
                        },
                    },
                },
                xaxis: {
                    labels: {
                        formatter: function(value) {
                            return value + "%"
                        },
                    },
                    axisTicks: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                },
            }
        }

        if (document.getElementById("pie-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("pie-chart"), getChartOptions());
            chart.render();
        }
    </script>
@endsection
