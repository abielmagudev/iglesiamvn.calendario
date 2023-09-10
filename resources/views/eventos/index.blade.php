@extends('welcome')
@section('contenido')
<header class="mb-5">
    <h1 class="is-size-1 has-text-centered is-uppercase">
        <span>Calendario</span>
        <b>{{ $request->anio }} {{ $calendario::nombreMes($request->mes) }}</b>
    </h1>
</header>

@if( count($eventos) )
<div id="calendarioItems">
    @foreach($eventos as $evento)
    <?php $vigente = strtotime($evento->fecha) > $timer ?>

    <div class="{{ $vigente ? 'has-shadow-animated' : '' }}">
        <div class="is-flex is-align-items-center has-background-white">
            <div class="is-align-self-stretch {{ $vigente ? 'has-background-primary' : 'has-background-grey' }} has-text-centered has-text-white p-5" style="width:120px;max-width:120px">
                <div class="is-size-6 is-uppercase">
                    <p>
                        <b>{{ $evento->dia_nombre_semana }}</b>
                    </p>
                    <p class="is-size-2">
                        <b>{{ $evento->dia }}</b>
                    </p>
                    <p>
                        <b>{{ $evento->hora_humana }}</b>
                    </p>
                </div>
            </div>
            <div class="p-5">
                <p class="title">{{ $evento->nombre }}</p>
                
                @if( is_string($evento->descripcion) &&! empty($evento->descripcion) )
                <p>{!! nl2br( convertirLinks($evento->descripcion) ) !!}</p>
                @endif
            </div>
        </div>
    </div>

    <br>
    @endforeach
</div>

@else
<p class="has-text-centered is-uppercase">Sin eventos en este mes</p>

@endif
@endsection

@section('afterContainer')
    @include('eventos.index.modal-trigger')
    @include('eventos.index.modal-anio-mes')
@endsection
