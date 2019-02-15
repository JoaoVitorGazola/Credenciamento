<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public static function criarFarmacia(Request $request, $id){
        $password = str_random(8);
        User::create([
            'name' => $request->razaoSocial,
            'email' => $request->email,
            'user' => $request->cnpj,
            'password' => \Hash::make($password),
            'farmacias_id' => $id,
        ]);
        return $password;
    }
    public static function criarResponsavel(Request $request, $id){
        $password = str_random(8);
        User::create([
            'name' => $request->nome,
            'email' => $request->email,
            'user' => $request->cpf,
            'password' => \Hash::make($password),
            'responsaveis_id' => $id,
        ]);
        return $password;
    }
}
