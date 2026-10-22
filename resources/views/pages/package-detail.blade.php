@extends('layouts.app')

@section('title', $package->name . ' Tour Package — Hills Home Travels')
@section('meta_description', $package->short_description ?? $package->description)

@section('content')

    <!-- Hero Banner with Breadcrumbs -->
    <section class="relative pt-32 pb-20 overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ $package->image_url }}" alt="{{ $package->name }}" class="h-full w-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/60 to-black/85"></div>
        </div>

        <div class="relative z-10 container-px mx-auto max-w-7xl">
            <nav class="flex items-center gap-2 text-sm text-white/70 mb-4">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                <span>&gt;</span>
                <a href="{{ route('packages.index') }}" class="hover:text-white transition-colors">Tour Packages</a>
                @if($package->category)
                    <span>&gt;</span>
                    <a href="{{ route('packages.category', $package->category->slug) }}" class="hover:text-white transition-colors">{{ $package->category->title }}</a>
                @endif
                <span>&gt;</span>
                <span class="text-white font-medium">{{ $package->name }}</span>
            </nav>

            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6">
                <div>
                    <!-- Highlighted 2D / 3N Duration Pill -->
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-50 text-emerald-800 border border-emerald-300/80 px-4 py-1.5 text-xs font-bold shadow-xs mb-3">
                        <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>{{ $package->formatted_duration }}</span>
                    </span>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight">
                        {{ $package->name }}
                    </h1>
                    <p class="mt-2 text-base text-white/80 flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-emerald-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                        <span>{{ $package->destination }}</span>
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <button onclick="openBookingDrawer('{{ addslashes($package->name) }}', '{{ addslashes($package->destination) }}')" class="rounded-full bg-primary px-8 py-3.5 text-sm font-semibold text-white shadow-soft hover:bg-primary-light transition-all flex items-center gap-2">
                        <span>Book This Tour</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>
                    <a href="https://wa.me/919088877795?text=Hello%20Hills%20Home%20Travels!%20I%20am%20inquiring%20about:%20{{ urlencode($package->name) }}%20({{ urlencode($package->destination) }})." target="_blank" rel="noopener noreferrer" class="rounded-full bg-[#25D366] px-5 py-3.5 text-sm font-semibold text-white shadow-soft hover:brightness-105 transition-all flex items-center gap-2">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.031 2C6.495 2 2 6.495 2 12.031c0 1.968.568 3.805 1.554 5.358L2 22l4.773-1.523A9.974 9.974 0 0012.031 22C17.568 22 22 17.505 22 12.031 22 6.495 17.568 2 12.031 2zm5.79 14.394c-.24.673-1.397 1.285-1.928 1.365-.497.075-1.144.108-3.411-.83-2.902-1.201-4.757-4.148-4.901-4.341-.143-.193-1.168-1.553-1.168-2.96 0-1.408.736-2.099.997-2.387.261-.287.57-.359.761-.359.19 0 .381.002.548.01.177.009.414-.067.648.495.24.575.814 1.986.885 2.13.072.143.12.311.024.498-.096.186-.144.3-.287.467-.144.167-.302.373-.432.5-.144.144-.294.3-.127.587.167.287.742 1.226 1.593 1.984 1.096.976 2.02 1.278 2.308 1.422.287.144.455.12.623-.072.167-.193.717-.837.909-1.125.19-.287.382-.24.644-.144.263.096 1.666.786 1.953.93.287.144.478.215.548.334.072.12.072.694-.168 1.367z"/></svg>
                        <span>WhatsApp</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Detail Content -->
    <section class="section-py container-px mx-auto max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            
            <!-- Left 2 Cols: Description, Highlights, Inclusions -->
            <div class="lg:col-span-2 space-y-10">
                
                <!-- Overview -->
                <div class="rounded-3xl bg-white p-8 shadow-soft border border-border">
                    <h2 class="text-2xl font-bold text-foreground mb-4">Package Overview</h2>
                    <p class="text-base text-foreground/80 leading-relaxed whitespace-pre-line">
                        {{ $package->description ?? $package->short_description }}
                    </p>
                </div>

                <!-- Highlights -->
                @if(!empty($package->highlights) && count($package->highlights) > 0)
                    <div class="rounded-3xl bg-white p-8 shadow-soft border border-border">
                        <h2 class="text-2xl font-bold text-foreground mb-5">Key Highlights</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                            @foreach($package->highlights as $h)
                                <div class="flex items-center gap-3">
                                    <div class="h-7 w-7 rounded-full bg-emerald-100 text-primary flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    </div>
                                    <span class="text-sm font-medium text-foreground">{{ $h }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Inclusions & Exclusions -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="rounded-3xl bg-white p-7 shadow-soft border border-emerald-100">
                        <h3 class="text-lg font-bold text-primary mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>What's Included</span>
                        </h3>
                        <ul class="space-y-2.5 text-xs sm:text-sm text-foreground/80">
                            @foreach($package->inclusions ?? [] as $inc)
                                <li class="flex items-start gap-2">
                                    <span class="h-1.5 w-1.5 rounded-full bg-primary mt-2 flex-shrink-0"></span>
                                    <span>{{ $inc }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="rounded-3xl bg-white p-7 shadow-soft border border-red-100">
                        <h3 class="text-lg font-bold text-rose-800 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            <span>What's Excluded</span>
                        </h3>
                        <ul class="space-y-2.5 text-xs sm:text-sm text-foreground/80">
                            @foreach($package->exclusions ?? [] as $exc)
                                <li class="flex items-start gap-2">
                                    <span class="h-1.5 w-1.5 rounded-full bg-rose-500 mt-2 flex-shrink-0"></span>
                                    <span>{{ $exc }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>

            <!-- Right Col: Booking Card & WhatsApp CTA (No Price Info) -->
            <div class="space-y-6">
                <div class="sticky top-28 rounded-3xl bg-white p-8 shadow-soft border border-border space-y-6">
                    <div class="space-y-3 pb-4 border-b border-border">
                        <span class="text-xs text-muted-foreground uppercase font-semibold">Curated Itinerary</span>
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-sm font-bold bg-emerald-50 text-emerald-800 border border-emerald-300 shadow-xs">
                                <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span>{{ $package->formatted_duration }}</span>
                            </span>
                        </div>
                        <p class="text-xs text-muted-foreground">Customizable transport, private stays, and 24/7 on-trip ground assistance.</p>
                    </div>

                    <button onclick="openBookingDrawer('{{ addslashes($package->name) }}', '{{ addslashes($package->destination) }}')" class="w-full rounded-xl bg-primary py-3.5 text-sm font-semibold text-white shadow-soft hover:bg-primary-light transition-all flex items-center justify-center gap-2">
                        <span>Book This Trip</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>

                    <a href="https://wa.me/919088877795?text=Hello%20Hills%20Home!%20I%20am%20interested%20in%20{{ urlencode($package->name) }}%20({{ urlencode($package->destination) }})" target="_blank" rel="noopener noreferrer" class="w-full inline-flex items-center justify-center gap-2 rounded-xl bg-[#25D366] py-3.5 text-sm font-semibold text-white hover:brightness-105 transition-all">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.031 2C6.495 2 2 6.495 2 12.031c0 1.968.568 3.805 1.554 5.358L2 22l4.773-1.523A9.974 9.974 0 0012.031 22C17.568 22 22 17.505 22 12.031 22 6.495 17.568 2 12.031 2zm5.79 14.394c-.24.673-1.397 1.285-1.928 1.365-.497.075-1.144.108-3.411-.83-2.902-1.201-4.757-4.148-4.901-4.341-.143-.193-1.168-1.553-1.168-2.96 0-1.408.736-2.099.997-2.387.261-.287.57-.359.761-.359.19 0 .381.002.548.01.177.009.414-.067.648.495.24.575.814 1.986.885 2.13.072.143.12.311.024.498-.096.186-.144.3-.287.467-.144.167-.302.373-.432.5-.144.144-.294.3-.127.587.167.287.742 1.226 1.593 1.984 1.096.976 2.02 1.278 2.308 1.422.287.144.455.12.623-.072.167-.193.717-.837.909-1.125.19-.287.382-.24.644-.144.263.096 1.666.786 1.953.93.287.144.478.215.548.334.072.12.072.694-.168 1.367z"/></svg>
                        <span>Instant WhatsApp Inquiry</span>
                    </a>

                    <div class="pt-2 border-t border-border space-y-2 text-xs text-muted-foreground">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>100% Customizable Itinerary</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>Sanitized Private Cabs & Verified Stays</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>No Hidden Fees or Surcharges</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Related Packages (No Prices, Highlighted 2D/3N Duration) -->
        @if($relatedPackages->isNotEmpty())
            <div class="mt-20 pt-12 border-t border-border">
                <div class="mb-8">
                    <span class="text-xs font-semibold uppercase tracking-[0.2em] text-primary">More In This Category</span>
                    <h2 class="text-2xl sm:text-3xl font-bold text-foreground mt-1">Similar Tour Packages</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($relatedPackages as $rPkg)
                        <div class="group rounded-3xl overflow-hidden bg-white shadow-soft hover:shadow-float transition-all duration-300 border border-border flex flex-col justify-between">
                            <div class="relative h-56 w-full overflow-hidden">
                                <img src="{{ $rPkg->image_url }}" alt="{{ $rPkg->name }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-transparent to-transparent flex items-end justify-between p-4 text-white text-xs">
                                    <span class="flex items-center gap-1 font-medium">
                                        <svg class="w-3.5 h-3.5 text-emerald-300 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                                        <span>{{ $rPkg->destination }}</span>
                                    </span>
                                    <span>•••</span>
                                </div>
                            </div>

                            <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                                <div class="space-y-2">
                                    <h3 class="text-lg font-bold text-foreground group-hover:text-primary transition-colors leading-snug">
                                        {{ $rPkg->name }}
                                    </h3>
                                    <p class="text-xs text-muted-foreground line-clamp-2">
                                        {{ $rPkg->short_description ?? $rPkg->description }}
                                    </p>
                                    <div>
                                        <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-800 border border-emerald-300 shadow-xs">
                                            <span>{{ $rPkg->formatted_duration }}</span>
                                        </span>
                                    </div>
                                </div>

                                <div class="pt-3 border-t border-border flex items-center gap-2">
                                    <a href="{{ route('packages.show', $rPkg->slug) }}" class="flex-1 text-center rounded-xl border border-border px-3 py-2 text-xs font-semibold text-foreground hover:border-primary hover:text-primary transition-colors">
                                        Details
                                    </a>
                                    <button onclick="openBookingDrawer('{{ addslashes($rPkg->name) }}', '{{ addslashes($rPkg->destination) }}')" class="flex-1 text-center rounded-xl bg-primary px-3 py-2 text-xs font-semibold text-white shadow-soft hover:bg-primary-light transition-all">
                                        Book Now
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </section>

@endsection
