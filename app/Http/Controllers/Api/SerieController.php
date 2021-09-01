<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidaSeriesRequest;
use App\Serie;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class SerieController extends Controller
{

    public function index()
    {
        return Serie::all();
    }


    public function store(ValidaSeriesRequest $request)
    {

        Serie::create($request->all());

        return response()->json([
            'mensagem' => 'Série criada com sucesso!',
        ], 201);
    }


    public function show($id)

    {

        try {

            return Serie::findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return response()->json([

                'mensagem' => 'O id informado não existe!',
            ]);
        }
    }


    public function update(Request $request, $id)
    {

        try {
            $serie = Serie::findOrFail($id);
            $serie->update($request->all());

            return response()->json([
                'mensagem' => 'Dados atualizados com sucesso!',
            ]);
        } catch (ModelNotFoundException $e) {

            return response()->json([
                'mensagem' => 'Você não pode atualizar a série. O id informado não existe!',
            ]);
        }
    }

    public function destroy($id)
    {
        $serie = Serie::findOrFail($id);
        $serie->delete();

        return response()->json([
            'mensagem' => 'Serie deletada com suesso!'
        ]);
    }
}