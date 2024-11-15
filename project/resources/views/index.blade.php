@extends('layouts.app')

@section('title')
    План Эксперт
@endsection

@section('content')
    <main class="mt-10 px-10">
        <div class="max-w-6xl w-full mx-auto my-0 text-center mb-10">
            <h1 class="text-5xl font-black text-zinc-800 mb-5">
                Добро пожаловать на сайт План Эксперт — ваш надежный помощник в планировании задач и проектов!
            </h1>
            <p class="text-3xl font-bold text-purple-600/60">
                Здесь вы сможете эффективно управлять своими целями, организовывать рабочие процессы и достигать успеха в
                любых начинаниях.
            </p>
        </div>
        <div class="w-full">
            <div
                class="max-w-6xl w-full h-[700px] bg-black mx-auto my-0 rounded-lg mb-10 main-screen-img border-4 border-purple-300">
            </div>

            <div class="max-w-6xl w-full mx-auto my-0 mb-10">
                <h2 class="text-5xl font-bold text-zinc-800 text-center mb-10">
                    О нас
                </h2>
                <p class="text-center text-3xl font-bold text-purple-600/60 mb-10">
                    На План Эксперт мы понимаем, что успешное планирование — это ключ к достижению ваших целей. Наша
                    платформа предлагает интуитивно понятные инструменты для создания и управления проектами, которые
                    помогут вам:
                </p>
                <ul class="grid grid-cols-3 gap-5 max-[1235px]:grid-cols-2 max-[840px]:grid-cols-1">
                    <li>
                        <div
                            class="w-full h-[200px] bg-white border border-purple-300 flex flex-col justify-between items-center text-center rounded-lg p-5">
                            <h3 class="text-xl font-semibold text-zinc-800">
                                Составлять детализированные планы
                            </h3>
                            <p class="text-lg text-gray-800">
                                Легко создавайте планы действий, устанавливайте сроки и распределяйте задачи между
                                участниками команды.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div
                            class="w-full h-[200px] bg-white border border-purple-300 flex flex-col justify-between items-center text-center rounded-lg p-5">
                            <h3 class="text-xl text-center font-semibold text-zinc-800">
                                Отслеживать прогресс
                            </h3>
                            <p class="text-lg text-gray-800">
                                Мониторьте выполнение задач в реальном времени, чтобы всегда быть в курсе статуса вашего
                                проекта.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div
                            class="w-full h-[200px] bg-white border border-purple-300 flex flex-col justify-between items-center text-center rounded-lg p-5">
                            <h3 class="text-xl text-center font-semibold text-zinc-800">
                                Анализировать результаты
                            </h3>
                            <p class="text-lg text-gray-800">
                                Используйте мощные аналитические инструменты для оценки эффективности и корректировки планов
                                по мере необходимости.
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="max-w-6xl w-full mx-auto my-0 mb-10">
                <h2 class="text-5xl font-bold text-zinc-800 text-center mb-10">
                    Почему выбирают нас?
                </h2>
                <ul class="grid grid-cols-3 gap-5 max-[1235px]:grid-cols-2 max-[840px]:grid-cols-1">
                    <li>
                        <div
                            class="w-full h-[200px] bg-white border border-purple-300 flex flex-col justify-between items-center text-center rounded-lg p-5">
                            <h3 class="text-xl font-semibold text-zinc-800">
                                Экспертный подход
                            </h3>
                            <p class="text-lg text-gray-800">
                                Мы предлагаем решения, основанные на лучших практиках в управлении проектами.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div
                            class="w-full h-[200px] bg-white border border-purple-300 flex flex-col justify-between items-center text-center rounded-lg p-5">
                            <h3 class="text-xl text-center font-semibold text-zinc-800">
                                Гибкость
                            </h3>
                            <p class="text-lg text-gray-800">
                                Наша платформа подходит как для индивидуальных пользователей, так и для команд различного
                                размера.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div
                            class="w-full h-[200px] bg-white border border-purple-300 flex flex-col justify-between items-center text-center rounded-lg p-5">
                            <h3 class="text-xl text-center font-semibold text-zinc-800">
                                Поддержка пользователей
                            </h3>
                            <p class="text-lg text-gray-800">
                                Наша команда готова помочь вам на каждом этапе — от регистрации до успешного завершения
                                проекта.
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="w-full bg-white py-20 px-10 border rounded-t-xl border-purple-300 border-b-transparent">
                <div class="max-w-6xl w-full mx-auto my-0 text-center">
                    <h2 class="text-5xl font-black text-zinc-800 mb-5">
                        Начните прямо сейчас!
                    </h2>
                    <p class="text-3xl font-bold text-purple-600/60">
                        Присоединяйтесь к нам на План Эксперт и начните планировать свои задачи с легкостью и уверенностью.
                        С помощью План Эксперт вы сможете не только организовать свою работу, но и достичь новых высот в
                        личной и профессиональной жизни.
                    </p>
                </div>
            </div>
        </div>
    </main>

    <footer class="w-full min-h-20 bg-white border-t border-purple-300 flex items-center justify-center">
        <p class="text-center text-black/40 font-semibold">
            Эксперт Про 2024©. Все права защищены.
        </p>
    </footer>

    <style>
        .main-screen-img {
            background: url({{ asset('/img/main-img.png') }}) no-repeat;
            background-size: cover;
        }
    </style>
@endsection
