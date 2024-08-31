<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'senha' => 'required|string',
        ]);

        $user = Usuario::where('email', $request->email)->first();

        if ($user && $user->senha === $request->senha) {
            Auth::login($user);

            // Redireciona para a página inicial após o login bem-sucedido
            return Redirect::to('/');
        } else {
            // Retorna um redirecionamento com a mensagem de erro para o frontend
            return Redirect::back()->withErrors(['message' => 'Credenciais inválidas']);
        }
    }
}
