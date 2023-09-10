<?php

namespace App\Http\Controllers\Evento;

use Carbon\Carbon;

class CalendarioHandler
{
    private static $cache_now;

    public static function now()
    {
        if( is_null(self::$cache_now) )
            self::$cache_now = Carbon::now();

        return self::$cache_now;
    }


    // Años

    public static function aniosValidos()
    {
        return range(
            (self::now()->year - 1),
            (self::now()->year + 1)
        );
    }
    
    public static function anios()
    {
        return self::aniosValidos();
    }

    public static function anioActual()
    {
        return self::now()->year;
    }


    //  Meses

    public static function mesesValidos()
    {
        return range(1, 12);
    }

    public static function mesesNombres()
    {
        return [
             1 => 'enero',
             2 => 'febreo',
             3 => 'marzo',
             4 => 'abril',
             5 => 'mayo',
             6 => 'junio',
             7 => 'julio',
             8 => 'agosto',
             9 => 'septiembre',
            10 => 'octubre',
            11 => 'noviembre',
            12 => 'diciembre',
        ];
    }

    public static function mesActual()
    {
        return self::now()->month;
    }

    public static function mesActualNombre()
    {
        return self::mesesNombres()[ self::mesActual() ];
    }

    public static function nombreMes($clave)
    {
        return self::mesesNombres()[ $clave ] ?? null;
    }
}
