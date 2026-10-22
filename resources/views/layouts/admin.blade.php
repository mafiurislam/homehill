<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') — Hills Home Travels</title>

    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background-color: #f6faf7;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col md:flex-row antialiased text-foreground">

    <!-- Sidebar Navigation -->
    <aside class="w-full md:w-64 bg-[#08281d] text-white flex-shrink-0 flex flex-col justify-between p-6">
        <div>
            <!-- Admin Logo -->
            <div class="flex items-center gap-3 pb-6 border-b border-emerald-900">
                <img src="{{ asset('images/logo.png') }}" alt="Hills Home" class="h-10 w-auto object-contain">
                <div>
                    <h3 class="text-sm font-bold text-white tracking-wide">Hills Home</h3>
                    <span class="text-[11px] text-emerald-300 font-medium">Administration</span>
                </div>
            </div>

            <!-- Nav Links -->
            <nav class="mt-6 space-y-1.5">
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-primary text-white font-semibold' : 'text-emerald-100/75 hover:bg-white/10 hover:text-white' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.inquiries') }}" 
                   class="flex items-center justify-between px-4 py-2.5 rounded-xl text-sm font-medium transition-colors {{ request()->routeIs('admin.inquiries*') ? 'bg-primary text-white font-semibold' : 'text-emerald-100/75 hover:bg-white/10 hover:text-white' }}">
                    <div class="flex items-center gap-3">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                        <span>Inquiries</span>
                    </div>
                    @php $newInquiriesCount = \App\Models\Inquiry::where('status', 'new')->count(); @endphp
                    @if($newInquiriesCount > 0)
                        <span class="rounded-full bg-emerald-400 text-[#08281d] px-2 py-0.5 text-[11px] font-bold">
                            {{ $newInquiriesCount }}
                        </span>
                    @endif
                </a>

                <a href="{{ route('admin.packages.index') }}" 
                   class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-colors {{ request()->routeIs('admin.packages*') ? 'bg-primary text-white font-semibold' : 'text-emerald-100/75 hover:bg-white/10 hover:text-white' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    <span>Tour Packages</span>
                </a>

                <a href="{{ route('admin.categories.index') }}" 
                   class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-colors {{ request()->routeIs('admin.categories*') ? 'bg-primary text-white font-semibold' : 'text-emerald-100/75 hover:bg-white/10 hover:text-white' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span>Categories</span>
                </a>

                <a href="{{ route('admin.testimonials.index') }}" 
                   class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-colors {{ request()->routeIs('admin.testimonials*') ? 'bg-primary text-white font-semibold' : 'text-emerald-100/75 hover:bg-white/10 hover:text-white' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    <span>Testimonials</span>
                </a>

                <a href="{{ route('admin.gallery.index') }}" 
                   class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-colors {{ request()->routeIs('admin.gallery*') ? 'bg-primary text-white font-semibold' : 'text-emerald-100/75 hover:bg-white/10 hover:text-white' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>Gallery</span>
                </a>
            </nav>
        </div>

        <!-- Sidebar Footer -->
        <div class="pt-6 border-t border-emerald-900 space-y-3">
            <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-2 text-xs text-emerald-200 hover:text-white transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                <span>View Live Website</span>
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-2 text-xs text-red-300 hover:text-red-100 transition-colors py-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    <span>Sign Out</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col min-h-screen">
        <!-- Top bar -->
        <header class="h-16 bg-white border-b border-border flex items-center justify-between px-6 sm:px-8">
            <h2 class="text-lg font-bold text-foreground">@yield('page_title', 'Overview')</h2>
            <div class="flex items-center gap-3">
                <span class="text-xs text-muted-foreground">Logged in as:</span>
                <span class="text-xs font-semibold text-primary bg-emerald-50 px-3 py-1 rounded-full border border-emerald-100">
                    {{ Auth::user()->name ?? 'Administrator' }}
                </span>
            </div>
        </header>

        <!-- Flash alerts -->
        <main class="flex-1 p-6 sm:p-8">
            @if(session('success'))
                <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-center justify-between">
                    <span>{{ session('success') }}</span>
                    <button onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-900">&times;</button>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-200 text-red-800 text-sm flex items-center justify-between">
                    <span>{{ session('error') }}</span>
                    <button onclick="this.parentElement.remove()" class="text-red-600 hover:text-red-900">&times;</button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

</body>
</html>
