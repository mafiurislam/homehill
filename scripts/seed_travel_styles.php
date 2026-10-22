<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Category;
use App\Models\TourPackage;

$categoriesToAdd = [
    [
        'slug' => 'group-tour',
        'title' => 'Group Tour',
        'short' => 'Join organized group departures with planned itineraries and shared memories.',
        'description' => 'Travel together, make lifelong friends, and explore top destinations across India with organized group tours led by experienced tour managers.',
        'image' => 'images/groupTour.jpg',
        'icon' => 'Users',
        'order' => 12,
    ],
    [
        'slug' => 'customised-tour',
        'title' => 'Customised Tour',
        'short' => 'Fully personalized travel packages tailored to your destination, budget, and travel style.',
        'description' => 'Your vacation, your way. Custom-craft every element — from private cabs and boutique stays to custom sightseeing pace and personalized meal plans.',
        'image' => 'images/customisedTour.jpg',
        'icon' => 'Compass',
        'order' => 13,
    ],
    [
        'slug' => 'corporate-tour',
        'title' => 'Corporate Tour',
        'short' => 'Professional travel solutions for corporate outings, team retreats, and business delegations.',
        'description' => 'End-to-end event and travel management for team outings, offsites, MICE conferences, leadership retreats, and annual recreation trips.',
        'image' => 'images/corporateTour.jpg',
        'icon' => 'Building',
        'order' => 14,
    ],
    [
        'slug' => 'excursion',
        'title' => 'Excursion',
        'short' => 'Short trips, day tours, educational visits, and quick refreshing getaways.',
        'description' => 'Refreshing short breaks, day treks, heritage walks, student educational tours, and weekend getaways crafted for maximum refreshment in minimum time.',
        'image' => 'images/excursion.jpg',
        'icon' => 'MapPin',
        'order' => 15,
    ],
];

foreach ($categoriesToAdd as $cat) {
    Category::updateOrCreate(['slug' => $cat['slug']], $cat);
}

// For customised-tour: if no packages specifically tagged 'customised-tour' or 'customised',
// let's assign a selection of top featured customizable packages so user sees rich results!
$customCount = TourPackage::whereIn('category_slug', ['customised', 'customised-tour'])->count();
if ($customCount === 0) {
    // Clone or tag popular packages as customised or associate them
    echo "Adding customized package references...\n";
    $sampleCustomPkgs = [
        [
            'name' => 'Signature Spiti Explorer (Customised)',
            'slug' => 'signature-spiti-explorer-customised',
            'category_slug' => 'customised-tour',
            'destination' => 'Spiti Valley, Himachal',
            'duration' => '7N / 8D',
            'price' => 38999,
            'original_price' => 45000,
            'short_description' => 'Private customized SUV expedition across Kaza, Chandratal, Tabo and high Himalayan passes.',
            'description' => 'Tailor-made private adventure through Spiti Valley with dedicated 4x4 vehicle, boutique homestays, private star-gazing sessions, and flexible daily timings.',
            'image' => 'images/himachal.jpg',
            'highlights' => ['Private 4x4 vehicle', 'Chandratal Lake camping', 'Key & Tabo monasteries', 'Personalized meal schedule'],
            'featured' => true,
        ],
        [
            'name' => 'Kashmir Luxury Retreat (Customised)',
            'slug' => 'kashmir-luxury-retreat-customised',
            'category_slug' => 'customised-tour',
            'destination' => 'Srinagar, Gulmarg & Pahalgam',
            'duration' => '6N / 7D',
            'price' => 42999,
            'original_price' => 49000,
            'short_description' => 'Private heritage houseboat, Gulmarg luxury resort stay, and tailored valley tours.',
            'description' => 'Bespoke romantic and family journey through Kashmir valley with premium Dal Lake shikara rides, private gondola tickets, and curated authentic Wazwan dining.',
            'image' => 'images/kashmir.jpg',
            'highlights' => ['Private Dal Lake houseboat', 'Gulmarg Gondola Phase 1 & 2', 'Betaab & Aru valley excursions', 'Private luxury chauffeur'],
            'featured' => true,
        ],
        [
            'name' => 'Bespoke Darjeeling & Sikkim Haven',
            'slug' => 'bespoke-darjeeling-sikkim-haven',
            'category_slug' => 'customised-tour',
            'destination' => 'Darjeeling, Gangtok & Pelling',
            'duration' => '7N / 8D',
            'price' => 32999,
            'original_price' => 38000,
            'short_description' => 'Handpicked colonial heritage estates, private sunrise drives, and Kanchenjunga viewpoints.',
            'description' => 'Customized Eastern Himalayan circuit tailored for comfort, scenic beauty, and authentic tea garden walks with zero rushed schedules.',
            'image' => 'images/darjeeling.jpg',
            'highlights' => ['Glenburn-style tea estate walk', 'Private Tiger Hill sunrise', 'Kanchenjunga view suites', 'Dedicated travel concierge'],
            'featured' => true,
        ],
        [
            'name' => 'Goa Private Villa & Beach Escapade',
            'slug' => 'goa-private-villa-beach-escapade',
            'category_slug' => 'customised-tour',
            'destination' => 'North & South Goa',
            'duration' => '5N / 6D',
            'price' => 28999,
            'original_price' => 34000,
            'short_description' => 'Private pool villa stay, sunset catamaran yacht charter, and South Goa spice plantations.',
            'description' => 'Custom Goa retreat with private beach hopping, curated dining reservations, private yacht cruise, and personalized adventure water sports.',
            'image' => 'images/goa.jpg',
            'highlights' => ['Private pool villa', 'Sunset catamaran yacht', 'Old Goa heritage walk', 'Water sports package'],
            'featured' => true,
        ],
    ];

    foreach ($sampleCustomPkgs as $p) {
        TourPackage::updateOrCreate(['slug' => $p['slug']], $p);
    }
}

echo "Done! Categories updated:\n";
foreach (Category::all() as $c) {
    echo " - " . $c->slug . " (" . $c->title . ")\n";
}
