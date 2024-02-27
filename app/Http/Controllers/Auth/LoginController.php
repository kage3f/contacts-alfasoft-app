<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Método para mostrar o formulário de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Método para fazer o login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Se o login for bem-sucedido, redireciona para a página inicial
            return redirect()->intended('contacts');
        }

        // Se o login falhar, redireciona de volta ao formulário de login com os dados antigos
        return back()->withInput($request->only('email'))->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }
}
