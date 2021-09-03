<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidaSeriesRequest;
use App\Serie;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class SerieController extends Controller
{

    public function index()
    {
        return Serie::query()
            ->orderBy('id')
            ->get();
    }

    public function store(ValidaSeriesRequest $request, CriadorDeSerie $criadorDeSerie)
    {

        $serie = $criadorDeSerie->criaSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->ep_por_temporada
        );

        return response()->json([
            'mensagem' => "Série {$serie->nome} criada com sucesso!",
        ], 201);
    }


    public function show($id)

    {
        try {

            return Serie::findOrFail($id);
        } catch (ModelNotFoundException $e) {

            return response()->json([

                'mensagem' => "O id {$id} informado não existe!",
            ], 200);
        }
    }


    public function update(Request $request, $id)
    {

        try {
            $serie = Serie::findOrFail($id);
            $serie->update($request->all());

            return response()->json([
                'mensagem' => 'Dados atualizados com sucesso!',
            ], 200);
        } catch (ModelNotFoundException $e) {

            return response()->json([
                'mensagem' => 'Você não pode atualizar a série. O id informado não existe!',
            ], 404);
        }
    }

    public function destroy(Request $request, RemovedorDeSerie $removedorDeSerie)
    {
        $nomeSerie = $removedorDeSerie->removerSerie($request->id);
        
        return response()->json([
            'mensagem' => "Serie {$nomeSerie} detelado com sucesso!"
        ]);
    }
}