@extends('frontend.layouts.app')
@section('content')

<div class="container min-vh-100 d-flex align-items-center my-5">
    <div class="row mb-5">
        <div class="col-12">
            <div class="row">
                @include('frontend.partials.info-ruleta')
                @include('frontend.partials.ruleta-juego')
            </div>

        </div>
    </div>
</div>



@endsection
@push('styles')
<style>
    @import url("https://fonts.googleapis.com/css?family=Material+Icons|Work+Sans:400,700,900");

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
        border-left-color: #eecbb6;
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
        top: 7;
        left: 1;
        white-space: nowrap;
        transform-origin: 0 0;
        font-size: 0.8em;
        line-height: 15px;
        height: 136px !important;
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

    .wheel-subtext {
        font-family: Arial, sans-serif;
        font-weight: normal;
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
        height: 100%;
        transform: rotate(0deg);
    }

    .main-text {
        font-size: 1.2em;
        font-weight: bold;
        margin-bottom: 0px;
        white-space: nowrap;
    }

    .sub-text {
        font-size: 0.9em;
        white-space: nowrap;
    }

    .label {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
    }
</style>
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.13.1/underscore-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.5.0/velocity.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.3.3/backbone-min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

<script>
    // Datos de los premios en la ruleta
const data = [
  { id: '', type: 'premio', color: '#AAD500', text: '¡Ganaste!', subtext: '' },
  { id: '', type: 'sin-premio', color: '#0e793e', text: 'Sigue', subtext: 'participando' },
  { id: '', type: 'sin-premio', color: '#f00', text: 'Inténtalo', subtext: 'Mañana' },
  { id: '', type: 'sin-premio', color: '#0e793e', text: 'Estuviste', subtext: 'muy cerca' },
  { id: '', type: 'sin-premio', color: '#f00', text: 'Sigue', subtext: 'Participando' },
  { id: '', type: 'sin-premio', color: '#0e793e', text: 'Sigue', subtext: 'Participando' }
];
const winSound = new Audio('{{asset('frontend/sounds/win-3.mp3')}}');
// Constructor para la clase RouletteWheel que maneja la ruleta
function RouletteWheel(el, items) {
  this.$el = $(el);        // Elemento DOM de la ruleta
  this.items = items || []; // Elementos de la ruleta
  this._bis = false;        // Alterna la dirección de giro
  this._angle = 0;          // Ángulo actual
  this._index = 0;          // Índice del premio actual
  this._type = items['type'] || [];          // Índice del premio actual
  this.options = {
    angleOffset: -90        // Offset inicial del ángulo
  };
}

// Extiende la clase con eventos de Backbone para emitir eventos personalizados
_.extend(RouletteWheel.prototype, Backbone.Events);

// Método para hacer girar la ruleta
RouletteWheel.prototype.spin = function (_index) {
  const count = this.items.length;           // Número de elementos en la ruleta
  const delta = 360 / count;                 // Ángulo entre premios
  const index = !isNaN(parseInt(_index)) ? parseInt(_index) : Math.floor(Math.random() * count);
  const a = index * delta + (this._bis ? 1440 : -1440); // Calcula el ángulo de giro

  this._bis = !this._bis;        // Alterna la dirección en cada giro
  this._angle = a;               // Almacena el ángulo actual
  this._index = index;           // Guarda el índice seleccionado

  const $spinner = $(this.$el.find('.spinner'));

  // Funciones para el inicio y fin de la animación
  const _onAnimationBegin = () => {
    this.$el.addClass('busy');   // Añade clase para indicar que está girando
    this.trigger('spin:start', this);
  };

  const _onAnimationComplete = () => {
        this.$el.removeClass('busy');
        this.trigger('spin:end', this);
        showResult(this.items[this._index].type);
    };

  // Inicia la animación del giro
  $spinner.velocity('stop').velocity(
    { rotateZ: `${a}deg` },
    {
      easing: 'easeOutQuint',
      duration: 2500,
      begin: _onAnimationBegin.bind(this),
      complete: _onAnimationComplete.bind(this)
    }
  );
};

// Método para renderizar la ruleta
RouletteWheel.prototype.render = function () {
  const $spinner = $(this.$el.find('.spinner'));
  const D = this.$el.width();
  const R = D * 0.5;
  const count = this.items.length;
  const delta = 360 / count;

  this.items.forEach((item, i) => {
    const { color, text, type, subtext } = item;

    // Update HTML structure for text and subtext
    const html = `
      <div class="item" data-index="${i}" data-type="${type || ''}">
        <div class="label">
          <div class="text-container">
            <span class="main-text">${text}</span>
            <span class="sub-text">${subtext}</span>
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
      borderTopColor: color
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

  const rA = delta * (count - 1) - delta * 0.5 + this.options.angleOffset;
  const rB = delta * (count + 1) - delta * 0.5 + this.options.angleOffset;

  // Estilos de los marcadores
  $markerA.css({ borderTopWidth, borderRightWidth, transform: `scale(2) rotate(${rA}deg)`, borderTopColor: '#FFF' });
  $markerB.css({ borderTopWidth, borderRightWidth, transform: `scale(2) rotate(${rB}deg)`, borderTopColor: '#FFF' });

  $markers.append($markerA).append($markerB);
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
     // Subtext
     const subtext = document.createElementNS("http://www.w3.org/2000/svg", "text");
    subtext.setAttribute("class", "wheel-subtext");
    subtext.setAttribute("text-anchor", "middle");
    subtext.setAttribute("alignment-baseline", "middle");
    subtext.setAttribute("fill", "#fff");
    subtext.setAttribute("font-size", "12px");
    subtext.setAttribute("dy", "20"); // Offset for subtext
    subtext.textContent = item.subtext;

    g.appendChild(text);
    g.appendChild(subtext);
    return g;
};

// Inicialización de la ruleta cuando el DOM esté listo
let spinner;
$(window).ready(function () {
  spinner = new RouletteWheel($('.roulette'), data);
  spinner.render();
  spinner.bindEvents();

  spinner.on('spin:start', () => console.log('spin start!'));
  // spinner.on('spin:end', (r) => console.log(`spin end! --> ${r._index}`));
  spinner.on('spin:end', function (r) {
    console.log('spin end! -->' + r._index + r.items[r._index].type);
    console.log(spinner);
    // Obtiene el premio seleccionado

    if (r.items[r._index].type == 'premio1') {
      var pretext = 'Felicidades ';
    }
    if (r.items[r._index].type == 'premio2') {
      console.log('true');
      var pretext = 'Felicidades ';
    }
    const txt = data[r._index].text;
    const subtext = data[r._index].subtext;

  });
});
function showResult(type) {
    if (type === 'premio') {
        // Play winning sound
        winSound.play();

        const duration = 2000;
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

        Swal.fire({
            title: '<span style="font-size: 2em">¡GANASTE!</span>',
            html: `<p style="font-size: 1.2em">El premio se te abonará en 3 días hábiles en tu medio de pago (CMR o Débito Banco Falabella)<br><br>
                   Acércate al módulo de la ruleta para activar tu premio</p>`,
            icon: 'success',
            confirmButtonText: 'Aceptar',
            allowOutsideClick: false,
            customClass: {
                popup: 'animated bounceIn'
            }
        });
    } else {
        Swal.fire({
            title: '<span style="font-size: 2em">¡Sigue intentando!</span>',
            html: `<p style="font-size: 1.2em">Por compras mayores a S/129 podrás llevarte tus compras gratis girando la ruleta.<br><br>
                   Exclusivo con tarjetas Banco Falabella</p>`,
            icon: 'info',
            confirmButtonText: 'Aceptar',
            allowOutsideClick: false
        });
    }
}
</script>
@endpush
