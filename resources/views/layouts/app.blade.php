<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>
    <script>
            $(document).ready(function () {
                if (typeof $.fn.validate === "undefined") {
            console.error("jQuery Validation plugin is not loaded!");
            return;
        }
        $("#registerForm").validate({
            rules: {
                first_name: {
                    required: true,
                    lettersonly: true
                },
                last_name: {
                    required: true,
                    lettersonly: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 8
                },
                confirm_password: {
                    required: true,
                    equalTo: "#password"
                },
                contact_number: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                postcode: {
                    required: true,
                    pattern: /^\d{5}$/
                },
                gender: {
                    required: true
                },
                hobbies: {
                    required: true
                },
                roles: {
                    required: true
                },
                files: {
                    required: true
                }
            },
            submitHandler: function(form) {
                alert('in');

                // $.ajax({
                //     url: "/api/register",
                //     type: "POST",
                //     data: new FormData(form),
                //     processData: false,
                //     contentType: false,
                //     success: function(response) {
                //         alert(response.message);
                //     }
                // });
            }
        });
    });
    </script>
    </body>
</html>
