<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - PPDB Bhinneka</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="min-h-screen bg-slate-50">
    <div class="min-h-screen flex flex-col lg:flex-row">
        {{-- Brand panel --}}
        <div class="lg:w-[42%] bg-gradient-to-br from-teal-700 via-teal-600 to-emerald-700 text-white p-8 lg:p-12 flex flex-col justify-between relative overflow-hidden">
            <div class="absolute -top-20 -right-20 w-64 h-64 bg-white/10 rounded-full blur-2xl"></div>
            <div class="absolute bottom-10 -left-10 w-48 h-48 bg-emerald-400/20 rounded-full blur-xl"></div>

            <div class="relative">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                    <div class="w-12 h-12 rounded-2xl bg-white/15 flex items-center justify-center text-2xl">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div>
                        <p class="text-teal-100 text-xs uppercase tracking-wider">Sekolah Bhinneka</p>
                        <p class="font-bold text-xl">PPDB Online</p>
                    </div>
                </a>
            </div>

            <div class="relative my-10 lg:my-0">
                @yield('hero')
            </div>

            <div class="relative hidden lg:block text-sm text-teal-100">
                <p>&copy; {{ date('Y') }} PPDB Sekolah Bhinneka</p>
            </div>
        </div>

        {{-- Form panel --}}
        <div class="flex-1 flex flex-col justify-center px-6 py-10 lg:px-16 lg:py-12">
            @if ($errors->any())
                <div class="max-w-md w-full mx-auto mb-4 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-2xl text-sm">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="max-w-md w-full mx-auto mb-4 bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-2xl text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="max-w-md w-full mx-auto mb-4 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-2xl text-sm">
                    {{ session('error') }}
                </div>
            @endif

            <div class="max-w-md w-full mx-auto">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
