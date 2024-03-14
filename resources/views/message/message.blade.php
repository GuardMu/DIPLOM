@if(session('success'))
    <div class="alert alert-success col-4" role="alert">
        {{ session('success') }}
    </div>
@endif

@if(session('warning'))
    <div class="alert alert-warning col-4" role="alert">
        {{ session('warning') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger col-4" role="alert">
        {{ session('error') }}
    </div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            setTimeout(function() {
                alert.style.display = 'none';
            }, 5000); // Сообщения исчезнут через 5 секунд
        });
    });
</script>
