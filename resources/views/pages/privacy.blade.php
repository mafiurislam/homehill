@extends('layouts.app')

@section('title', 'Privacy Policy — Hills Home Travels')

@section('content')

    <section class="relative pt-32 pb-16 overflow-hidden bg-primary/10">
        <div class="container-px mx-auto max-w-4xl text-center">
            <h1 class="text-4xl font-bold text-foreground">Privacy Policy</h1>
            <p class="mt-2 text-sm text-muted-foreground">Last updated: {{ date('F Y') }}</p>
        </div>
    </section>

    <section class="section-py container-px mx-auto max-w-4xl">
        <div class="rounded-3xl bg-white p-8 sm:p-12 shadow-soft border border-border space-y-6 text-sm text-foreground/80 leading-relaxed">
            <h2 class="text-xl font-bold text-foreground">1. Privacy Commitment</h2>
            <p>Hills Home Tours & Travels respects your privacy and is committed to protecting your personal information. This Privacy Policy explains how we collect, use, and protect your details when you use our website or services.</p>

            <h2 class="text-xl font-bold text-foreground">2. Information We Collect</h2>
            <p>We only collect personal information necessary to process your travel inquiries and bookings, including your name, contact phone number, email address, travel destinations, dates, and member preferences.</p>

            <h2 class="text-xl font-bold text-foreground">3. How We Use Your Information</h2>
            <p>Your details are strictly used to coordinate your travel itineraries, reserve hotels, arrange transportation, and communicate trip updates. We do not sell, rent, or trade your personal information to third-party advertisers.</p>

            <h2 class="text-xl font-bold text-foreground">4. Security</h2>
            <p>We implement appropriate technical measures to safeguard your personal data from unauthorized access or alteration.</p>

            <h2 class="text-xl font-bold text-foreground">5. Contact</h2>
            <p>For any queries about your data, reach us at <a href="mailto:hillshome2000@gmail.com" class="text-primary font-semibold">hillshome2000@gmail.com</a>.</p>
        </div>
    </section>

@endsection
