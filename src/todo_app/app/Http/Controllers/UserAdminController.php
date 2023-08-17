<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserAdminController extends Controller
{
    public function store(RegisterRequest $request){
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return redirect()->route('todo.index')->with('success','登録完了');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => '登録に失敗しました。']);
        }
    }


public function login(LoginRegisterRequest $request){
    try {
        $credentials = $request->only('email', 'password'); // 認証情報を取得

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/todo_index');
        } else {
            throw ValidationException::withMessages([
                'error' => 'ログインに失敗しました。'
            ]);
        }
    } catch (ValidationException $e) {
        return redirect()->back()->withInput()->withErrors($e->errors());
    } catch (\Exception $e) {
        return redirect()->back()->withInput()->withErrors(['error' => 'ログインに失敗しました。']);
    }
}
}

