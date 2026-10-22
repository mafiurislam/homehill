@extends('layouts.app')

@section('title', 'Excursions & Day Tours — Hills Home Travels')

@section('content')

    <!-- Hero Banner with Breadcrumbs -->
    <section class="relative pt-32 pb-20 overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('images/excursion.jpg') }}" alt="Excursions" class="h-full w-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/55 to-black/80"></div>
        </div>

        <div class="relative z-10 container-px mx-auto max-w-7xl text-center">
            <nav class="flex items-center justify-center gap-2 text-sm text-white/70 mb-4">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                <span>&gt;</span>
                <a href="{{ route('services') }}" class="hover:text-white transition-colors">Services</a>
                <span>&gt;</span>
                <span class="text-white font-medium">Excursions</span>
            </nav>

            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight">
                Excursions & Day Tours
            </h1>

            <p class="mt-4 max-w-2xl mx-auto text-base sm:text-lg text-white/85 leading-relaxed">
                Short-distance adventures, sunrise expeditions, wildlife safaris, and heritage walks designed for quick, refreshing getaways.
            </p>
        </div>
    </section>

    <!-- Content & Excursions Grid -->
    <section class="section-py container-px mx-auto max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 items-center mb-16">
            <div class="lg:col-span-2 space-y-5">
                <span class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold uppercase tracking-[0.2em] text-primary">
                    <span class="h-px w-8 bg-primary/40"></span>
                    Short Escapes
                </span>
                <h2 class="text-3xl sm:text-4xl font-bold text-foreground">
                    Discover More in Less Time With Handcrafted Day Tours
                </h2>
                <p class="text-sm sm:text-base text-muted-foreground leading-relaxed">
                    Short on time? Our excursions allow you to witness Tiger Hill sunrises, take heritage toy train rides through tea estates, go on Dooars elephant safaris, or hike living root bridges in a single well-spent day.
                </p>
            </div>

            <div class="rounded-3xl bg-white p-7 shadow-soft border border-emerald-100 space-y-4">
                <h3 class="text-xl font-bold text-foreground">Book Private Day Cab</h3>
                <p class="text-xs text-muted-foreground">Hire a private verified cab for local sightseeing with experienced mountain drivers.</p>
                <button onclick="openBookingModal('Private Day Excursion', 'Sightseeing')" class="w-full rounded-xl bg-primary px-5 py-3 text-sm font-semibold text-white shadow-soft hover:bg-primary-light transition-all">
                    Book Day Cab
                </button>
            </div>
        </div>

        <h3 class="text-2xl font-bold text-foreground mb-8">Popular Excursion Packages</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($packages as $pkg)
                <div class="group rounded-3xl overflow-hidden bg-white shadow-soft hover:shadow-float transition-all duration-300 border border-border flex flex-col justify-between">
                    <div class="relative h-60 w-full overflow-hidden">
                        <img src="{{ $pkg->image_url }}" alt="{{ $pkg->name }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                        <span class="absolute top-4 left-4 rounded-full glass px-3.5 py-1 text-xs font-semibold text-foreground">
                            {{ $pkg->duration ?? '1 Day' }}
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
                                <span class="text-[11px] text-muted-foreground uppercase font-semibold">Starting from</span>
                                <div class="text-lg font-bold text-primary">₹{{ number_format($pkg->price, 0) }}</div>
                            </div>
                            <button onclick="openBookingModal('{{ $pkg->name }}', '{{ $pkg->destination }}')" class="rounded-full bg-primary px-4 py-2 text-xs font-semibold text-white shadow-soft">
                                Book Now
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection
