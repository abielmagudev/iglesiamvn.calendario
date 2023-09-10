<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Evento\CalendarioHandler;
use App\Http\Requests\EventoCalendarioRequest;

class EventoController extends Controller
{
    public function __invoke(EventoCalendarioRequest $request)
    {
        return view('eventos.index', [
            'request' => $request,
            'calendario' => CalendarioHandler::class,
            'eventos' => array_map(function ($item) {
                return (object) $item;
            }, $this->apiDataEventos($request->anio, $request->mes)),
            'timer' => strtotime( now() ),
        ]);
    }

    private function apiDataEventos(string $anio, string $mes)
    {
        $api_url = implode('/', [config('aplicacion.api.eventos'), $anio, $mes]);
        $response = Http::get($api_url);
        return $response->json()['data'] ?? [];   
    }
}
