$(document).ready(function() {
    const audio = document.getElementById('sorryAudio');
    const playButton = $('#playSoundButton');

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

    // Trigger SweetAlert popup when the page finishes loading
    $(window).on('load', function() {
        Swal.fire({
            title: '¡No te desanimes!',
            text: 'Mañana es otro día.',
            icon: '',
            color: '#004527',
            background: '#AAD500',
            showConfirmButton: false,
            allowOutsideClick: true,
            didOpen: () => {
                $(document).one('click', function() {
                    playAudio();
                    Swal.close();
                });
            }
        });
    });
});
