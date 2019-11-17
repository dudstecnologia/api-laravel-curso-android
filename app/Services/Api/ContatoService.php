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
            return ['msg' => 'Ocorreu um erro ao salvar o contato'];
        }
    }

    public static function show($id)
    {
        try {
            return Contato::select('nome', 'telefone', 'email')->where('id', $id)->get();
        } catch (\Throwable $e) {
            return ['msg' => 'Ocorreu um erro ao selecionar o contato'];
        }
    }

    public static function update($request, $id)
    {
        try {
            $contato = Contato::find($id);
            $contato->update($request);
            return ['msg' => 'Contato atualizado com sucesso'];
        } catch (\Throwable $e) {
            return ['msg' => 'Ocorreu um erro ao atualizar o contato'];
        }
    }

    public static function destroy($id)
    {
        try {
            $contato = Contato::findOrfail($id);
            $contato->delete();
            return ['msg' => 'Contato excluído com sucesso'];
        } catch (\Throwable $e) {
            return ['msg' => 'Ocorreu um erro ao excluir o contato'];
        }
    }
}
