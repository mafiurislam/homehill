@extends('layouts.app')

@section('title', ($currentCategory ? $currentCategory->title . ' Tour Packages' : 'Tour Packages') . ' — Hills Home Travels')

@section('content')

    <!-- Hero Banner with Breadcrumbs -->
    <section class="relative pt-32 pb-20 overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ $currentCategory ? $currentCategory->image_url : asset('images/darjeeling.jpg') }}" alt="Tour Packages" class="h-full w-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/55 to-black/80"></div>
        </div>

        <div class="relative z-10 container-px mx-auto max-w-7xl text-center">
            <nav class="flex items-center justify-center gap-2 text-sm text-white/70 mb-4">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                <span>&gt;</span>
                @if($currentCategory)
                    <a href="{{ route('packages.index') }}" class="hover:text-white transition-colors">Tour Packages</a>
                    <span>&gt;</span>
                    <span class="text-white font-medium">{{ $currentCategory->title }}</span>
                @else
                    <span class="text-white font-medium">Tour Packages</span>
                @endif
            </nav>

            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight">
                {{ $currentCategory ? $currentCategory->title : 'Tour Packages' }}
            </h1>

            <p class="mt-4 max-w-2xl mx-auto text-base sm:text-lg text-white/85 leading-relaxed">
                {{ $currentCategory ? ($currentCategory->description ?? $currentCategory->short) : 'Explore our curated collection of unforgettable journeys across India and beyond.' }}
            </p>
        </div>
    </section>

    <!-- Packages Filter and Grid -->
    <section class="section-py container-px mx-auto max-w-7xl">
        
        <!-- Search and Category Filters -->
        <div class="space-y-6 mb-12">
            <!-- Search bar -->
            <div class="max-w-md mx-auto">
                <form method="GET" action="{{ route('packages.index') }}" class="relative flex items-center">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search destination, trip name..." 
                           class="w-full rounded-full border border-border bg-white px-5 py-3 pr-12 text-sm shadow-soft focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                    <button type="submit" class="absolute right-2 h-8 w-8 rounded-full bg-primary text-white flex items-center justify-center hover:bg-primary-light transition-colors" aria-label="Search">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </button>
                </form>
            </div>

            <!-- Category Filter Pills -->
            <div class="flex flex-wrap justify-center gap-2 sm:gap-2.5">
                <a href="{{ route('packages.index') }}" 
                   class="rounded-full px-5 py-2.5 text-xs sm:text-sm font-semibold transition-all {{ $selectedCategory === 'all' ? 'bg-primary text-white shadow-soft' : 'bg-white text-foreground/70 border border-border hover:border-primary' }}">
                    All Packages
                </a>
                @foreach($categories as $cat)
                    <a href="{{ route('packages.category', $cat->slug) }}" 
                       class="rounded-full px-5 py-2.5 text-xs sm:text-sm font-semibold transition-all {{ $selectedCategory === $cat->slug ? 'bg-primary text-white shadow-soft' : 'bg-white text-foreground/70 border border-border hover:border-primary' }}">
                        {{ $cat->title }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Packages Count and Status -->
        <div class="flex items-center justify-between mb-8 pb-3 border-b border-border">
            <span class="text-sm font-medium text-muted-foreground">
                Showing <strong class="text-foreground">{{ $packages->total() }}</strong> curated packages
            </span>
            @if(request('search') || $selectedCategory !== 'all')
                <a href="{{ route('packages.index') }}" class="text-xs font-semibold text-primary hover:underline">
                    Clear Filters
                </a>
            @endif
        </div>

        <!-- Packages Grid -->
        @if($packages->isEmpty())
            <div class="py-16 text-center max-w-md mx-auto">
                <div class="h-16 w-16 rounded-full bg-emerald-50 text-primary mx-auto flex items-center justify-center mb-4">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-foreground">No Packages Found</h3>
                <p class="text-sm text-muted-foreground mt-2">Try adjusting your category filter or search keywords to find what you are looking for.</p>
                <a href="{{ route('packages.index') }}" class="mt-5 inline-block rounded-full bg-primary px-6 py-2.5 text-xs font-semibold text-white shadow-soft">
                    View All Packages
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @foreach($packages as $pkg)
                    <x-package-card :pkg="$pkg" />
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                {{ $packages->links() }}
            </div>
        @endif

    </section>

    <!-- Bottom CTA Banner -->
    <section class="container-px mx-auto max-w-7xl mb-20">
        <div class="rounded-3xl bg-gradient-to-r from-emerald-800 via-primary to-emerald-700 p-8 sm:p-12 text-center text-white shadow-float relative overflow-hidden">
            <h2 class="text-3xl sm:text-4xl font-bold leading-tight">Can't Find Your Ideal Package?</h2>
            <p class="mt-3 text-sm sm:text-base text-emerald-100/90 max-w-xl mx-auto leading-relaxed">
                We specialize in 100% tailor-made itineraries. Share your destination and travel dates with us for a custom quote.
            </p>
            <div class="mt-8 flex flex-wrap justify-center gap-3">
                <button onclick="openBookingModal('', 'Customized Tour')" class="rounded-full bg-white px-6 py-3.5 text-sm font-semibold text-primary shadow-soft hover:bg-emerald-50 transition-all">
                    Request Custom Itinerary
                </button>
                <a href="https://wa.me/919088877795?text=Hello%20Hills%20Home%20Travels!%20I%20would%20like%20a%20custom%20tour%20package." target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 rounded-full bg-[#25D366] px-6 py-3.5 text-sm font-semibold text-white shadow-soft hover:brightness-105 transition-all">
                    <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24"><path d="M12.031 2C6.495 2 2 6.495 2 12.031c0 1.968.568 3.805 1.554 5.358L2 22l4.773-1.523A9.974 9.974 0 0012.031 22C17.568 22 22 17.505 22 12.031 22 6.495 17.568 2 12.031 2zm5.79 14.394c-.24.673-1.397 1.285-1.928 1.365-.497.075-1.144.108-3.411-.83-2.902-1.201-4.757-4.148-4.901-4.341-.143-.193-1.168-1.553-1.168-2.96 0-1.408.736-2.099.997-2.387.261-.287.57-.359.761-.359.19 0 .381.002.548.01.177.009.414-.067.648.495.24.575.814 1.986.885 2.13.072.143.12.311.024.498-.096.186-.144.3-.287.467-.144.167-.302.373-.432.5-.144.144-.294.3-.127.587.167.287.742 1.226 1.593 1.984 1.096.976 2.02 1.278 2.308 1.422.287.144.455.12.623-.072.167-.193.717-.837.909-1.125.19-.287.382-.24.644-.144.263.096 1.666.786 1.953.93.287.144.478.215.548.334.072.12.072.694-.168 1.367z"/></svg>
                    <span>Chat on WhatsApp</span>
                </a>
            </div>
        </div>
    </section>

@endsection
