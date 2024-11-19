<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: '{{ $icon }}',
            title: '{{ $title }}',
            text: '{{ $text }}',
            timer: {{ $timer }},
            showConfirmButton: {{ $showConfirmButton ? 'true' : 'false' }}
        });
    });
</script>
