@extends('layouts.app')

@section('title')
    Блокировка
@endsection

@section('content')
    <div class="flex items-center justify-center flex-col min-h-screen gap-5">
        <p class="text-2xl font-black text-purple-400">
            Извините, вы заблокированы
        </p>
        <a type="button" href="/"
            class="bg-purple-400 font-semibold text-gray-800 transition-all hover:bg-purple-300 px-4 py-2 rounded-lg">
            На главную
            </button>
    </div>
@endsection
