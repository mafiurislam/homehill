<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Hills Home Travels</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body class="min-h-screen bg-[#08281d] flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-white rounded-3xl p-8 shadow-2xl border border-emerald-900/20">
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="inline-block mb-3">
                <img src="{{ asset('images/logo.png') }}" alt="Hills Home" class="h-14 w-auto mx-auto object-contain">
            </a>
            <h1 class="text-2xl font-bold text-foreground">Sign In to Dashboard</h1>
            <p class="text-xs text-muted-foreground mt-1">Manage tour packages, customer inquiries and content</p>
        </div>

        @if($errors->any())
            <div class="mb-5 p-3.5 rounded-xl bg-red-50 border border-red-200 text-xs text-red-700">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Email Address</label>
                <input type="email" name="email" value="{{ old('email', 'admin@hillshome.com') }}" required autofocus
                       class="w-full rounded-xl border border-border bg-white px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
            </div>

            <div>
                <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Password</label>
                <input type="password" name="password" value="admin123" required
                       class="w-full rounded-xl border border-border bg-white px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
            </div>

            <div class="flex items-center justify-between text-xs pt-1">
                <label class="flex items-center gap-2 cursor-pointer text-muted-foreground">
                    <input type="checkbox" name="remember" class="rounded border-border text-primary focus:ring-primary/40" checked>
                    <span>Remember me</span>
                </label>
                <a href="{{ route('home') }}" class="text-primary hover:underline">Back to website</a>
            </div>

            <div class="pt-3">
                <button type="submit" class="w-full rounded-xl bg-primary py-3 text-sm font-semibold text-white shadow-soft hover:bg-primary-light transition-all">
                    Sign In
                </button>
            </div>
        </form>

        <div class="mt-8 pt-6 border-t border-border text-center">
            <span class="text-[11px] text-muted-foreground block">Default Admin Credentials</span>
            <div class="mt-1 text-xs font-mono text-emerald-800 bg-emerald-50 px-3 py-1.5 rounded-lg inline-block">
                admin@hillshome.com / admin123
            </div>
        </div>
    </div>

</body>
</html>
