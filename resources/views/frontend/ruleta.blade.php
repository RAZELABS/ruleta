@extends('frontend.layouts.app')
@section('content')


<form id="formJugada" action="{{ route('ruleta.registrarJugada') }}" method="POST">
    @csrf
    <input type="hidden" name="latitud" id="latitud" value="" readonly>
    <input type="hidden" name="longitud" id="longitud" value="" readonly>
    <input type="hidden" name="id_tienda" value="{{ $id_tienda->id }}" readonly>
    <input type="hidden" name="tipo_documento" value="{{ $tipo_documento }}" readonly>
    <input type="hidden" name="nro_documento" value="{{ $nro_documento }}" readonly>
    <input type="hidden" name="resultado" value="" readonly>
    <input type="hidden" name="opcion" id="opcion" value="" readonly>
    <input type="hidden" name="lol" value="{{$opcion_seleccionada}}" readonly>
</form>


<div class="container d-flex align-items-center justify-content-center">

    <div class="row justify-content-center" id="contenedor-fb">
        <div class="col-10 mb-5 mb-lg-1 col-lg-6 ">
            @include('frontend.partials.info-ruleta')
        </div>
        <div class="col-10 col-lg-6 px-3 ">
            @include('frontend.partials.ruleta-juego')

        </div>
        {{-- <div class="col-12">
            <button onclick="spinner.spin()">perder</button>
            <button onclick="spinner.spin({{$opcion_seleccionada}})">Ganar</button>
        </div> --}}
    </div>
</div>

@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('frontend/css/ruleta.css') }}">
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
  const opcionSeleccionada = {{$opcion_seleccionada}};
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

// // Add button click handler
// $(document).ready(function() {
//   $('#spin-button').on('click', function() {
//     if (!isSpinning) {
//       roulette.spin();
//     }
//   });
// });

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
  const self = this;
  this.$el.find('.button').on('click', function() {
    self.spin(opcionSeleccionada);
  });
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
        }, 8000);

    } else {
        setTimeout(() => {
            form.submit();
        }, 8000);
    }
}
</script>
<script>
    $(document).ready(function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                sessionStorage.setItem('latitud', position.coords.latitude);
                sessionStorage.setItem('longitud', position.coords.longitude);
                updateFormCoordinates(position.coords.latitude, position.coords.longitude);
            }, function(error) {
                console.log('User denied geolocation request.');
            });
        } else {
            console.log('Geolocation is not supported by this browser.');
        }

        if (sessionStorage.getItem('latitud') && sessionStorage.getItem('longitud')) {
            updateFormCoordinates(sessionStorage.getItem('latitud'), sessionStorage.getItem('longitud'));
        }
    });

    function updateFormCoordinates(lat, long) {
        $('#latitud').val(lat);
        $('#longitud').val(long);
    }
</script>

@endpush
