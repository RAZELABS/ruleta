<div class="row ">
    <div class="col-12 d-flex justify-content-center">
        <div class="ruleta-container">
            <div class="roulette">
                <div class="outer-border"></div>
                <div class="outer-glow"></div>
                <div class="spinner"></div>
                <div class="shadow"></div>
                <div class="markers">
                    <div class="triangle">
                    </div>
                </div>
                <div class="button">
                    <span class="text-dark">Gira</span>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <form action="{{ route('ruleta.registrarJugada') }}" method="post" id="formJugada">
            @csrf
            @method('POST')
            <input type="hidden" name="id_tienda" value="{{ $id_tienda }}" readonly/>
            <input type="hidden" name="tipo_documento" value="{{ $tipo_documento }}" readonly/>
            <input type="hidden" name="nro_documento" value="{{ $nro_documento }}" readonly/>
            <input type="hidden" name="resultado" readonly/>
            <input type="hidden" name="opcion" readonly/>
            <input type="hidden" name="latitud" value="{{ $latitud }}" readonly/>
            <input type="hidden" name="longitud" value="{{ $longitud }}" readonly/>

            <button type="submit" class="btn btn-primary d-none">
                Action
            </button>
        </form>
    </div>

</div>
