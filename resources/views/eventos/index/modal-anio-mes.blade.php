<div id="modalAnioMes" class="modal">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="box is-rounded mx-auto" style="max-width:480px">
            <form action="{{ route('calendario.index') }}" method="get">
                <div class="field has-addons has-addons-centered">
                    <div class="control is-flex-grow-1">
                        <span class="select is-large is-fullwidth">
                            <select name="anio">
                                @foreach($calendario::anios() as $anio_valido)
                                <option value="{{ $anio_valido }}" {{ isSelected( $anio_valido == $request->anio ) }}>{{ $anio_valido }}</option>
                                @endforeach
                            </select>
                        </span>
                    </div>
                    <div class="control is-flex-grow-1">
                        <span class="select is-large is-fullwidth">
                            <select name="mes">
                                @foreach($calendario::mesesNombres() as $mes_valido => $nombre_mes_valido)
                                <option value="{{ $mes_valido }}" {{ isSelected( $mes_valido == $request->mes ) }}>{{ ucfirst($nombre_mes_valido) }}</option>
                                @endforeach
                            </select>
                        </span>
                    </div>
                    <div class="control">
                        <button type="submit" class="button is-link is-large">
                            <span class="icon">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                        </button>
                    </div>
                </div>
            </form>
            <br>
            <div class="has-text-right">
                <a href="{{ route('calendario.index') }}">Reiniciar calendario</a>
            </div>
        </div>
    </div>
    <button class="modal-close is-large" aria-label="close"></button>
</div>
