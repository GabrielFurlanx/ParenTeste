<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return response()->json(['message' => 'Login bem-sucedido!'], 200);
        } else {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }
    }
}
