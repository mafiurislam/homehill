@extends('layouts.app')

@section('title', 'Our Services — Hills Home Travels')

@section('content')

    <!-- Hero Banner with Breadcrumbs -->
    <section class="relative pt-32 pb-20 overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('images/darjeeling.jpg') }}" alt="Our Services" class="h-full w-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/55 to-black/80"></div>
        </div>

        <div class="relative z-10 container-px mx-auto max-w-7xl text-center">
            <nav class="flex items-center justify-center gap-2 text-sm text-white/70 mb-4">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                <span>&gt;</span>
                <span class="text-white font-medium">Services</span>
            </nav>

            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight">
                Our Services
            </h1>

            <p class="mt-4 max-w-2xl mx-auto text-base sm:text-lg text-white/85 leading-relaxed">
                Complete travel solutions — from group tours to hotel bookings and everything in between.
            </p>
        </div>
    </section>

    <!-- Premium Travel Services Grid -->
    <section class="section-py container-px mx-auto max-w-7xl">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <span class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold uppercase tracking-[0.2em] text-primary mb-2">
                <span class="h-px w-8 bg-primary/40"></span>
                What We Offer
                <span class="h-px w-8 bg-primary/40"></span>
            </span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-foreground">Premium Travel Services</h2>
            <p class="mt-3 text-sm sm:text-base text-muted-foreground">Whatever your travel dream, we have a service crafted with care and expertise.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($servicesList as $srv)
                <div class="group rounded-3xl bg-white p-8 shadow-soft hover:shadow-float border border-border transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="h-14 w-14 rounded-2xl bg-emerald-50 text-primary flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                            @if($srv['icon'] === 'users')
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            @elseif($srv['icon'] === 'sliders')
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
                            @elseif($srv['icon'] === 'briefcase')
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            @elseif($srv['icon'] === 'compass')
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            @elseif($srv['icon'] === 'hotel')
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            @else
                                <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/></svg>
                            @endif
                        </div>
                        <h3 class="text-xl font-bold text-foreground mb-2">{{ $srv['title'] }}</h3>
                        <p class="text-sm text-muted-foreground leading-relaxed">{{ $srv['desc'] }}</p>
                    </div>

                    <div class="mt-6 pt-4 border-t border-border">
                        <a href="{{ $srv['url'] }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary group-hover:gap-2.5 transition-all">
                            <span>Learn More</span>
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Explore by Destination (11 Destination Cards) -->
    <section class="section-py bg-white/60 border-y border-border/70">
        <div class="container-px mx-auto max-w-7xl">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold uppercase tracking-[0.2em] text-primary mb-2">
                    <span class="h-px w-8 bg-primary/40"></span>
                    Tour Categories
                    <span class="h-px w-8 bg-primary/40"></span>
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-foreground">Explore by Destination</h2>
                <p class="mt-3 text-sm sm:text-base text-muted-foreground">Each destination opens a world of carefully planned packages.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($categories as $cat)
                    <div class="group relative rounded-3xl overflow-hidden shadow-soft hover:shadow-float transition-all duration-300 h-72 flex flex-col justify-end p-6">
                        <img src="{{ $cat->image_url }}" alt="{{ $cat->title }}" class="absolute inset-0 h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/40 to-transparent"></div>
                        
                        <div class="relative z-10 text-white">
                            <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-white/20 backdrop-blur-md mb-2">
                                <svg class="h-4 w-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </span>
                            <h3 class="text-lg font-bold text-white">{{ $cat->title }}</h3>
                            <p class="mt-1 text-xs text-white/75 line-clamp-2">{{ $cat->short ?? $cat->description }}</p>
                            
                            <a href="{{ route('packages.category', $cat->slug) }}" class="mt-3 inline-flex items-center gap-1.5 rounded-full bg-white px-4 py-2 text-xs font-semibold text-primary hover:bg-emerald-50 transition-colors">
                                <span>View Details</span>
                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Your Journey in 4 Simple Steps -->
    <section class="section-py container-px mx-auto max-w-7xl">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <span class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold uppercase tracking-[0.2em] text-primary mb-2">
                <span class="h-px w-8 bg-primary/40"></span>
                How It Works
                <span class="h-px w-8 bg-primary/40"></span>
            </span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-foreground">Your Journey in 4 Simple Steps</h2>
            <p class="mt-3 text-sm sm:text-base text-muted-foreground">From dream to destination — we make booking your perfect trip effortless.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="flex flex-col items-center text-center">
                <div class="h-16 w-16 rounded-full bg-emerald-100 text-primary font-bold text-xl flex items-center justify-center mb-4 shadow-soft">
                    01
                </div>
                <h3 class="text-lg font-bold text-foreground mb-2">Send Your Query</h3>
                <p class="text-xs sm:text-sm text-muted-foreground leading-relaxed">Share your travel dream through our quick inquiry form or WhatsApp.</p>
            </div>

            <div class="flex flex-col items-center text-center">
                <div class="h-16 w-16 rounded-full bg-emerald-100 text-primary font-bold text-xl flex items-center justify-center mb-4 shadow-soft">
                    02
                </div>
                <h3 class="text-lg font-bold text-foreground mb-2">Choose Your Destination</h3>
                <p class="text-xs sm:text-sm text-muted-foreground leading-relaxed">Discover our curated destinations and pick what matches your style.</p>
            </div>

            <div class="flex flex-col items-center text-center">
                <div class="h-16 w-16 rounded-full bg-emerald-100 text-primary font-bold text-xl flex items-center justify-center mb-4 shadow-soft">
                    03
                </div>
                <h3 class="text-lg font-bold text-foreground mb-2">Customise Your Package</h3>
                <p class="text-xs sm:text-sm text-muted-foreground leading-relaxed">Personalize the itinerary, hotels and transport to fit your preferences.</p>
            </div>

            <div class="flex flex-col items-center text-center">
                <div class="h-16 w-16 rounded-full bg-emerald-100 text-primary font-bold text-xl flex items-center justify-center mb-4 shadow-soft">
                    04
                </div>
                <h3 class="text-lg font-bold text-foreground mb-2">Enjoy Your Journey</h3>
                <p class="text-xs sm:text-sm text-muted-foreground leading-relaxed">Pack your bags and have a worry-free, unforgettable vacation.</p>
            </div>
        </div>
    </section>

    <!-- CTA Banner -->
    <section class="container-px mx-auto max-w-7xl mb-20">
        <div class="rounded-3xl bg-gradient-to-r from-emerald-800 via-primary to-emerald-700 p-8 sm:p-12 text-center text-white shadow-float relative overflow-hidden">
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-8 text-center border-b border-white/20 pb-6 max-w-2xl mx-auto">
                <div>
                    <div class="text-2xl sm:text-3xl font-extrabold text-white">5000+</div>
                    <span class="text-xs text-emerald-200">Happy Travellers</span>
                </div>
                <div>
                    <div class="text-2xl sm:text-3xl font-extrabold text-white">50+</div>
                    <span class="text-xs text-emerald-200">Destinations</span>
                </div>
                <div>
                    <div class="text-2xl sm:text-3xl font-extrabold text-white">15+</div>
                    <span class="text-xs text-emerald-200">Years Experience</span>
                </div>
                <div>
                    <div class="text-2xl sm:text-3xl font-extrabold text-white">4.9</div>
                    <span class="text-xs text-emerald-200">Average Rating</span>
                </div>
            </div>

            <h2 class="text-3xl sm:text-4xl font-bold leading-tight">Ready to Start Your Adventure?</h2>
            <p class="mt-3 text-sm sm:text-base text-emerald-100/90 max-w-xl mx-auto leading-relaxed">
                Let Hills Home turn your travel dreams into beautiful memories. Get in touch today.
            </p>

            <div class="mt-8 flex flex-wrap justify-center gap-3">
                <a href="{{ route('packages.index') }}" class="rounded-full bg-white px-6 py-3.5 text-sm font-semibold text-primary shadow-soft hover:bg-emerald-50 transition-all">
                    Browse Packages
                </a>
                <a href="https://wa.me/919088877795?text=Hello%20Hills%20Home%20Travels!%20I%20am%20interested%20in%20your%20services." target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 rounded-full bg-[#25D366] px-6 py-3.5 text-sm font-semibold text-white shadow-soft hover:brightness-105 transition-all">
                    <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24"><path d="M12.031 2C6.495 2 2 6.495 2 12.031c0 1.968.568 3.805 1.554 5.358L2 22l4.773-1.523A9.974 9.974 0 0012.031 22C17.568 22 22 17.505 22 12.031 22 6.495 17.568 2 12.031 2zm5.79 14.394c-.24.673-1.397 1.285-1.928 1.365-.497.075-1.144.108-3.411-.83-2.902-1.201-4.757-4.148-4.901-4.341-.143-.193-1.168-1.553-1.168-2.96 0-1.408.736-2.099.997-2.387.261-.287.57-.359.761-.359.19 0 .381.002.548.01.177.009.414-.067.648.495.24.575.814 1.986.885 2.13.072.143.12.311.024.498-.096.186-.144.3-.287.467-.144.167-.302.373-.432.5-.144.144-.294.3-.127.587.167.287.742 1.226 1.593 1.984 1.096.976 2.02 1.278 2.308 1.422.287.144.455.12.623-.072.167-.193.717-.837.909-1.125.19-.287.382-.24.644-.144.263.096 1.666.786 1.953.93.287.144.478.215.548.334.072.12.072.694-.168 1.367z"/></svg>
                    <span>Chat on WhatsApp</span>
                </a>
            </div>
        </div>
    </section>

@endsection
