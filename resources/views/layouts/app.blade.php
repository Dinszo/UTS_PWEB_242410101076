<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Long Black')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const passwordInput = document.getElementById("password");
    const toggleButton = document.getElementById("togglePassword");

    if (passwordInput && toggleButton) {
        toggleButton.addEventListener("click", function () {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleButton.textContent = "Sembunyi";
            } else {
                passwordInput.type = "password";
                toggleButton.textContent = "Lihat";
            }
        });
    }
});
</script>
<body>
    @hasSection('navbar')
        @include('components.navbar')
    @endif

    <main class="main-content">
        @yield('content')
    </main>

    @hasSection('footer')
        <x-footer />
    @endif

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>