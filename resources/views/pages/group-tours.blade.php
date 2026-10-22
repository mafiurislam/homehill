@extends('layouts.app')

@section('title', 'Group Tours — Hills Home Travels')

@section('content')

    <!-- Hero Banner with Breadcrumbs -->
    <section class="relative pt-32 pb-20 overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('images/groupTour.jpg') }}" alt="Group Tours" class="h-full w-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/55 to-black/80"></div>
        </div>

        <div class="relative z-10 container-px mx-auto max-w-7xl text-center">
            <nav class="flex items-center justify-center gap-2 text-sm text-white/70 mb-4">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                <span>&gt;</span>
                <a href="{{ route('services') }}" class="hover:text-white transition-colors">Services</a>
                <span>&gt;</span>
                <span class="text-white font-medium">Group Tours</span>
            </nav>

            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight">
                Group Tours
            </h1>

            <p class="mt-4 max-w-2xl mx-auto text-base sm:text-lg text-white/85 leading-relaxed">
                Travel together, make lifelong friends, and explore India's best destinations with organized itineraries and comfortable arrangements.
            </p>
        </div>
    </section>

    <!-- Content & Packages -->
    <section class="section-py container-px mx-auto max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 items-center mb-16">
            <div class="lg:col-span-2 space-y-5">
                <span class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold uppercase tracking-[0.2em] text-primary">
                    <span class="h-px w-8 bg-primary/40"></span>
                    Shared Memories
                </span>
                <h2 class="text-3xl sm:text-4xl font-bold text-foreground">
                    Hassle-Free Group Travel for Families, Friends & Communities
                </h2>
                <p class="text-sm sm:text-base text-muted-foreground leading-relaxed">
                    Our group tours are planned with precision to eliminate logistics headaches. With experienced tour leaders, fixed departure dates, reserved premium coaches, and curated group activities, you can soak in the Himalayan views or coastal breezes with peace of mind.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                    <div class="flex items-center gap-3">
                        <div class="h-8 w-8 rounded-full bg-emerald-100 text-primary flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="text-sm font-medium text-foreground">Dedicated Trip Captain</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="h-8 w-8 rounded-full bg-emerald-100 text-primary flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="text-sm font-medium text-foreground">Pre-booked Quality Hotels</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="h-8 w-8 rounded-full bg-emerald-100 text-primary flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="text-sm font-medium text-foreground">Spacious Sanitized Transport</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="h-8 w-8 rounded-full bg-emerald-100 text-primary flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="text-sm font-medium text-foreground">Fair Group Discount Rates</span>
                    </div>
                </div>
            </div>

            <div class="rounded-3xl bg-white p-7 shadow-soft border border-emerald-100 space-y-4">
                <h3 class="text-xl font-bold text-foreground">Plan a Custom Group Trip</h3>
                <p class="text-xs text-muted-foreground">Travelling with 6 or more members? Get exclusive custom group discounts.</p>
                <button onclick="openBookingModal('Custom Group Tour', 'Group Travel')" class="w-full rounded-xl bg-primary px-5 py-3 text-sm font-semibold text-white shadow-soft hover:bg-primary-light transition-all">
                    Inquire Group Discount
                </button>
                <a href="https://wa.me/919088877795?text=Hello%20Hills%20Home!%20I%20want%20to%20plan%20a%20group%20tour." target="_blank" rel="noopener noreferrer" class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-[#25D366] px-5 py-3 text-sm font-semibold text-white hover:brightness-105 transition-all">
                    <span>Chat on WhatsApp</span>
                </a>
            </div>
        </div>

        <h3 class="text-2xl font-bold text-foreground mb-8">Popular Group Packages</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            @foreach($packages as $pkg)
                <x-package-card :pkg="$pkg" />
            @endforeach
        </div>
    </section>

@endsection
