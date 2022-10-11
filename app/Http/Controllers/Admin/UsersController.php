<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::query()->whereNot('name', '=', 'Admin')->paginate(6);

        return view('admin.users.index', [
            'users' => $users
        ]);
    }


    public function create(User $user)
    {
        return view('admin.users.create', [
            'user' => $user,
        ]);
    }


    public function store(UserRequest $request, User $user)
    {
        $errors = [];

        if ($request->isMethod('post')) {

            $request->validated();

            if ($request->post('password') === $request->post('password_repeat')) {
                $user->fill([
                    'name' => $request->post('name'),
                    'email' => $request->post('email'),
//                    'email_verified_at' => now(),
                    'password' => Hash::make($request->post('password')),
//                    'remember_token' => Str::random(10),
                    'is_admin' => (bool)$request->post('isAdmin')
                ])->save();
                return redirect()->route('admin.users.index')->withSuccess('Пользователь добавлен!');
            } else {
                $errors['password_repeat'][] = 'Пароли должны совпадать';
                $request->flash();
                return redirect()->route('admin.users.create')->withErrors($errors);
            }
        }
    }


    public function edit(User $user)
    {
        return view('admin.users.profile', [
            'user' => $user,
        ]);
    }


    public function update(Request $request, User $user)
    {
        $errors = [];

        $this->validate($request, $this->validateRulesOnChange(), $this->messagesOnChange(), $this->attributesOnChange());
        $isAdmin = array_key_exists('isAdmin', $request->all());

        if (Hash::check($request->all()['password'], $user->password)) {
            $user->fill([
                'name' => $request->all()['name'],
                'email' => $request->all()['email'],
                'password' => Hash::make($request->all()['newPassword']),
                'is_admin' => $isAdmin
            ])->save();
            return redirect()->route('admin.users.edit', $user)->withSuccess('Профиль успешно изменен!');
        } else {
            $errors['password'][] = 'Неверно введен текущий пароль';
            $request->flash();
            return redirect()->route('admin.users.edit', $user)->withErrors($errors);
        }
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->withSuccess('Пользователь удалён');
    }


    public function validateRulesOnChange()
    {
        return [
            'name' => 'required|min:5|max:20',
            'email' => 'required|email',
            'password' => "required|min:8|max:20",
            'newPassword' => "required|min:8|max:20",
            'isAdmin' => 'sometimes|in:on',
        ];
    }

    public function messagesOnChange()
    {
        return [
            'name.required' => 'Ты забыл заполнить :attribute',
            'name.min' => 'Мало буков в поле :attribute',
            'email.required' => 'Ты забыл заполнить :attribute',
            'email.email' => 'Поле :attribute не валидно',
            'newPassword.required' => 'Ты забыл заполнить :attribute',
            'newPassword.min' => 'Мало символов в поле :attribute',
            'newPassword.max' => 'Много символов в поле :attribute',
        ];
    }

    public function attributesOnChange()
    {
        return [
            'name' => 'Имя пользователя',
            'email' => 'E-mail',
            'password' => 'Пароль',
            'newPassword' => 'Новый пароль',
        ];
    }
}
