<?php

namespace App\Http\Controllers\Api;

use App\Episodio;
use App\Http\Controllers\Controller;
use App\Temporada;
use Illuminate\Http\Request;

class EpisodioController extends Controller
{

  public function index(temporada $temporada)
  {

    $episodios = $temporada->episodios;

    return response()->json([
      'mensagem' => "O episodio {$episodios}"
    ]);
  }

  public function assitir(Temporada $temporada, Request $request)

  {

    $episodiosAssistidos = $request->episodios;
    $temporada->episodios->each(function (Episodio $episodio)
    use ($episodiosAssistidos) {
      $episodio->assistido = in_array(
        $episodio->id,
        $episodiosAssistidos
      );

      $episodio->push();
    });
  }
}