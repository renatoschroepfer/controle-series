<?php

namespace App\Services;

use App\Serie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{


  public function criaSerie(string $nomeSerie, int $qtdTemporadas, int $epPorTemporada): Serie

  {
    
    DB::beginTransaction();
    $serie = Serie::create(['nome' => $nomeSerie]);
    $this->criaTemporadas($qtdTemporadas, $epPorTemporada, $serie);
    DB::commit();

    return $serie;
  }

  public function criaTemporadas(int $qtdTemporadas, int $epPorTemporada, Serie $serie): void

  {

    for ($i = 1; $i <= $qtdTemporadas; $i++) {

      $temporada = $serie->temporadas()->create(['numero' => $i]);

      $this->criaEpisodios($epPorTemporada, $temporada);
    }
  }


  public function criaEpisodios(int $epPorTemporada, Model $temporada):void

  {
    for ($j = 1; $j <= $epPorTemporada; $j++) {

      $temporada->episodios()->create(['numero' => $j]);
    }
  }
}