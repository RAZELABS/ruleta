@extends('frontend.layouts.app')
@section('content')

<div class="container justify-content-center my-5">
    <div class="row">
        <div class="col col-lg-12 w-100 text-align-center pt-5 mt-5 pt-lg-2 mpt-lg-2">
            <h1 class="display-3 font-weight-bold titulo-sorry p-3">¡SIGUE INTENTANDO!</h1>
        </div>
    </div>
    <div class="row">
        <div class="col col-lg-6 p-4 mt-2">
            <h1 class="font-weight-bold fab-text-light text-sorry" style="text-align: end;">Por compras mayores a s/129
                podrás llevarte tus compras
                gratis girando la ruleta.</h1>

        </div>

        <div class=" col col-lg-6 p-4 d-flex justify-content-center">
                <img src="{{asset('frontend/img/elementos/tarjetas.png')}}" style="max-width:400px !important; height:auto" class="tarjetas">
        </div>

    </div>
</div>
@endsection
{{-- @push('scripts')
<script>
    $(document).ready(function() {
        const audio = document.getElementById('sorryAudio');
        const playButton = $('#playSoundButton');
        const overlay = $('#overlay');

        function playAudio() {
            audio.currentTime = 0; // Reset audio to start
            audio.play().catch(function() {
                // Handle autoplay restrictions by showing a play button
                playButton.show();
            });
        }

        playButton.on('click', function() {
            audio.play();
            playButton.hide();
        });

        // Clear cache
        if ('serviceWorker' in navigator) {
            caches.keys().then(function(names) {
                for (let name of names) caches.delete(name);
            });
        }

        overlay.on('click touchstart', function() {
            playAudio();
            overlay.fadeOut();
        });

        // Ensure overlay fades out and audio plays on any interaction
        $(document).one('click touchstart', function() {
            playAudio();
            overlay.fadeOut();
        });
    });
</script>
@endpush --}}

