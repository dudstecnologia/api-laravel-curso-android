<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContatoRequest;
use App\Services\Api\ContatoService;

class ContatoController extends Controller
{
    public function index()
    {
        return ContatoService::index();
    }

    public function store(ContatoRequest $request)
    {
        return ContatoService::store($request->all());
    }

    // public function show($id)
    // {
    //     //
    // }

    // public function edit($id)
    // {
    //     //
    // }

    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // public function destroy($id)
    // {
    //     //
    // }
}
