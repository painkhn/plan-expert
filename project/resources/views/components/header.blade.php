<header
    class="bg-white rounded-b-xl border-b border-purple-300 w-full min-h-20 px-10 flex items-center justify-between max-[1150px]:flex-col max-[1150px]:p-10">
    <nav class="flex gap-5 max-[1150px]:flex-col max-[1150px]:items-center">
        <a href="{{ route('index') }}">
            <img src="{{ asset('/img/logo.svg') }}" alt="" class="w-40 transition-all hover:opacity-80">
        </a>
        <div class="flex">
            <a href="pages/projects.html"
                class="h-16 text-zinc-600 font-semibold texd-lg py-2 px-4 transition-all hover:bg-purple-50 hover:text-zinc-800 rounded-lg flex items-center">
                Панель задач
            </a>
            <a href="pages/create_project.html"
                class="h-16 text-zinc-600 font-semibold texd-lg py-2 px-4 transition-all hover:bg-purple-50 hover:text-zinc-800 rounded-lg flex items-center">
                Создать проект
            </a>
            <a href="pages/admin.html"
                class="h-16 text-zinc-600 font-semibold texd-lg py-2 px-4 transition-all hover:bg-purple-50 hover:text-zinc-800 rounded-lg flex items-center">
                Панель администратора
            </a>
        </div>
    </nav>
    <nav>
        @guest
            <a href="{{ route('login') }}"
                class="text-zinc-600 font-semibold texd-lg py-2 px-4 transition-all hover:bg-purple-50 hover:text-zinc-800 rounded-lg">
                Вход
            </a>
            <a href="{{ route('register') }}"
                class="text-zinc-600 font-semibold texd-lg py-2 px-4 transition-all hover:bg-purple-50 hover:text-zinc-800 rounded-lg">
                Регистрация
            </a>
        @else
            <a href="{{ route('profile.index') }}"
                class="text-zinc-600 font-semibold texd-lg py-2 px-4 transition-all hover:bg-purple-50 hover:text-zinc-800 rounded-lg">
                {{ Auth::user()->name }}
            </a>
        @endguest
    </nav>
</header>
