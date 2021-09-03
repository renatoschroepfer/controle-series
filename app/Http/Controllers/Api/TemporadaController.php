<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Serie;

class TemporadaController extends Controller
{

    public function index(int $serieId)
    {
        $serie = Serie::findOrFail($serieId);
        $temporada =  $serie->temporadas;

        return response()->json([
            'mensagem' => "As temporadas são { $temporada }"
        ]);
    }
}