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

    public function show($id)
    {
        return ContatoService::show($id);
    }

    public function update(ContatoRequest $request, $id)
    {
        return ContatoService::update($request->all(), $id);
    }

    public function destroy($id)
    {
        return ContatoService::destroy($id);
    }
}
