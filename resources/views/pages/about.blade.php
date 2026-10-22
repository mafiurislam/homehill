@extends('layouts.app')

@section('title', 'About Hills Home — Your Trusted Travel Partner')
@section('meta_description', 'Learn about Hills Home Travels — crafting unforgettable journeys across India with comfort, adventure, and trust.')

@section('content')

    <!-- Hero Banner with Breadcrumbs -->
    <section class="relative pt-32 pb-20 overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('images/darjeeling.jpg') }}" alt="About Hills Home" class="h-full w-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/60 to-black/85"></div>
        </div>

        <div class="relative z-10 container-px mx-auto max-w-7xl text-center">
            <nav class="flex items-center justify-center gap-2 text-sm text-white/70 mb-4">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                <span>&gt;</span>
                <span class="text-white font-medium">About Us</span>
            </nav>

            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight">
                About Hills Home
            </h1>

            <p class="mt-4 max-w-2xl mx-auto text-base sm:text-lg text-white/85 leading-relaxed">
                Your trusted travel partner for unforgettable journeys across India.
            </p>
        </div>
    </section>

    <!-- Who We Are Story & Stats (Exact Match to Reference Screenshot) -->
    <section class="section-py container-px mx-auto max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
            
            <!-- Left: Team Image & 4-Stat Box Row -->
            <div class="space-y-6">
                <div class="relative rounded-3xl overflow-hidden shadow-float h-[24rem] sm:h-[28rem]">
                    <img src="{{ asset('images/aboutTeam.jpg') }}" alt="Hills Home Team" class="h-full w-full object-cover">
                </div>

                <!-- 4 Stats Below Image -->
                <div class="rounded-2xl bg-white p-5 shadow-soft border border-emerald-100 grid grid-cols-2 sm:grid-cols-4 gap-4 text-center divide-x divide-border/60">
                    <div>
                        <div class="text-2xl font-extrabold text-primary">5000+</div>
                        <span class="text-[11px] text-muted-foreground mt-0.5 block">Happy Travellers</span>
                    </div>
                    <div>
                        <div class="text-2xl font-extrabold text-primary">50+</div>
                        <span class="text-[11px] text-muted-foreground mt-0.5 block">Destinations</span>
                    </div>
                    <div>
                        <div class="text-2xl font-extrabold text-primary">15+</div>
                        <span class="text-[11px] text-muted-foreground mt-0.5 block">Years Experience</span>
                    </div>
                    <div>
                        <div class="text-2xl font-extrabold text-primary">4.9</div>
                        <span class="text-[11px] text-muted-foreground mt-0.5 block">Average Rating</span>
                    </div>
                </div>
            </div>

            <!-- Right: Text Story -->
            <div class="space-y-5">
                <span class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold uppercase tracking-[0.2em] text-primary">
                    <span class="h-px w-8 bg-primary/60"></span>
                    WHO WE ARE
                </span>
                
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-foreground leading-tight">
                    Crafting Journeys, Creating Memories
                </h2>

                <p class="text-sm sm:text-base text-muted-foreground leading-relaxed">
                    Hills Home is a premier tour and travel company born out of a passion for authentic travel experiences. Based in West Bengal, we specialize in curating personalized, immersive, and seamless travel journeys across the most enchanting destinations in India.
                </p>

                <p class="text-sm sm:text-base text-muted-foreground leading-relaxed">
                    From the snow-capped peaks of the Himalayas to the serene backwaters of Kerala, the wild thrills of Dooars to the timeless heritage of Rajasthan, our mission is simple: to make every journey effortless, memorable, and safe. We believe travel isn't just about visiting places—it's about creating stories that stay with you forever.
                </p>
            </div>

        </div>

        <!-- Mission & Vision 2 Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 my-16">
            <div class="rounded-3xl bg-white p-8 sm:p-10 shadow-soft border border-emerald-100 flex flex-col justify-between">
                <div>
                    <div class="h-12 w-12 rounded-2xl bg-primary text-white flex items-center justify-center mb-6 shadow-sm">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2v2m0 16v2m10-10h-2M4 12H2"/></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-foreground mb-3">Our Mission</h3>
                    <p class="text-sm text-muted-foreground leading-relaxed">
                        To deliver exceptional, meaningful, and accessible travel experiences that connect people with new horizons while promoting sustainable tourism and preserving local heritage.
                    </p>
                </div>
            </div>

            <div class="rounded-3xl bg-white p-8 sm:p-10 shadow-soft border border-emerald-100 flex flex-col justify-between">
                <div>
                    <div class="h-12 w-12 rounded-2xl bg-primary text-white flex items-center justify-center mb-6 shadow-sm">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-foreground mb-3">Our Vision</h3>
                    <p class="text-sm text-muted-foreground leading-relaxed">
                        To become the most loved and trusted travel company in India, recognized for our curated itineraries, impeccable service, and commitment to creating journeys that go beyond the ordinary.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values Section (Exact Match to Reference Screenshot) -->
    <section class="section-py bg-white/70 border-t border-border/70">
        <div class="container-px mx-auto max-w-7xl">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold uppercase tracking-[0.2em] text-primary mb-2">
                    <span class="h-px w-8 bg-primary/60"></span>
                    WHY TRUST US
                </span>
                <h2 class="text-3xl sm:text-4xl font-bold text-foreground">Our Core Values</h2>
                <p class="mt-3 text-sm sm:text-base text-muted-foreground">The principles that guide every journey we craft.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Value 1 -->
                <div class="rounded-3xl bg-white p-7 shadow-soft border border-border">
                    <div class="h-12 w-12 rounded-2xl bg-emerald-50 text-primary flex items-center justify-center mb-5">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    </div>
                    <h4 class="text-lg font-bold text-foreground mb-2">Customer-First</h4>
                    <p class="text-xs sm:text-sm text-muted-foreground leading-relaxed">Every itinerary is built around you — your comfort, your safety, your preferences.</p>
                </div>

                <!-- Value 2 -->
                <div class="rounded-3xl bg-white p-7 shadow-soft border border-border">
                    <div class="h-12 w-12 rounded-2xl bg-emerald-50 text-primary flex items-center justify-center mb-5">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <h4 class="text-lg font-bold text-foreground mb-2">Trust & Safety</h4>
                    <p class="text-xs sm:text-sm text-muted-foreground leading-relaxed">Verified accommodations, vetted drivers, and transparent pricing, always.</p>
                </div>

                <!-- Value 3 -->
                <div class="rounded-3xl bg-white p-7 shadow-soft border border-border">
                    <div class="h-12 w-12 rounded-2xl bg-emerald-50 text-primary flex items-center justify-center mb-5">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    <h4 class="text-lg font-bold text-foreground mb-2">Personalized Care</h4>
                    <p class="text-xs sm:text-sm text-muted-foreground leading-relaxed">No one-size-fits-all. Every trip is customized to your travel style and needs.</p>
                </div>

                <!-- Value 4 -->
                <div class="rounded-3xl bg-white p-7 shadow-soft border border-border">
                    <div class="h-12 w-12 rounded-2xl bg-emerald-50 text-primary flex items-center justify-center mb-5">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <h4 class="text-lg font-bold text-foreground mb-2">Local Expertise</h4>
                    <p class="text-xs sm:text-sm text-muted-foreground leading-relaxed">Deep roots in West Bengal and deep knowledge of every destination we serve.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Everything You Need to Travel (6 Services Grid, Exact Match) -->
    <section class="section-py container-px mx-auto max-w-7xl">
        <div class="text-center max-w-2xl mx-auto mb-14">
            <span class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold uppercase tracking-[0.2em] text-primary mb-2">
                <span class="h-px w-8 bg-primary/60"></span>
                OUR SERVICES
            </span>
            <h2 class="text-3xl sm:text-4xl font-bold text-foreground">Everything You Need to Travel</h2>
            <p class="mt-3 text-sm sm:text-base text-muted-foreground">A comprehensive range of travel services under one trusted roof.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Service 1: Group Tour -->
            <a href="{{ route('packages.category', 'group-tour') }}" class="group rounded-3xl bg-white p-7 shadow-soft border border-border hover:border-primary transition-all">
                <div class="h-12 w-12 rounded-2xl bg-emerald-50 text-primary flex items-center justify-center mb-5">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </div>
                <h4 class="text-lg font-bold text-foreground group-hover:text-primary transition-colors mb-2">Group Tour</h4>
                <p class="text-xs sm:text-sm text-muted-foreground leading-relaxed">Join organized group departures with planned itineraries and shared memories.</p>
            </a>

            <!-- Service 2: Customised Tour -->
            <a href="{{ route('packages.category', 'customised-tour') }}" class="group rounded-3xl bg-white p-7 shadow-soft border border-border hover:border-primary transition-all">
                <div class="h-12 w-12 rounded-2xl bg-emerald-50 text-primary flex items-center justify-center mb-5">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
                </div>
                <h4 class="text-lg font-bold text-foreground group-hover:text-primary transition-colors mb-2">Customised Tour</h4>
                <p class="text-xs sm:text-sm text-muted-foreground leading-relaxed">Fully personalized travel packages tailored to your destination, budget, and travel style.</p>
            </a>

            <!-- Service 3: Corporate Tour -->
            <a href="{{ route('packages.category', 'corporate-tour') }}" class="group rounded-3xl bg-white p-7 shadow-soft border border-border hover:border-primary transition-all">
                <div class="h-12 w-12 rounded-2xl bg-emerald-50 text-primary flex items-center justify-center mb-5">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <h4 class="text-lg font-bold text-foreground group-hover:text-primary transition-colors mb-2">Corporate Tour</h4>
                <p class="text-xs sm:text-sm text-muted-foreground leading-relaxed">Professional travel solutions for corporate outings, team retreats, and business delegations.</p>
            </a>

            <!-- Service 4: Excursion -->
            <a href="{{ route('packages.category', 'excursion') }}" class="group rounded-3xl bg-white p-7 shadow-soft border border-border hover:border-primary transition-all">
                <div class="h-12 w-12 rounded-2xl bg-emerald-50 text-primary flex items-center justify-center mb-5">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2v2m0 16v2m10-10h-2M4 12H2"/></svg>
                </div>
                <h4 class="text-lg font-bold text-foreground group-hover:text-primary transition-colors mb-2">Excursion</h4>
                <p class="text-xs sm:text-sm text-muted-foreground leading-relaxed">Short trips, day tours, educational visits, and quick refreshing getaways.</p>
            </a>

            <!-- Service 5: Hotel Booking -->
            <div onclick="openBookingDrawer('', 'Hotel Booking')" class="group rounded-3xl bg-white p-7 shadow-soft border border-border hover:border-primary transition-all cursor-pointer">
                <div class="h-12 w-12 rounded-2xl bg-emerald-50 text-primary flex items-center justify-center mb-5">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                </div>
                <h4 class="text-lg font-bold text-foreground group-hover:text-primary transition-colors mb-2">Hotel Booking</h4>
                <p class="text-xs sm:text-sm text-muted-foreground leading-relaxed">Handpicked hotels, resorts and homestays across all categories, best rates guaranteed.</p>
            </div>

            <!-- Service 6: Car Booking -->
            <div onclick="openBookingDrawer('', 'Car Booking')" class="group rounded-3xl bg-white p-7 shadow-soft border border-border hover:border-primary transition-all cursor-pointer">
                <div class="h-12 w-12 rounded-2xl bg-emerald-50 text-primary flex items-center justify-center mb-5">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/></svg>
                </div>
                <h4 class="text-lg font-bold text-foreground group-hover:text-primary transition-colors mb-2">Car Booking</h4>
                <p class="text-xs sm:text-sm text-muted-foreground leading-relaxed">Sanitized, well-maintained vehicles with experienced hill drivers for seamless road journeys.</p>
            </div>
        </div>
    </section>

    <!-- CTA Banner (Exact Match) -->
    <section class="container-px mx-auto max-w-7xl my-20">
        <div class="rounded-3xl bg-primary p-8 sm:p-14 text-center text-white shadow-float relative overflow-hidden">
            <div class="relative z-10 max-w-3xl mx-auto">
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 mb-10 pb-8 border-b border-white/20 text-center">
                    <div>
                        <div class="text-3xl sm:text-4xl font-extrabold text-white">5000+</div>
                        <span class="text-xs text-emerald-200 mt-1 block">Happy Travellers</span>
                    </div>
                    <div>
                        <div class="text-3xl sm:text-4xl font-extrabold text-white">50+</div>
                        <span class="text-xs text-emerald-200 mt-1 block">Destinations</span>
                    </div>
                    <div>
                        <div class="text-3xl sm:text-4xl font-extrabold text-white">15+</div>
                        <span class="text-xs text-emerald-200 mt-1 block">Years Experience</span>
                    </div>
                    <div>
                        <div class="text-3xl sm:text-4xl font-extrabold text-white">4.9</div>
                        <span class="text-xs text-emerald-200 mt-1 block">Average Rating</span>
                    </div>
                </div>

                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight">Ready to Start Your Adventure?</h2>
                <p class="mt-3 text-sm sm:text-base text-emerald-100/90 leading-relaxed max-w-xl mx-auto">
                    Let us help you turn your travel dreams into reality. Get in touch with our team today.
                </p>

                <div class="mt-8 flex flex-wrap justify-center gap-4">
                    <a href="{{ route('packages.index') }}" class="group inline-flex items-center gap-2 rounded-full bg-white px-7 py-3.5 text-sm font-semibold text-primary shadow-soft hover:bg-emerald-50 transition-all">
                        <span>Browse Packages</span>
                        <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    
                    <a href="https://wa.me/919088877795?text=Hello%20Hills%20Home%20Travels!%20I%20am%20ready%20to%20start%20my%20adventure." target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 rounded-full bg-[#25D366] px-7 py-3.5 text-sm font-semibold text-white shadow-soft hover:brightness-105 transition-all">
                        <svg class="h-4 w-4 fill-current" viewBox="0 0 24 24"><path d="M12.031 2C6.495 2 2 6.495 2 12.031c0 1.968.568 3.805 1.554 5.358L2 22l4.773-1.523A9.974 9.974 0 0012.031 22C17.568 22 22 17.505 22 12.031 22 6.495 17.568 2 12.031 2zm5.79 14.394c-.24.673-1.397 1.285-1.928 1.365-.497.075-1.144.108-3.411-.83-2.902-1.201-4.757-4.148-4.901-4.341-.143-.193-1.168-1.553-1.168-2.96 0-1.408.736-2.099.997-2.387.261-.287.57-.359.761-.359.19 0 .381.002.548.01.177.009.414-.067.648.495.24.575.814 1.986.885 2.13.072.143.12.311.024.498-.096.186-.144.3-.287.467-.144.167-.302.373-.432.5-.144.144-.294.3-.127.587.167.287.742 1.226 1.593 1.984 1.096.976 2.02 1.278 2.308 1.422.287.144.455.12.623-.072.167-.193.717-.837.909-1.125.19-.287.382-.24.644-.144.263.096 1.666.786 1.953.93.287.144.478.215.548.334.072.12.072.694-.168 1.367z"/></svg>
                        <span>Chat on WhatsApp</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
