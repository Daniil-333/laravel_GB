<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $errors = [];
        $user = Auth::user();

        if ($request->isMethod('post')) {

            $this->validate($request, $this->validateRules(), $this->messages(), $this->attributes());

            if (Hash::check($request->post('password'), $user->password)) {
                $user->fill([
                    'name' => $request->post('name'),
                    'password' => Hash::make($request->post('newPassword')),
                    'email' => $request->post('email')
                ])->save();
                return redirect()->route('updateProfile')->withSuccess('Профиль успешно изменен!');
            } else {
                $errors['password'][] = 'Неверно введен текущий пароль';
                return redirect()->route('updateProfile')->withErrors($errors);
            }
        }

        return view('profile', [
            'user' => $user
        ]);
    }

    protected function validateRules()
    {
        return [
            'name' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'required',
            'newPassword' => 'required|string|min:3|confirmed'
        ];
    }

    protected function messages()
    {
        return [
            'newPassword.required' => 'Ты забыл заполнить :attribute',
            'newPassword.min' => 'Количество букв в поле :attribute должно быть не меньше 3',
        ];
    }

    protected function attributes()
    {
        return [
            'newPassword' => 'Новый пароль'
        ];
    }


}
