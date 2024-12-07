@extends('frontend.layouts.app')
@section('content')

{{-- Add hidden form with user data --}}
<form id="formJugada" action="{{ route('ruleta.registrarJugada') }}" method="POST">
    @csrf
    <input type="hidden" name="latitud" value="{{ $latitud }}">
    <input type="hidden" name="longitud" value="{{ $longitud }}">
    <input type="hidden" name="id_tienda" value="{{ $id_tienda }}">
    <input type="hidden" name="tipo_documento" value="{{ $tipo_documento }}">
    <input type="hidden" name="nro_documento" value="{{ $nro_documento }}">
    <input type="hidden" name="resultado" value="">
    <input type="hidden" name="opcion" value="">
</form>

{{-- Debug data
@if(config('app.debug'))
    <div class="container">
        <div class="row">
            <div class="col text-color-light" style="color: #fff !important">
                <pre>
                    Latitud: {{ $latitud }}
                    Longitud: {{ $longitud }}
                    ID Tienda: {{ $id_tienda }}
                    Tipo Documento: {{ $tipo_documento }}
                    Nro Documento: {{ $nro_documento }}
                    Premios: {{ $premios->count() }}
                </pre>
            </div>
        </div>
    </div>
@endif --}}


<div class="container d-flex align-items-center justify-content-center">

    <div class="row justify-content-center" id="contenedor-fb">
        <div class="col-10 mb-5 mb-lg-1 col-lg-6 ">
            @include('frontend.partials.info-ruleta')
        </div>
        <div class="col-10 col-lg-6 px-3 ">
            @include('frontend.partials.ruleta-juego')
        </div>
    </div>


</div>
@endsection
@push('styles')
<style>

    body {
        overflow: hidden;
    }

    .outer-border {
        position: absolute;
        top: -10px;
        left: -10px;
        right: -10px;
        bottom: -10px;
        border: 10px solid #eecbb6;
        /* Use your desired color */
        border-radius: 50%;
        z-index: -1;
    }

    .outer-glow {
        position: absolute;
        top: -15px;
        left: -15px;
        right: -15px;
        bottom: -15px;
        border-radius: 50%;
        box-shadow: 0 0 15px rgba(0, 69, 39, 0.5);
        /* Optional glow effect */
        z-index: -2;
    }

    .roulette {
        position: relative;
        display: block;
        width: 500px;
        height: 500px;
        transform: rotate(45deg);

    }


    .roulette .markers {
        display: block;
        position: absolute;
        top: -1px;
        left: -1px;
        right: -1px;
        bottom: -1px;
        overflow: hidden;
        border-radius: 100%;
    }

    .roulette .markers .marker {
        position: absolute;
        width: 0;
        height: 0;
        top: -250px;
        left: 250px;
        transform-origin: 0% 500px;
        border: 0 solid transparent;
    }

    .roulette .markers .triangle {
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 3em 0 3em 3em;
        border-color: transparent transparent transparent #007bff;
        position: absolute;
        border-left-color: #C7CF06;
        top: 50%;
        left: -1px;
        margin-top: -3em;
        filter: drop-shadow(0 0.25em 0 rgba(0, 0, 0, 0.25));
    }

    .roulette .spinner {
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border-radius: 50%;
        overflow: hidden;
        transform: rotateZ(1deg);
        /*performance boost*/
        backface-visibility: hidden;
    }

    .roulette .spinner .item {
        position: absolute;
        width: 0;
        height: 0;
        top: -250px;
        left: 250px;
        transform-origin: 0% 500px;
        border: 0 solid transparent;
    }

    .roulette .spinner .item .label {
        display: block;
        position: absolute;
        color: #fff;
        font-weight: 800;
        top: 26px;
        left: -18px;
        white-space: nowrap;
        transform-origin: 0 0;
        font-size: 0.7em;
        line-height: 11px;
        height: 136px;
    }

    .roulette .spinner .item .label i,
    .roulette .spinner .item .label .text {
        display: inline-block;
        vertical-align: middle;
        line-height: 1;
        font-size: 1em;
        text-indent: 0;
    }

    .roulette .spinner .item .label i {
        margin-right: 0.1em;
    }

    .roulette .button {
        width: 9em;
        height: 9em;
        line-height: 9em;
        top: 50%;
        left: 50%;
        margin-left: -4.5em;
        margin-top: -4.5em;
        font-weight: 800;
        z-index: 998;
        position: absolute;
        background: #fff;
        border: none;
        border-radius: 100%;
        color: #999;
        outline: none;
        cursor: pointer;
        user-select: none;
        box-shadow: 0 0.4em 0 rgba(0, 0, 0, 0.25);
        text-align: center;
        transition: transform 0.15s;
        transition-timing-function: cubic-bezier(0.68, -0.55, 0.265, 1.55);
        transform: rotate(-45deg);
    }

    .roulette .button:hover {
        color: inherit;
    }

    .roulette .button span {
        font-size: 1.6em;
        letter-spacing: -0.05em;
    }

    .roulette.busy .button {
        transform: scale(0.9);
        box-shadow: 0 0.15em 0 rgba(0, 0, 0, 0.25);
        color: #999;
        background-color: #eecbb6;
        cursor: default;
        transform: rotate(-45deg);
    }

    /* CUSTOM LABELS */
    .roulette .spinner .item[data-type="quiz"] .label {
        font-size: 1.5em;
    }

    .roulette .spinner .item[data-type="question"] .label {
        font-size: 1.3em;
        font-weight: 600;
    }

    .roulette .spinner .item[data-type="replay"] .label .text {
        font-size: 0.6em;
        white-space: initial;
        width: 1em;
        text-align: center;
        line-height: 1.2;
    }

    .roulette .spinner .item[data-type="premio1"] .label .text {
        font-size: 1.9em;
        text-align: center;
    }

    .roulette .spinner .item[data-type="premio2"] .label .text {
        font-size: 1.8em;
        text-align: center;
    }

    .roulette .spinner .item[data-type="perdedor"] .label .text {
        font-size: 2.8em;
        margin-left: 0.6em;
        text-align: center;
    }

    .roulette .spinner .item[data-type="time"] .label i {
        font-size: 1.5em;
    }

    .wheel-text {
        font-family: Arial, sans-serif;
        font-weight: bold;
        text-transform: uppercase;
    }


    /* Add to existing styles */
    text {
        max-width: 80px;
        word-wrap: break-word;
    }

    /* Add these styles */
    .text-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 90%;
        transform: rotate(-90deg);
        width: 40%;
    }

    .main-text {
        font-size: 1em;
        font-weight: bold;
        margin-bottom: 0px;
        white-space: normal;
    }

    .label {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
    }

    /* Mobile Portrait */
    @media only screen and (max-width: 576px) {

        .roulette {
            width: 380px;
            height: 380px;
        }

        .roulette .spinner .item {
            top: -190px;
            left: 190px;
            transform-origin: 0% 380px;
        }

        .roulette .spinner .item .label {
            top: 20px;
            left: -14px;
            font-size: 0.77em;
            height: 103px;
        }

        .roulette .button {
            width: 6.84em;
            height: 6.84em;
            line-height: 6.84em;
            margin-left: -3.42em;
            margin-top: -3.42em;
            font-size: 1.22em;
        }

        .roulette .spinner .item .label .text {
            font-size: 0.76em;
        }

        .roulette .spinner .item[data-type="quiz"] .label {
            font-size: 1.14em;
        }

        .roulette .spinner .item[data-type="question"] .label {
            font-size: 0.99em;
        }

        .roulette .spinner .item[data-type="replay"] .label .text {
            font-size: 0.46em;
        }

        .roulette .spinner .item[data-type="premio1"] .label .text {
            font-size: 1.45em;
        }

        .roulette .spinner .item[data-type="premio2"] .label .text {
            font-size: 1.37em;
        }

        .roulette .spinner .item[data-type="perdedor"] .label .text {
            font-size: 2.13em;
        }

        .roulette .spinner .item[data-type="time"] .label i {
            font-size: 1.14em;
        }
    }



    /* Mobile Landscape */
    @media only screen and (min-width: 577px) and (max-width: 932px) and (orientation: landscape) {}

    /* Tablet Portrait */
    @media only screen and (min-width: 768px) and (max-width: 1024px) and (orientation: portrait) {}

    /* Tablet Landscape */
    @media only screen and (min-width: 992px) and (max-width: 1366px) and (orientation: landscape) {}
</style>
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.13.1/underscore-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.5.0/velocity.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.3.3/backbone-min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

@php
    function colorOpcionResaltada($color = null){
        $cor = ($color == 1) ? '#2ecc71' : '#e74c3c';
        return $cor;
    };
    function colorOpcion($ruletaColor = null) {
        $co = ($ruletaColor % 2 !== 0) ? '#878787' : '#a1a1a1';
        return $co;
    }
@endphp

<script>
    const data = [
    @foreach ($premios as $premio)
        { id: '{{ $premio->id }}', type: '{{ $premio->premio }}', colorOpcion: '{{ colorOpcion($premio->id) }}', colorOpcionResaltada: '{{ colorOpcionResaltada($premio->premio) }}', text: '{{ $premio->descripcion }}' },
    @endforeach
    ];

const winSound = new Audio('{{asset('frontend/sounds/verde.wav')}}');
let isSpinning = false;
// Constructor para la clase RouletteWheel que maneja la ruleta
function RouletteWheel(el, items) {
  this.$el = $(el);        // Elemento DOM de la ruleta
  this.items = items || []; // Elementos de la ruleta
  this._bis = false;        // Alterna la dirección de giro
  this._angle = 90;          // Ángulo actual
  this._index = 0;          // Índice del premio actual
  this._type = items['type'] || [];          // Índice del premio actual
  this.options = {
    angleOffset: -90      // Offset inicial del ángulo
  };
}

// Extiende la clase con eventos de Backbone para emitir eventos personalizados
_.extend(RouletteWheel.prototype, Backbone.Events);

// Método para hacer girar la ruleta
RouletteWheel.prototype.spin = function (_index) {
  if (isSpinning) return; // Prevent multiple spins
  isSpinning = true;

  const $button = $('#spin-button');
  $button.prop('disabled', true).addClass('disabled');

  const count = this.items.length;
  const delta = 360 / count;
  const index = !isNaN(parseInt(_index)) ? parseInt(_index) : Math.floor(Math.random() * count);
  const a = index * delta + (this._bis ? 1440 : -1440);

  this._bis = !this._bis;
  this._angle = a;
  this._index = index;

  const $spinner = $(this.$el.find('.spinner'));

  const _onAnimationBegin = () => {
    this.$el.addClass('busy');
    this.trigger('spin:start', this);
  };

  const _onAnimationComplete = () => {
    this.$el.removeClass('busy');
    this.trigger('spin:end', this);
    showResult(this.items[this._index].type);
    this.updateSectorColor($spinner.find(`.item[data-index="${this._index}"]`), this.items[this._index]);
    // Keep button disabled
    $button.prop('disabled', true).addClass('disabled');
    isSpinning = true; // Keep it true to prevent further spins
  };

  $spinner.velocity('stop').velocity(
    { rotateZ: `${a}deg` },
    {
      easing: 'easeOutQuint',
      duration: 8500,
      begin: _onAnimationBegin.bind(this),
      complete: _onAnimationComplete.bind(this)
    }
  );
};

// Add button click handler
$(document).ready(function() {
  $('#spin-button').on('click', function() {
    if (!isSpinning) {
      roulette.spin();
    }
  });
});

// Método para renderizar la ruleta
RouletteWheel.prototype.render = function () {
  const $spinner = $(this.$el.find('.spinner'));
  const D = this.$el.width();
  const R = D * 0.5;
  const count = this.items.length;
  const delta = 360 / count;

  this.items.forEach((item, i) => {
    const { colorOpcion, text, type,  } = item;

    const html = `
      <div class="item" data-index="${i}" data-type="${type || ''}">
        <div class="label">
          <div class="text-container">
            <span class="main-text">${text}</span>
          </div>
        </div>
      </div>`;
    const $item = $(html);

    // Existing item styling
    const borderTopWidth = D + D * 0.0025;
    const deltaInRadians = (delta * Math.PI) / 180;
    const borderRightWidth = D / (1 / Math.tan(deltaInRadians));
    const r = delta * (count - i) + this.options.angleOffset - delta * 0.5;

    $item.css({
      borderTopWidth,
      borderRightWidth,
      transform: `scale(2) rotate(${r}deg)`,
      borderTopColor: colorOpcion
    });

    // Adjust text positioning
    const textHeight = parseInt((2 * Math.PI * R) / count * 0.55);

    $item.find('.label').css({
      transform: `translateY(${D * -0.25}px) translateX(${textHeight * 1.05}px) rotateZ(${90 + delta * 0.5}deg)`,
      height: `${textHeight}px`,
      width: `${textHeight * 1.5}px`,
      textAlign: 'center'
    });

    $spinner.append($item);
  });

  $spinner.css({ fontSize: `${parseInt(R * 0.05)}px` });
};

// Método para renderizar los marcadores de la ruleta
RouletteWheel.prototype.renderMarker = function () {
  const $markers = $(this.$el.find('.markers'));
  const D = this.$el.width();
  const count = this.items.length;
  const delta = 360 / count;
  const borderTopWidth = D + D * 0.0025;
  const deltaInRadians = (delta * Math.PI) / 180;
  const borderRightWidth = D / (1 / Math.tan(deltaInRadians));

  // Define dos marcadores a ambos lados del premio
  const $markerA = $('<div class="marker">');
  const $markerB = $('<div class="marker">');

  // Ajustamos los ángulos para que apunten hacia arriba (270 grados)
  const baseRotation = 270; // Rotación base para alinear arriba
  const rA = baseRotation - delta * 0.5;  // Marcador izquierdo
  const rB = baseRotation + delta * 0.5;  // Marcador derecho

  // Estilos de los marcadores sin scale
  $markerA.css({
    borderTopWidth,
    borderRightWidth,
    transform: `rotate(${rA}deg)`,
    borderTopColor: '#FFF'
  });

  $markerB.css({
    borderTopWidth,
    borderRightWidth,
    transform: `rotate(${rB}deg)`,
    borderTopColor: '#FFF'
  });

  $markers. append($markerA).append($markerB);
};

// Método para asociar eventos
RouletteWheel.prototype.bindEvents = function () {
  this.$el.find('.button').on('click', this.spin.bind(this));
};

// Add text sizing and positioning function
RouletteWheel.prototype._createText = function(angle, item, index) {
    const radius = 140; // Adjust based on wheel size
    const angleInRad = (angle + this.options.angleOffset) * Math.PI / 180;
    const x = radius * Math.cos(angleInRad);
    const y = radius * Math.sin(angleInRad);

    // Create group for text elements
    const g = document.createElementNS("http://www.w3.org/2000/svg", "g");
    g.setAttribute("transform", `translate(${x},${y}) rotate(${angle + 90})`);

    // Main text
    const text = document.createElementNS("http://www.w3.org/2000/svg", "text");
    text.setAttribute("class", "wheel-text");
    text.setAttribute("text-anchor", "middle");
    text.setAttribute("alignment-baseline", "middle");
    text.setAttribute("fill", "#fff");
    text.setAttribute("font-size", "14px");
    text.textContent = item.text;

    g.appendChild(text);
    return g;
};

// Agregar este método a la clase RouletteWheel
RouletteWheel.prototype.updateSectorColor = function(sector, item) {
  const $sector = $(sector);
  $sector.css('border-top-color', item.colorOpcionResaltada);
};

// Inicialización de la ruleta cuando el DOM esté listo
let spinner;
$(window).ready(function () {
  spinner = new RouletteWheel($('.roulette'), data);
  spinner.render();
  spinner.bindEvents();

  spinner.on('spin:start', () => console.log('spin start!'));
  spinner.on('spin:end', (r) => console.log(`spin end! --> ${r._index}`));
});

function showResult(type) {
    const form = document.getElementById('formJugada');
    form.resultado.value = type;
    form.opcion.value = spinner.items[spinner._index].id;

    if (type == 1) {
        // Play winning sound
        winSound.play();

        const duration = 5000;
        const end = Date.now() + duration;
        // Launch confetti
        confetti({
            particleCount: 10,
            spread: 180,
            origin: { y: 0.6 },
            scalar: 1.5, // Makes particles bigger
            gravity: 0.8, // Slower fall
            ticks: 300
        });
        (function frame() {
            confetti({
                particleCount: 10,
                angle: 60,
                spread: 80,
                origin: { x: 0, y: 0.8 },
                scalar: 1.2
            });
            confetti({
                particleCount: 10,
                angle: 120,
                spread: 80,
                origin: { x: 1, y: 0.8 },
                scalar: 1.2
            });

            if (Date.now() < end) {
                requestAnimationFrame(frame);
            }
        }());
        setTimeout(() => {
            form.submit();
        }, 5000);

    } else {
        setTimeout(() => {
            form.submit();
        }, 5000);
    }
}
</script>
@endpush
