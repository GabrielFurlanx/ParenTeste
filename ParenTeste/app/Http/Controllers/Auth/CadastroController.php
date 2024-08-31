<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;

class CadastroController extends Controller
{
    public function cadastro(Request $request)
    {
        $validatedData = $request->validate([
            'nome_completo' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'cpf' => 'required|string|max:14|unique:usuarios',
            'telefone' => 'required|string|max:20',
            'endereco' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'cep' => 'required|string|max:10',
            'complemento' => 'nullable|string|max:255',
            'genero' => 'required|string|max:10',
            'data_nascimento' => 'required|date',
            'convenio' => 'required|string|max:255',
        ]);

        $presetPassword = 'biomedicina2024';

        $usuario = Usuario::create([
            'nome_completo' => $validatedData['nome_completo'],
            'email' => $validatedData['email'],
            'cpf' => $validatedData['cpf'],
            'telefone' => $validatedData['telefone'],
            'endereco' => $validatedData['endereco'],
            'bairro' => $validatedData['bairro'],
            'cep' => $validatedData['cep'],
            'complemento' => $validatedData['complemento'],
            'genero' => $validatedData['genero'],
            'data_nascimento' => $validatedData['data_nascimento'],
            'convenio' => $validatedData['convenio'],
            'senha' => $presetPassword,
        ]);

        return response()->json([
            'message' => 'Usuário cadastrado com sucesso!',
            'redirectTo' => '/login' // Indica a URL para redirecionamento
        ], 201);
    }
}
