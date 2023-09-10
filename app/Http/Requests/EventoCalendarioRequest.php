<?php

namespace App\Http\Requests;

use App\Http\Controllers\Evento\CalendarioHandler;
use Illuminate\Foundation\Http\FormRequest;

class EventoCalendarioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'anio' => [
                'nullable',
                'in:' . implode(',', CalendarioHandler::aniosValidos())
            ],
            'mes' => [
                'nullable',
                'in:' . implode(',', CalendarioHandler::mesesValidos())
            ],
        ];
    }

    public function messages()
    {
        return [
            'anio.in' => __('Selecciona un año válido'),
            'mes.in' => __('Selecciona un mes válido'),
        ];
    }

    public function passedValidation()
    {
        $this->merge([
            'anio' => $this->get('anio', ((string) CalendarioHandler::anioActual()) ),
            'mes' => $this->get('mes', ((string) CalendarioHandler::mesActual()) ),
        ]);
    }
}
