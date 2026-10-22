@extends('layouts.app')

@section('title', 'Corporate Tours & Offsites — Hills Home Travels')

@section('content')

    <!-- Hero Banner with Breadcrumbs -->
    <section class="relative pt-32 pb-20 overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('images/corporateTour.jpg') }}" alt="Corporate Tours" class="h-full w-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/55 to-black/80"></div>
        </div>

        <div class="relative z-10 container-px mx-auto max-w-7xl text-center">
            <nav class="flex items-center justify-center gap-2 text-sm text-white/70 mb-4">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                <span>&gt;</span>
                <a href="{{ route('services') }}" class="hover:text-white transition-colors">Services</a>
                <span>&gt;</span>
                <span class="text-white font-medium">Corporate Tours</span>
            </nav>

            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight">
                Corporate Tours & Offsites
            </h1>

            <p class="mt-4 max-w-2xl mx-auto text-base sm:text-lg text-white/85 leading-relaxed">
                Professional corporate travel solutions for companies, employee retreats, conferences, and team-building expeditions.
            </p>
        </div>
    </section>

    <!-- Content & Features -->
    <section class="section-py container-px mx-auto max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 items-center mb-16">
            <div class="lg:col-span-2 space-y-5">
                <span class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold uppercase tracking-[0.2em] text-primary">
                    <span class="h-px w-8 bg-primary/40"></span>
                    MICE & Retreats
                </span>
                <h2 class="text-3xl sm:text-4xl font-bold text-foreground">
                    Seamless Offsites Engineered for Productivity & Team Bonding
                </h2>
                <p class="text-sm sm:text-base text-muted-foreground leading-relaxed">
                    We manage complete MICE logistics — hotel ballrooms with AV setups, private airport transfers, curated team dinners, and adventure break-out activities in scenic mountain or coastal destinations.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                    <div class="flex items-center gap-3">
                        <div class="h-8 w-8 rounded-full bg-emerald-100 text-primary flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="text-sm font-medium text-foreground">Conference & AV Setup</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="h-8 w-8 rounded-full bg-emerald-100 text-primary flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="text-sm font-medium text-foreground">GST Invoicing & Compliance</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="h-8 w-8 rounded-full bg-emerald-100 text-primary flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="text-sm font-medium text-foreground">Dedicated On-Site Coordinator</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="h-8 w-8 rounded-full bg-emerald-100 text-primary flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <span class="text-sm font-medium text-foreground">Team Building Activities</span>
                    </div>
                </div>
            </div>

            <div class="rounded-3xl bg-white p-7 shadow-soft border border-emerald-100 space-y-4">
                <h3 class="text-xl font-bold text-foreground">Request Corporate Proposal</h3>
                <p class="text-xs text-muted-foreground">Get a tailored proposal with venue options, transport, and itemized budgeting.</p>
                <button onclick="openBookingModal('Corporate Retreat', 'Corporate')" class="w-full rounded-xl bg-primary px-5 py-3 text-sm font-semibold text-white shadow-soft hover:bg-primary-light transition-all">
                    Request Proposal
                </button>
                <a href="https://wa.me/919088877795?text=Hello%20Hills%20Home!%20We%20require%20a%20corporate%20tour%20proposal." target="_blank" rel="noopener noreferrer" class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-[#25D366] px-5 py-3 text-sm font-semibold text-white hover:brightness-105 transition-all">
                    <span>Chat with Corporate Desk</span>
                </a>
            </div>
        </div>

        <h3 class="text-2xl font-bold text-foreground mb-8">Featured Corporate Getaways</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($packages as $pkg)
                <div class="group rounded-3xl overflow-hidden bg-white shadow-soft hover:shadow-float transition-all duration-300 border border-border flex flex-col justify-between">
                    <div class="relative h-60 w-full overflow-hidden">
                        <img src="{{ $pkg->image_url }}" alt="{{ $pkg->name }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                        <span class="absolute top-4 left-4 rounded-full glass px-3.5 py-1 text-xs font-semibold text-foreground">
                            {{ $pkg->duration ?? '3N / 4D' }}
                        </span>
                    </div>

                    <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                        <div>
                            <span class="text-xs text-muted-foreground">{{ $pkg->destination }}</span>
                            <h3 class="text-xl font-bold text-foreground group-hover:text-primary transition-colors leading-snug mt-1">
                                {{ $pkg->name }}
                            </h3>
                            <p class="mt-2 text-xs sm:text-sm text-muted-foreground line-clamp-2">
                                {{ $pkg->short_description ?? $pkg->description }}
                            </p>
                        </div>

                        <div class="pt-4 border-t border-border flex items-center justify-between">
                            <div>
                                <span class="text-[11px] text-muted-foreground uppercase font-semibold">Price per attendee</span>
                                <div class="text-lg font-bold text-primary">₹{{ number_format($pkg->price, 0) }}</div>
                            </div>
                            <button onclick="openBookingModal('{{ $pkg->name }}', '{{ $pkg->destination }}')" class="rounded-full bg-primary px-4 py-2 text-xs font-semibold text-white shadow-soft">
                                Inquire Now
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection
