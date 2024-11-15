<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User ::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'name.required' => 'Поле имя обязательно для заполнения.',
            'name.string' => 'Поле имя должно быть строкой.',
            'name.max' => 'Поле имя не должно превышать :max символов.',

            'email.required' => 'Поле email обязательно для заполнения.',
            'email.string' => 'Поле email должно быть строкой.',
            'email.lowercase' => 'Поле email должно содержать только строчные буквы.',
            'email.email' => 'Поле email должно быть действительным адресом электронной почты.',
            'email.max' => 'Поле email не должно превышать :max символов.',
            'email.unique' => 'Этот email уже занят.',

            'password.required' => 'Поле пароль обязательно для заполнения.',
            'password.confirmed' => 'Пароли не совпадают.',
            'password' => 'Пароль должен соответствовать установленным требованиям.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('profile.index', absolute: false));
    }
}
