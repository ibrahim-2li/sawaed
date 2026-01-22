<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>شركة سواعد الرياض | Sawaed Al Riyadh</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&display=swap"
        rel="stylesheet">

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Tajawal', 'sans-serif'],
                        },
                        colors: {
                            primary: {
                                50: '#f0f5ff',
                                100: '#e0ebff',
                                500: '#3b82f6',
                                600: '#01349b',
                                700: '#05389eff',
                                800: '#01205e',
                                900: '#001030',
                            },
                            secondary: {
                                500: '#ef4444',
                                600: '#fe0000',
                                700: '#cc0000',
                                900: '#0f172a',
                            }
                        }
                    }
                }
            }
        </script>
    @endif

    <style>
        body {
            font-family: 'Tajawal', sans-serif;
        }

        .glass-nav {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }

        .hero-pattern {
            background-color: #0f172a;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%2301349b' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>

<body class="antialiased bg-gray-50 text-gray-800 overflow-x-hidden">
    <!-- Navigation -->
    <x-landing.navbar :brands="$brands" :projects="$projects" />

    <!-- Hero Section -->
    <x-landing.hero :settings="$settings" />

    <!-- About Section -->
    <x-landing.about :settings="$settings" />

    <!-- Our Brands Section -->
    <x-landing.brands :brands="$brands" />

    <!-- Services Section -->
    <x-landing.services :services="$services" />

    <!-- Projects Section -->
    <x-landing.projects :projects="$projects" />

    <!-- Clients Section -->
    <x-landing.clients :clients="$clients" />

    <!-- Contact Section -->
    <x-landing.contact :settings="$settings" />

    <!-- Footer -->
    <x-landing.footer :settings="$settings" />
</body>

</html>
