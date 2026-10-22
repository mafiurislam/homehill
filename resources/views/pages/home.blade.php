@extends('layouts.app')

@section('title', 'Hills Home Travels — Explore the World, Create Unforgettable Memories')

@section('content')

    <!-- 1. Hero Section with Slideshow -->
    <section class="relative min-h-[92vh] flex items-center overflow-hidden">
        <!-- Background Slider Images -->
        <div id="heroSlider" class="absolute inset-0">
            <img src="{{ asset('images/hero.jpg') }}" alt="Hills Home Travels" class="hero-slide absolute inset-0 h-full w-full object-cover transition-opacity duration-1000 opacity-100">
            <img src="{{ asset('images/darjeeling.jpg') }}" alt="Darjeeling Hills" class="hero-slide absolute inset-0 h-full w-full object-cover transition-opacity duration-1000 opacity-0">
            <img src="{{ asset('images/kashmir.jpg') }}" alt="Kashmir Dal Lake" class="hero-slide absolute inset-0 h-full w-full object-cover transition-opacity duration-1000 opacity-0">
            <img src="{{ asset('images/goa.jpg') }}" alt="Goa Beaches" class="hero-slide absolute inset-0 h-full w-full object-cover transition-opacity duration-1000 opacity-0">
            <img src="{{ asset('images/sikkim.jpg') }}" alt="Sikkim Kanchenjunga" class="hero-slide absolute inset-0 h-full w-full object-cover transition-opacity duration-1000 opacity-0">
            
            <!-- Dark Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-black/75"></div>
        </div>

        <!-- Hero Content -->
        <div class="relative z-10 container-px mx-auto max-w-7xl pt-24 pb-32">
            <div class="max-w-3xl">
                <span class="inline-flex items-center gap-2 rounded-full glass px-4 py-1.5 text-xs font-semibold uppercase tracking-wider text-white shadow-soft">
                    <svg class="h-3.5 w-3.5 text-emerald-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <span>Premium Tours & Travels</span>
                </span>

                <h1 class="mt-5 text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-bold leading-[1.05] text-white">
                    Explore the World,<br>
                    <span class="text-emerald-300">Create Unforgettable</span> Memories
                </h1>

                <p class="mt-5 max-w-xl text-base sm:text-lg text-white/90 leading-relaxed">
                    From the misty Himalayas to sun-kissed beaches — Hills Home crafts personalized journeys across India and beyond. Travel with comfort, adventure and trust.
                </p>

                <div class="mt-8 flex flex-wrap items-center gap-3">
                    <a href="{{ route('packages.index') }}" class="group inline-flex items-center gap-2 rounded-full bg-primary px-6 py-3.5 text-sm font-semibold text-white shadow-float hover:bg-primary-light transition-all">
                        <span>Explore Tour Packages</span>
                        <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>

                    <a href="https://wa.me/919088877795?text=Hello%20Hills%20Home%20Travels!%20I%20would%20like%20to%20plan%20a%20tour." target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 rounded-full bg-[#25D366] px-6 py-3.5 text-sm font-semibold text-white shadow-float hover:brightness-105 transition-all">
                        <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24"><path d="M12.031 2C6.495 2 2 6.495 2 12.031c0 1.968.568 3.805 1.554 5.358L2 22l4.773-1.523A9.974 9.974 0 0012.031 22C17.568 22 22 17.505 22 12.031 22 6.495 17.568 2 12.031 2zm5.79 14.394c-.24.673-1.397 1.285-1.928 1.365-.497.075-1.144.108-3.411-.83-2.902-1.201-4.757-4.148-4.901-4.341-.143-.193-1.168-1.553-1.168-2.96 0-1.408.736-2.099.997-2.387.261-.287.57-.359.761-.359.19 0 .381.002.548.01.177.009.414-.067.648.495.24.575.814 1.986.885 2.13.072.143.12.311.024.498-.096.186-.144.3-.287.467-.144.167-.302.373-.432.5-.144.144-.294.3-.127.587.167.287.742 1.226 1.593 1.984 1.096.976 2.02 1.278 2.308 1.422.287.144.455.12.623-.072.167-.193.717-.837.909-1.125.19-.287.382-.24.644-.144.263.096 1.666.786 1.953.93.287.144.478.215.548.334.072.12.072.694-.168 1.367z"/></svg>
                        <span>WhatsApp Us</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Slide Indicators -->
        <div class="absolute bottom-16 left-1/2 -translate-x-1/2 z-20 flex gap-2">
            <button onclick="setHeroSlide(0)" class="hero-dot h-2 w-8 rounded-full bg-white transition-all"></button>
            <button onclick="setHeroSlide(1)" class="hero-dot h-2 w-2 rounded-full bg-white/50 transition-all"></button>
            <button onclick="setHeroSlide(2)" class="hero-dot h-2 w-2 rounded-full bg-white/50 transition-all"></button>
            <button onclick="setHeroSlide(3)" class="hero-dot h-2 w-2 rounded-full bg-white/50 transition-all"></button>
            <button onclick="setHeroSlide(4)" class="hero-dot h-2 w-2 rounded-full bg-white/50 transition-all"></button>
        </div>

        <!-- Gradient fade to content -->
        <div class="absolute bottom-0 left-0 right-0 h-24 bg-gradient-to-t from-background to-transparent z-10 pointer-events-none"></div>
    </section>

    <!-- 2. Quick Stats Section (Medium-Weight Numbers with Looping Counter Animation & Mobile Optimization) -->
    <section class="relative z-20 -mt-8 mb-14 container-px mx-auto max-w-7xl">
        <div class="stat-counter-card rounded-3xl bg-white p-4 sm:p-7 lg:p-8 shadow-soft border border-emerald-100/70">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3.5 sm:gap-6 lg:gap-8">
                
                <!-- Stat 1: 15k+ Happy travellers -->
                <div class="stat-counter-item">
                    <div class="h-11 w-11 sm:h-14 sm:w-14 shrink-0 rounded-xl sm:rounded-2xl bg-emerald-50 text-emerald-800 flex items-center justify-center shadow-xs">
                        <svg class="h-5 w-5 sm:h-7 sm:w-7 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    </div>
                    <div class="min-w-0">
                        <div class="stat-counter-number">
                            <span id="counter-travellers">15</span><span>k+</span>
                        </div>
                        <p class="text-xs sm:text-sm font-normal text-slate-500 mt-0.5 truncate">Happy travellers</p>
                    </div>
                </div>

                <!-- Stat 2: 120+ Curated itineraries -->
                <div class="stat-counter-item">
                    <div class="h-11 w-11 sm:h-14 sm:w-14 shrink-0 rounded-xl sm:rounded-2xl bg-emerald-50 text-emerald-800 flex items-center justify-center shadow-xs">
                        <svg class="h-5 w-5 sm:h-7 sm:w-7 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"/><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                    <div class="min-w-0">
                        <div class="stat-counter-number">
                            <span id="counter-itineraries">120</span><span>+</span>
                        </div>
                        <p class="text-xs sm:text-sm font-normal text-slate-500 mt-0.5 truncate">Curated itineraries</p>
                    </div>
                </div>

                <!-- Stat 3: 14+ yrs Travel experience -->
                <div class="stat-counter-item">
                    <div class="h-11 w-11 sm:h-14 sm:w-14 shrink-0 rounded-xl sm:rounded-2xl bg-emerald-50 text-emerald-800 flex items-center justify-center shadow-xs">
                        <svg class="h-5 w-5 sm:h-7 sm:w-7 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="8" r="6" stroke-width="2"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.21 13.89L7 22l5-3 5 3-1.21-8.11"/></svg>
                    </div>
                    <div class="min-w-0">
                        <div class="stat-counter-number">
                            <span id="counter-experience">14</span><span>+ yrs</span>
                        </div>
                        <p class="text-xs sm:text-sm font-normal text-slate-500 mt-0.5 truncate">Travel experience</p>
                    </div>
                </div>

                <!-- Stat 4: 4.9 ★ Average rating -->
                <div class="stat-counter-item">
                    <div class="h-11 w-11 sm:h-14 sm:w-14 shrink-0 rounded-xl sm:rounded-2xl bg-emerald-50 text-emerald-800 flex items-center justify-center shadow-xs">
                        <svg class="h-5 w-5 sm:h-7 sm:w-7 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"/></svg>
                    </div>
                    <div class="min-w-0">
                        <div class="stat-counter-number">
                            <span id="counter-rating">4.9</span>
                            <svg class="w-4 h-4 sm:w-5 sm:h-5 text-emerald-700 fill-current inline-block ml-0.5 shrink-0" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        </div>
                        <p class="text-xs sm:text-sm font-normal text-slate-500 mt-0.5 truncate">Average rating</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 3. Package Categories: Choose Your Destination (Exact Reference Screenshot Match) -->
    <section class="py-16 sm:py-20 lg:py-24 bg-white destinations-section" id="destinations">
        <div class="container-px mx-auto max-w-7xl">
            <!-- Section Header -->
            <div class="text-center max-w-2xl mx-auto mb-12 sm:mb-14">
                <span class="inline-flex items-center justify-center gap-2.5 text-xs sm:text-sm font-semibold uppercase tracking-[0.2em] text-primary mb-3">
                    <span class="h-px w-8 sm:w-10 bg-primary/40"></span>
                    PACKAGE CATEGORIES
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-foreground leading-tight">Choose Your Destination</h2>
                <p class="mt-3 text-sm sm:text-base text-muted-foreground max-w-xl mx-auto leading-relaxed">From the misty Himalayas to sun-kissed beaches — pick the destination that calls you.</p>
            </div>

            <!-- Circular Categories Grid (Exact 6 columns on desktop matching reference) -->
            <div class="destinations-grid">
                @foreach($categories as $cat)
                    <a href="{{ route('packages.category', $cat->slug) }}" class="destination-item group">
                        <!-- Round / Circular Container with Mint Ring & Hover Scale -->
                        <div class="destination-circle">
                            <img src="{{ $cat->image_url }}" alt="{{ $cat->title }}" class="destination-img" loading="lazy">
                            
                            <!-- Soft Gradient Hover Overlay -->
                            <div class="destination-overlay"></div>
                            
                            <!-- Centered Hover Action Icon Badge -->
                            <div class="destination-icon-btn">
                                <span class="destination-icon-badge">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </span>
                            </div>
                        </div>
                        
                        <!-- Category Name Below Image -->
                        <h3 class="destination-title">
                            {{ $cat->title }}
                        </h3>

                        <!-- Short Category Description Below Name -->
                        <p class="destination-desc">
                            {{ $cat->short ?? $cat->description }}
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 4. Choose Your Travel Style (Image on Top, All Content Underneath) -->
    <section class="py-16 sm:py-20 lg:py-24 container-px mx-auto max-w-7xl">
        <div class="text-center max-w-2xl mx-auto mb-12 sm:mb-14">
            <span class="inline-flex items-center justify-center gap-2.5 text-xs sm:text-sm font-semibold uppercase tracking-[0.2em] text-primary mb-3">
                <span class="h-px w-8 sm:w-10 bg-primary/40"></span>
                TRAVEL CATEGORIES
            </span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-foreground leading-tight">Choose Your Travel Style</h2>
            <p class="mt-3 text-sm sm:text-base text-muted-foreground max-w-xl mx-auto leading-relaxed">From group adventures to customized journeys — find the perfect way to explore.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($travelStyles as $style)
                <div class="group rounded-3xl overflow-hidden bg-white shadow-soft hover:shadow-float border border-emerald-100/70 hover:border-emerald-300/80 transition-all duration-300 flex flex-col justify-between h-full">
                    <!-- Top Image (No Overlay Text) -->
                    <a href="{{ $style['url'] }}" class="relative h-48 sm:h-52 w-full overflow-hidden bg-slate-100 block">
                        <img src="{{ $style['image'] }}" alt="{{ $style['title'] }}" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-108" loading="lazy">
                        @if(!empty($style['badge']))
                            <div class="absolute top-3.5 left-3.5 z-10">
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-white/95 backdrop-blur-md px-3 py-1 text-[11px] font-semibold text-primary shadow-sm border border-emerald-100">
                                    {{ $style['badge'] }}
                                </span>
                            </div>
                        @endif
                    </a>

                    <!-- Card Body Arranged Underneath Image -->
                    <div class="p-5 sm:p-6 flex-1 flex flex-col justify-between bg-white space-y-4">
                        <div class="space-y-2.5">
                            <h3 class="text-xl font-bold text-foreground group-hover:text-primary transition-colors leading-snug">
                                <a href="{{ $style['url'] }}" class="hover:underline">
                                    {{ $style['title'] }}
                                </a>
                            </h3>
                            
                            <p class="text-xs sm:text-sm text-muted-foreground leading-relaxed line-clamp-2">
                                {{ $style['description'] }}
                            </p>

                            <!-- Features / Highlights List Underneath Description -->
                            @if(!empty($style['highlights']))
                                <ul class="space-y-1.5 pt-1.5 text-xs text-foreground/80">
                                    @foreach($style['highlights'] as $hl)
                                        <li class="flex items-center gap-2">
                                            <svg class="w-3.5 h-3.5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                            <span class="line-clamp-1">{{ $hl }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                        <!-- Card Action Button Underneath All Details -->
                        <div class="pt-4 border-t border-border/60">
                            <a href="{{ $style['url'] }}" class="w-full inline-flex items-center justify-between rounded-xl bg-emerald-50 hover:bg-primary px-4 py-2.5 text-xs sm:text-sm font-semibold text-primary hover:text-white transition-all group/btn shadow-xs">
                                <span>View Details</span>
                                <svg class="h-4 w-4 transition-transform group-hover/btn:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- 5. Plan Your Next Adventure: Featured Tours (Exact Match to Reference Screenshot) -->
    <!-- 5. Plan Your Next Adventure: Featured Tours (6 Cards Total with Continuous Auto-Slider) -->
    <section class="section-py container-px mx-auto max-w-7xl">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 mb-12">
            <div>
                <span class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold uppercase tracking-[0.2em] text-primary mb-2">
                    <span class="h-px w-8 bg-primary/60"></span>
                    FEATURED TOURS
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-foreground">Plan Your Next Adventure</h2>
                <p class="mt-2 text-sm sm:text-base text-muted-foreground">Handpicked popular tour packages loved by our travellers.</p>
            </div>

            <a href="{{ route('packages.index') }}" class="view-all-packages-btn group self-start sm:self-auto">
                <span>View All Packages</span>
                <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            @foreach($featuredPackages->take(6) as $pkg)
                <x-package-card :pkg="$pkg" />
            @endforeach
        </div>
    </section>

    <!-- 6. Your Journey in 4 Simple Steps (Exact Match to Reference Screenshot) -->
    <section class="section-py bg-white/70 border-t border-border/70">
        <div class="container-px mx-auto max-w-7xl">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold uppercase tracking-[0.2em] text-primary mb-2">
                    <span class="h-px w-8 bg-primary/60"></span>
                    HOW IT WORKS
                </span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-foreground">Your Journey in 4 Simple Steps</h2>
                <p class="mt-3 text-sm sm:text-base text-muted-foreground">From dream to destination — we make booking your perfect trip effortless.</p>
            </div>

            <div class="relative grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Connecting Horizontal Line on Desktop -->
                <div class="hidden lg:block absolute top-10 left-[12%] right-[12%] h-0.5 bg-emerald-100 z-0 pointer-events-none"></div>

                <!-- Step 01 -->
                <div class="relative z-10 flex flex-col items-center text-center">
                    <div class="relative mb-5">
                        <div class="h-20 w-20 rounded-full bg-white shadow-soft border-2 border-emerald-100 flex items-center justify-center text-primary">
                            <svg class="h-8 w-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        </div>
                        <span class="absolute -top-1 -right-1 h-6 w-6 rounded-full bg-primary text-[11px] font-bold text-white flex items-center justify-center shadow-sm">
                            01
                        </span>
                    </div>
                    <h3 class="text-lg font-bold text-foreground mb-1.5">Send Your Query</h3>
                    <p class="text-xs sm:text-sm text-muted-foreground leading-relaxed max-w-xs">Share your travel dreams through our quick inquiry form or WhatsApp.</p>
                </div>

                <!-- Step 02 -->
                <div class="relative z-10 flex flex-col items-center text-center">
                    <div class="relative mb-5">
                        <div class="h-20 w-20 rounded-full bg-white shadow-soft border-2 border-emerald-100 flex items-center justify-center text-primary">
                            <svg class="h-8 w-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <span class="absolute -top-1 -right-1 h-6 w-6 rounded-full bg-primary text-[11px] font-bold text-white flex items-center justify-center shadow-sm">
                            02
                        </span>
                    </div>
                    <h3 class="text-lg font-bold text-foreground mb-1.5">Choose Your Destination</h3>
                    <p class="text-xs sm:text-sm text-muted-foreground leading-relaxed max-w-xs">Browse our curated destinations and pick where you want to go.</p>
                </div>

                <!-- Step 03 -->
                <div class="relative z-10 flex flex-col items-center text-center">
                    <div class="relative mb-5">
                        <div class="h-20 w-20 rounded-full bg-white shadow-soft border-2 border-emerald-100 flex items-center justify-center text-primary">
                            <svg class="h-8 w-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
                        </div>
                        <span class="absolute -top-1 -right-1 h-6 w-6 rounded-full bg-primary text-[11px] font-bold text-white flex items-center justify-center shadow-sm">
                            03
                        </span>
                    </div>
                    <h3 class="text-lg font-bold text-foreground mb-1.5">Customize Your Package</h3>
                    <p class="text-xs sm:text-sm text-muted-foreground leading-relaxed max-w-xs">We tailor the itinerary, hotels and transport to fit you perfectly.</p>
                </div>

                <!-- Step 04 -->
                <div class="relative z-10 flex flex-col items-center text-center">
                    <div class="relative mb-5">
                        <div class="h-20 w-20 rounded-full bg-white shadow-soft border-2 border-emerald-100 flex items-center justify-center text-primary">
                            <svg class="h-8 w-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        </div>
                        <span class="absolute -top-1 -right-1 h-6 w-6 rounded-full bg-primary text-[11px] font-bold text-white flex items-center justify-center shadow-sm">
                            04
                        </span>
                    </div>
                    <h3 class="text-lg font-bold text-foreground mb-1.5">Enjoy Your Journey</h3>
                    <p class="text-xs sm:text-sm text-muted-foreground leading-relaxed max-w-xs">Pack your bags and travel worry-free — we handle the rest.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- 7. From Our Gallery – Moments from the Road (Smooth Infinite Auto-Slide with Pause on Hover) -->
    <section class="section-py bg-white overflow-hidden">
        <div class="container-px mx-auto max-w-7xl mb-8">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6">
                <div>
                    <span class="inline-flex items-center gap-2.5 text-xs sm:text-sm font-semibold uppercase tracking-[0.2em] text-primary mb-2">
                        <span class="h-px w-8 bg-primary/60"></span>
                        FROM OUR GALLERY
                    </span>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-foreground">
                        Moments from the <span class="italic text-primary">road</span>
                    </h2>
                </div>
                <a href="{{ route('gallery') }}" class="group inline-flex items-center gap-2 self-start rounded-full border border-foreground/60 px-6 py-2.5 text-sm font-semibold text-foreground hover:bg-foreground hover:text-white transition-all shadow-sm">
                    <span>Open Gallery</span>
                    <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>

        <!-- Continuous Infinite Loop Marquee Slider (Auto-slides right to left, pauses immediately on hover) -->
        <div class="gallery-ticker-container relative overflow-hidden py-4 cursor-pointer" id="galleryMarqueeContainer">
            <div class="gallery-ticker-track flex items-center gap-6" id="galleryMarqueeTrack">
                @php
                    // Duplicate images to achieve a perfectly seamless infinite loop
                    $loopImages = $galleryImages->count() > 0 ? $galleryImages : collect([
                        (object)['image_url' => asset('images/kashmir.jpg'), 'title' => 'Kashmir Dal Lake'],
                        (object)['image_url' => asset('images/himachal.jpg'), 'title' => 'Himachal Valleys'],
                        (object)['image_url' => asset('images/goa.jpg'), 'title' => 'Goa Sunset Beach'],
                        (object)['image_url' => asset('images/darjeeling.jpg'), 'title' => 'Darjeeling Tea Gardens'],
                        (object)['image_url' => asset('images/sikkim.jpg'), 'title' => 'Sikkim Mountains'],
                    ]);
                @endphp

                <!-- First copy -->
                @foreach($loopImages as $img)
                    <div class="relative h-64 sm:h-72 w-72 sm:w-80 shrink-0 rounded-3xl overflow-hidden shadow-soft group transition-transform duration-300 hover:scale-[1.02]">
                        <img src="{{ $img->image_url }}" alt="{{ $img->title }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-5">
                            <span class="text-white text-sm font-semibold">{{ $img->title }}</span>
                        </div>
                    </div>
                @endforeach

                <!-- Duplicate copy for seamless infinite loop -->
                @foreach($loopImages as $img)
                    <div class="relative h-64 sm:h-72 w-72 sm:w-80 shrink-0 rounded-3xl overflow-hidden shadow-soft group transition-transform duration-300 hover:scale-[1.02]">
                        <img src="{{ $img->image_url }}" alt="{{ $img->title }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-5">
                            <span class="text-white text-sm font-semibold">{{ $img->title }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 8. What Our Travellers Say (Testimonials - Exact Match to Reference Screenshot) -->
    <section class="testimonials-section py-20 sm:py-24 relative overflow-hidden">
        <div class="container-px mx-auto max-w-5xl text-center">
            <!-- Section Subtitle & Heading -->
            <span class="inline-flex items-center justify-center gap-2.5 text-xs sm:text-sm font-semibold uppercase tracking-[0.2em] text-emerald-400 mb-3">
                <span class="h-px w-8 sm:w-10 bg-emerald-400/50"></span>
                TESTIMONIALS
            </span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight text-white">What Our Travellers Say</h2>
            <p class="mt-3 text-sm sm:text-base text-emerald-100/70 max-w-xl mx-auto leading-relaxed">Real stories from real journeys crafted by Hills Home.</p>

            <div id="testimonialCarousel" class="mt-12 relative max-w-3xl mx-auto">
                <!-- Testimonial Slides -->
                @foreach($testimonials as $index => $t)
                    <div class="testimonial-slide {{ $index === 0 ? '' : 'hidden' }} testimonial-card-box p-8 sm:p-12 transition-all duration-500">
                        <!-- Mint Green Double Quote Icon -->
                        <div class="flex justify-center mb-4">
                            <svg class="w-10 h-10 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 21c3 0 7-1 7-8V5c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v6c0 7 4 8 7 8zm14 0c3 0 7-1 7-8V5c0-1.1-.9-2-2-2h-4c-1.1 0-2 .9-2 2v6c0 7 4 8 7 8z"/>
                            </svg>
                        </div>

                        <!-- 5 Gold Stars -->
                        <div class="flex justify-center gap-1.5 text-amber-400 mb-6">
                            @for($i = 0; $i < ($t->rating ?? 5); $i++)
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>

                        <!-- Review Text -->
                        <p class="text-base sm:text-lg text-white/95 italic leading-relaxed max-w-2xl mx-auto font-light">
                            "{{ $t->review }}"
                        </p>

                        <!-- Author Avatar & Name -->
                        <div class="mt-8 flex items-center justify-center gap-3.5">
                            <div class="w-12 h-12 rounded-full bg-emerald-500 text-white font-bold text-lg flex items-center justify-center shrink-0 shadow-sm">
                                {{ strtoupper(substr($t->customer_name, 0, 1)) }}
                            </div>
                            <div class="text-left">
                                <h4 class="text-base font-bold text-white leading-tight">{{ $t->customer_name }}</h4>
                                <span class="text-xs text-emerald-300 font-medium">{{ $t->destination }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Testimonial Navigation Controls Below Card -->
                <div class="flex items-center justify-center gap-4 mt-8">
                    <!-- Prev Button -->
                    <button type="button" 
                            onclick="window.stepTestimonial(-1)" 
                            aria-label="Previous testimonial"
                            class="testimonial-nav-btn">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
                    </button>

                    <!-- Indicators -->
                    <div class="flex items-center gap-2">
                        @foreach($testimonials as $index => $t)
                            <button onclick="setTestimonialSlide({{ $index }})" 
                                    aria-label="Slide {{ $index + 1 }}"
                                    class="testimonial-dot testimonial-dot-pill {{ $index === 0 ? 'is-active' : '' }}"></button>
                        @endforeach
                    </div>

                    <!-- Next Button -->
                    <button type="button" 
                            onclick="window.stepTestimonial(1)" 
                            aria-label="Next testimonial"
                            class="testimonial-nav-btn">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- 9. Ready to Start Your Adventure? (CTA Banner - Exact Reference Match) -->
    <section class="container-px mx-auto max-w-7xl my-16 sm:my-20">
        <div class="cta-banner-card p-10 sm:p-16 text-center text-white">
            <div class="relative z-10 max-w-4xl mx-auto">
                <!-- Top 4 Stats Row (5000+ Happy Travellers | 50+ Destinations | 15+ Years Experience | 4.9 Average Rating) -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 sm:gap-8 mb-10 pb-8 text-center">
                    <div>
                        <div class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white">5000+</div>
                        <span class="text-xs sm:text-sm text-emerald-100/80 mt-1 block font-medium">Happy Travellers</span>
                    </div>
                    <div>
                        <div class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white">50+</div>
                        <span class="text-xs sm:text-sm text-emerald-100/80 mt-1 block font-medium">Destinations</span>
                    </div>
                    <div>
                        <div class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white">15+</div>
                        <span class="text-xs sm:text-sm text-emerald-100/80 mt-1 block font-medium">Years Experience</span>
                    </div>
                    <div>
                        <div class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white">4.9</div>
                        <span class="text-xs sm:text-sm text-emerald-100/80 mt-1 block font-medium">Average Rating</span>
                    </div>
                </div>

                <!-- Headline & Subtitle -->
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-tight text-white">Ready to Start Your Adventure?</h2>
                <p class="mt-3 text-sm sm:text-base text-emerald-100/90 leading-relaxed max-w-xl mx-auto">
                    Let Hills Home turn your travel dreams into beautiful memories. Get in touch today.
                </p>

                <!-- Two Center Action Buttons Side-by-Side -->
                <div class="mt-9 sm:mt-10 flex flex-wrap justify-center items-center gap-4">
                    <a href="{{ route('packages.index') }}" class="cta-btn-white">
                        <span>Browse Packages</span>
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    
                    <a href="https://wa.me/919088877795?text=Hello%20Hills%20Home%20Travels!%20I%20am%20ready%20to%20start%20my%20adventure." target="_blank" rel="noopener noreferrer" class="cta-btn-whatsapp">
                        <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24"><path d="M12.031 2C6.495 2 2 6.495 2 12.031c0 1.968.568 3.805 1.554 5.358L2 22l4.773-1.523A9.974 9.974 0 0012.031 22C17.568 22 22 17.505 22 12.031 22 6.495 17.568 2 12.031 2zm5.79 14.394c-.24.673-1.397 1.285-1.928 1.365-.497.075-1.144.108-3.411-.83-2.902-1.201-4.757-4.148-4.901-4.341-.143-.193-1.168-1.553-1.168-2.96 0-1.408.736-2.099.997-2.387.261-.287.57-.359.761-.359.19 0 .381.002.548.01.177.009.414-.067.648.495.24.575.814 1.986.885 2.13.072.143.12.311.024.498-.096.186-.144.3-.287.467-.144.167-.302.373-.432.5-.144.144-.294.3-.127.587.167.287.742 1.226 1.593 1.984 1.096.976 2.02 1.278 2.308 1.422.287.144.455.12.623-.072.167-.193.717-.837.909-1.125.19-.287.382-.24.644-.144.263.096 1.666.786 1.953.93.287.144.478.215.548.334.072.12.072.694-.168 1.367z"/></svg>
                        <span>Chat on WhatsApp</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
    // Hero Slider
    let currentHeroIndex = 0;
    const heroSlides = document.querySelectorAll('.hero-slide');
    const heroDots = document.querySelectorAll('.hero-dot');

    function setHeroSlide(index) {
        if (!heroSlides.length) return;
        currentHeroIndex = index;
        heroSlides.forEach((slide, i) => {
            if (i === index) {
                slide.classList.remove('opacity-0');
                slide.classList.add('opacity-100');
            } else {
                slide.classList.remove('opacity-100');
                slide.classList.add('opacity-0');
            }
        });
        heroDots.forEach((dot, i) => {
            if (i === index) {
                dot.classList.remove('w-2', 'bg-white/50');
                dot.classList.add('w-8', 'bg-white');
            } else {
                dot.classList.remove('w-8', 'bg-white');
                dot.classList.add('w-2', 'bg-white/50');
            }
        });
    }

    if (heroSlides.length > 1) {
        setInterval(() => {
            let nextIndex = (currentHeroIndex + 1) % heroSlides.length;
            setHeroSlide(nextIndex);
        }, 5000);
    }

    // Gallery Ticker Hover & Touch Pause Support for Mobile & Desktop
    const galleryTrack = document.getElementById('galleryMarqueeTrack');
    const galleryContainer = document.getElementById('galleryMarqueeContainer');
    if (galleryContainer && galleryTrack) {
        galleryContainer.addEventListener('mouseenter', () => {
            galleryTrack.classList.add('is-paused');
        });
        galleryContainer.addEventListener('mouseleave', () => {
            galleryTrack.classList.remove('is-paused');
        });
        galleryContainer.addEventListener('touchstart', () => {
            galleryTrack.classList.add('is-paused');
        }, { passive: true });
        galleryContainer.addEventListener('touchend', () => {
            setTimeout(() => {
                galleryTrack.classList.remove('is-paused');
            }, 1200);
        }, { passive: true });
    }

    // Testimonials Carousel
    let currentTestimonialIndex = 0;
    const testSlides = document.querySelectorAll('.testimonial-slide');
    const testDots = document.querySelectorAll('.testimonial-dot');

    function setTestimonialSlide(index) {
        if (!testSlides.length) return;
        currentTestimonialIndex = index;
        testSlides.forEach((s, i) => {
            s.classList.toggle('hidden', i !== index);
        });
        testDots.forEach((d, i) => {
            if (i === index) {
                d.classList.add('is-active');
            } else {
                d.classList.remove('is-active');
            }
        });
    }

    window.stepTestimonial = function(dir) {
        if (!testSlides.length) return;
        let nextIndex = (currentTestimonialIndex + dir + testSlides.length) % testSlides.length;
        setTestimonialSlide(nextIndex);
    };

    if (testSlides.length > 1) {
        setInterval(() => {
            let nextIndex = (currentTestimonialIndex + 1) % testSlides.length;
            setTestimonialSlide(nextIndex);
        }, 6000);
    }

    // Automatic Looping Stats Counter Animation (Desktop & Mobile)
    (function initStatsCounters() {
        const stats = [
            { id: 'counter-travellers', target: 15, decimal: 0 },
            { id: 'counter-itineraries', target: 120, decimal: 0 },
            { id: 'counter-experience', target: 14, decimal: 0 },
            { id: 'counter-rating', target: 4.9, decimal: 1 }
        ];

        const countDuration = 2200; // 2.2 seconds count up
        const holdDuration = 3800;  // 3.8 seconds hold at target value
        const cycleDuration = countDuration + holdDuration; // 6s per loop

        let animFrame = null;
        let cycleStart = null;

        function easeOutCubic(t) {
            return 1 - Math.pow(1 - t, 3);
        }

        function step(timestamp) {
            if (!cycleStart) cycleStart = timestamp;
            const elapsed = (timestamp - cycleStart) % cycleDuration;

            stats.forEach(stat => {
                const el = document.getElementById(stat.id);
                if (!el) return;

                if (elapsed < countDuration) {
                    const progress = elapsed / countDuration;
                    const val = stat.target * easeOutCubic(progress);
                    el.textContent = stat.decimal > 0 ? val.toFixed(stat.decimal) : Math.round(val);
                } else {
                    el.textContent = stat.decimal > 0 ? stat.target.toFixed(stat.decimal) : stat.target;
                }
            });

            animFrame = requestAnimationFrame(step);
        }

        animFrame = requestAnimationFrame(step);

        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                if (animFrame) cancelAnimationFrame(animFrame);
            } else {
                cycleStart = null;
                animFrame = requestAnimationFrame(step);
            }
        });
    })();
</script>
@endpush
