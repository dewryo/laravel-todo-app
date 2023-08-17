<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRegisterRequest;
use Illuminate\Support\Facades\Auth;

class UserAdminController extends Controller
{
    public function store(RegisterRequest $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

    return redirect()->route('todo.index')->with('success','登録完了');
}

    public function login(LoginRegisterRequest $request){
        $credentials = $request->only('email', 'password'); // 認証情報を取得

        if (Auth::attempt($credentials)){
        $request->session()->regenerate();
        return redirect()->intended('/todo_index'); // "->" を使う
    }
}
}

