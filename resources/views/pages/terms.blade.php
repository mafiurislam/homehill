@extends('layouts.app')

@section('title', 'Terms & Conditions — Hills Home Travels')

@section('content')

    <section class="relative pt-32 pb-16 overflow-hidden bg-primary/10">
        <div class="container-px mx-auto max-w-4xl text-center">
            <h1 class="text-4xl font-bold text-foreground">Terms & Conditions</h1>
            <p class="mt-2 text-sm text-muted-foreground">Last updated: {{ date('F Y') }}</p>
        </div>
    </section>

    <section class="section-py container-px mx-auto max-w-4xl">
        <div class="rounded-3xl bg-white p-8 sm:p-12 shadow-soft border border-border space-y-6 text-sm text-foreground/80 leading-relaxed">
            <h2 class="text-xl font-bold text-foreground">1. Introduction</h2>
            <p>Welcome to Hills Home Tours & Travels. By accessing our website or booking tours through us, you agree to comply with and be bound by the following terms and conditions.</p>

            <h2 class="text-xl font-bold text-foreground">2. Booking & Confirmation</h2>
            <p>All tour bookings are subject to availability and will be confirmed upon receipt of the agreed initial deposit. Itineraries, vehicles, and hotel categories are specified in your tailored booking voucher.</p>

            <h2 class="text-xl font-bold text-foreground">3. Payments & Cancellations</h2>
            <p>Remaining payments must be completed according to the agreed payment schedule prior to departure or upon arrival as stated. Cancellations made well in advance may be eligible for refunds minus non-refundable hotel and vehicle reservation charges.</p>

            <h2 class="text-xl font-bold text-foreground">4. Force Majeure & Weather Conditions</h2>
            <p>Himalayan and coastal routes are subject to weather, landslides, roadblocks, and governmental regulations. In unexpected situations beyond our reasonable control, Hills Home reserves the right to alter the itinerary in the best interest of guest safety.</p>

            <h2 class="text-xl font-bold text-foreground">5. Contact Us</h2>
            <p>If you have any questions regarding these terms, please contact us at <a href="mailto:hillshome2000@gmail.com" class="text-primary font-semibold">hillshome2000@gmail.com</a> or Call/WhatsApp +91 9088877795.</p>
        </div>
    </section>

@endsection
