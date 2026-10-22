@extends('layouts.app')

@section('title', 'Contact Us — Hills Home Travels')

@section('content')

    <!-- Hero Banner with Breadcrumbs -->
    <section class="relative pt-32 pb-20 overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('images/kashmir.jpg') }}" alt="Contact Us" class="h-full w-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/55 to-black/80"></div>
        </div>

        <div class="relative z-10 container-px mx-auto max-w-7xl text-center">
            <nav class="flex items-center justify-center gap-2 text-sm text-white/70 mb-4">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                <span>&gt;</span>
                <span class="text-white font-medium">Contact Us</span>
            </nav>

            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight">
                Contact Us
            </h1>

            <p class="mt-4 max-w-2xl mx-auto text-base sm:text-lg text-white/85 leading-relaxed">
                Have a question or ready to plan your trip? We'd love to hear from you.
            </p>
        </div>
    </section>

    <!-- 3 Contact Info Cards -->
    <section class="container-px mx-auto max-w-7xl -mt-10 relative z-20 mb-14">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- WhatsApp Card -->
            <a href="https://wa.me/919088877795?text=Hello%20Hills%20Home%20Travels!" target="_blank" rel="noopener noreferrer" 
               class="rounded-3xl bg-white p-6 sm:p-7 shadow-soft hover:shadow-float border border-border flex items-center gap-5 group transition-all duration-300">
                <div class="h-14 w-14 rounded-2xl bg-[#25D366] text-white flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                    <svg class="h-7 w-7 fill-current" viewBox="0 0 24 24"><path d="M12.031 2C6.495 2 2 6.495 2 12.031c0 1.968.568 3.805 1.554 5.358L2 22l4.773-1.523A9.974 9.974 0 0012.031 22C17.568 22 22 17.505 22 12.031 22 6.495 17.568 2 12.031 2zm5.79 14.394c-.24.673-1.397 1.285-1.928 1.365-.497.075-1.144.108-3.411-.83-2.902-1.201-4.757-4.148-4.901-4.341-.143-.193-1.168-1.553-1.168-2.96 0-1.408.736-2.099.997-2.387.261-.287.57-.359.761-.359.19 0 .381.002.548.01.177.009.414-.067.648.495.24.575.814 1.986.885 2.13.072.143.12.311.024.498-.096.186-.144.3-.287.467-.144.167-.302.373-.432.5-.144.144-.294.3-.127.587.167.287.742 1.226 1.593 1.984 1.096.976 2.02 1.278 2.308 1.422.287.144.455.12.623-.072.167-.193.717-.837.909-1.125.19-.287.382-.24.644-.144.263.096 1.666.786 1.953.93.287.144.478.215.548.334.072.12.072.694-.168 1.367z"/></svg>
                </div>
                <div>
                    <span class="text-xs font-semibold text-muted-foreground uppercase tracking-wider block">WhatsApp</span>
                    <div class="text-lg font-bold text-foreground group-hover:text-primary transition-colors">9088877795</div>
                </div>
            </a>

            <!-- Call Us Card -->
            <a href="tel:9088877795" 
               class="rounded-3xl bg-white p-6 sm:p-7 shadow-soft hover:shadow-float border border-border flex items-center gap-5 group transition-all duration-300">
                <div class="h-14 w-14 rounded-2xl bg-primary text-white flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                </div>
                <div>
                    <span class="text-xs font-semibold text-muted-foreground uppercase tracking-wider block">Call Us</span>
                    <div class="text-lg font-bold text-foreground group-hover:text-primary transition-colors">9088877795</div>
                </div>
            </a>

            <!-- Email Card -->
            <a href="mailto:hillshome2000@gmail.com" 
               class="rounded-3xl bg-white p-6 sm:p-7 shadow-soft hover:shadow-float border border-border flex items-center gap-5 group transition-all duration-300">
                <div class="h-14 w-14 rounded-2xl bg-emerald-700 text-white flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <span class="text-xs font-semibold text-muted-foreground uppercase tracking-wider block">Email</span>
                    <div class="text-base sm:text-lg font-bold text-foreground group-hover:text-primary transition-colors break-all">hillshome2000@gmail.com</div>
                </div>
            </a>

        </div>
    </section>

    <!-- Side-by-Side Forms Section -->
    <section class="container-px mx-auto max-w-7xl mb-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 sm:gap-10">
            
            <!-- Left Form: Send Us a Message -->
            <div class="rounded-3xl bg-white p-6 sm:p-10 shadow-soft border border-border flex flex-col justify-between">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-bold text-foreground">Send Us a Message</h2>
                    <p class="text-xs sm:text-sm text-muted-foreground mt-1 mb-8">Fill the form below and our team will get back to you shortly.</p>

                    <form method="POST" action="{{ route('inquiries.store') }}" onsubmit="handleBookingSubmit(event)">
                        @csrf
                        <input type="hidden" name="type" value="contact">

                        <div class="space-y-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-foreground mb-1">Name *</label>
                                    <div class="relative">
                                        <input type="text" name="full_name" required placeholder="Your name" class="w-full rounded-xl border border-border bg-white pl-10 pr-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                                        <svg class="w-4 h-4 text-muted-foreground absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-foreground mb-1">Phone Number *</label>
                                    <div class="relative">
                                        <input type="tel" name="contact_number" required placeholder="Mobile number" class="w-full rounded-xl border border-border bg-white pl-10 pr-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                                        <svg class="w-4 h-4 text-muted-foreground absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-foreground mb-1">Email</label>
                                    <div class="relative">
                                        <input type="email" name="email" placeholder="Your email" class="w-full rounded-xl border border-border bg-white pl-10 pr-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                                        <svg class="w-4 h-4 text-muted-foreground absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-foreground mb-1">Destination</label>
                                    <div class="relative">
                                        <input type="text" name="destination" placeholder="Where to go" class="w-full rounded-xl border border-border bg-white pl-10 pr-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                                        <svg class="w-4 h-4 text-muted-foreground absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-foreground mb-1">Message</label>
                                <textarea name="message" rows="4" placeholder="Tell us about your travel plans...." class="w-full rounded-xl border border-border bg-white px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary"></textarea>
                            </div>

                            <div class="pt-2">
                                <button type="submit" class="w-full rounded-xl bg-primary px-6 py-3.5 text-sm font-semibold text-white shadow-soft hover:bg-primary-light transition-all flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                                    <span>Submit</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Right Form: Quick Tour Inquiry -->
            <div class="rounded-3xl bg-white p-6 sm:p-10 shadow-soft border border-border flex flex-col justify-between">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-bold text-foreground">Quick Tour Inquiry</h2>
                    <p class="text-xs sm:text-sm text-muted-foreground mt-1 mb-8">Planning a trip? Send us your travel details directly.</p>

                    <form method="POST" action="{{ route('inquiries.store') }}" onsubmit="handleBookingSubmit(event)">
                        @csrf
                        <input type="hidden" name="type" value="quick_inquiry">

                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs font-semibold text-foreground mb-1">Full Name *</label>
                                <div class="relative">
                                    <input type="text" name="full_name" required placeholder="Your full name" class="w-full rounded-xl border border-border bg-white pl-10 pr-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                                    <svg class="w-4 h-4 text-muted-foreground absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-foreground mb-1">Contact Number *</label>
                                <div class="relative">
                                    <input type="tel" name="contact_number" required placeholder="10-digit mobile" class="w-full rounded-xl border border-border bg-white pl-10 pr-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                                    <svg class="w-4 h-4 text-muted-foreground absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-foreground mb-1">From / Departure</label>
                                <div class="relative">
                                    <input type="text" name="from_location" placeholder="Departure location" class="w-full rounded-xl border border-border bg-white pl-10 pr-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                                    <svg class="w-4 h-4 text-muted-foreground absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-foreground mb-1">Destination / Where to Go</label>
                                <div class="relative">
                                    <input type="text" name="destination" placeholder="Where to go" class="w-full rounded-xl border border-border bg-white pl-10 pr-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                                    <svg class="w-4 h-4 text-muted-foreground absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-foreground mb-1">Number of Members</label>
                                <div class="relative">
                                    <input type="number" name="members" value="1" min="1" class="w-full rounded-xl border border-border bg-white pl-10 pr-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                                    <svg class="w-4 h-4 text-muted-foreground absolute left-3.5 top-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                </div>
                            </div>

                            <div class="pt-2">
                                <button type="submit" class="w-full rounded-xl bg-primary px-6 py-3.5 text-sm font-semibold text-white shadow-soft hover:bg-primary-light transition-all flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                                    <span>Submit Query</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>

    <!-- Google Map Section: Find Us on the Map -->
    <section class="container-px mx-auto max-w-7xl mb-20">
        <div class="rounded-3xl bg-white p-6 sm:p-8 shadow-soft border border-border">
            <div class="flex items-center gap-2 text-primary font-bold text-lg mb-4">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                <span>Find Us on the Map</span>
            </div>

            <div class="w-full h-96 rounded-2xl overflow-hidden border border-border relative">
                <iframe 
                    class="w-full h-full border-0"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113697.58788484196!2d88.2045885078125!3d27.041021799999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e42e654cf501bb%3A0x4175d691e8081691!2sDarjeeling%2C%20West%20Bengal!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

@endsection
