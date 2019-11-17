<?php

namespace App\Services\Api;

use App\Contato;
use App\User;
use Illuminate\Support\Facades\Auth;

class ContatoService
{
    public static function index()
    {
        $user_id = Auth::user()->id;
        return Contato::where('user_id', $user_id)->get();
    }

    public static function store($request)
    {
        try {
            $request['user_id'] = Auth::user()->id;
            Contato::create($request);
            return ['msg' => 'Contato salvo com sucesso'];
        } catch (\Throwable $e) {
            return ['msg' => 'Ocorreu um erro ao salvar o Usuário'];
        }
    }
}
