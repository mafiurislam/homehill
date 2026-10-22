<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\TourPackage;
use App\Models\Testimonial;
use App\Models\GalleryImage;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::whereNotIn('slug', ['group-tour', 'customised-tour', 'corporate-tour', 'excursion'])
            ->orderBy('order')
            ->get();
        
        // Exact 6 featured packages matching reference image
        $priorityNames = [
            'Spiti Valley',
            'Magical Kashmir',
            'Kinnaur Kalpa',
            'Hidden Gem of Kashmir',
            'Kashmir & Vaishno Devi',
            'Kashmir & Amritsar',
        ];
        $featuredPackages = TourPackage::whereIn('name', $priorityNames)
            ->get()
            ->sortBy(function($pkg) use ($priorityNames) {
                return array_search($pkg->name, $priorityNames);
            })
            ->values();
            
        if ($featuredPackages->count() < 6) {
            $other = TourPackage::where('featured', true)->whereNotIn('name', $priorityNames)->take(6 - $featuredPackages->count())->get();
            $featuredPackages = $featuredPackages->merge($other);
        }

        $testimonials = Testimonial::all();
        $galleryImages = GalleryImage::orderBy('order')->get();

        $stats = [
            ['value' => '15k+', 'label' => 'Happy travellers'],
            ['value' => '120+', 'label' => 'Curated itineraries'],
            ['value' => '14+ yrs', 'label' => 'Travel experience'],
            ['value' => '4.9', 'label' => 'Average rating', 'star' => true],
        ];

        $travelStyles = [
            [
                'title' => 'Group Tour',
                'description' => 'Join organized group departures with planned itineraries and shared memories.',
                'image' => asset('images/groupTour.jpg'),
                'url' => route('packages.category', 'group-tour'),
                'icon' => 'users',
                'badge' => 'Group Departures',
                'highlights' => ['Planned itineraries & tour leader', 'Shared experiences & memories'],
            ],
            [
                'title' => 'Customised Tour',
                'description' => 'Fully personalized travel packages tailored to your destination, budget and travel style.',
                'image' => asset('images/customisedTour.jpg'),
                'url' => route('packages.category', 'customised-tour'),
                'icon' => 'sliders',
                'badge' => '100% Tailored',
                'highlights' => ['Custom itinerary & hotels', 'Private cab & personal pace'],
            ],
            [
                'title' => 'Corporate Tour',
                'description' => 'Professional travel solutions for companies, team outings and business retreats.',
                'image' => asset('images/corporateTour.jpg'),
                'url' => route('packages.category', 'corporate-tour'),
                'icon' => 'briefcase',
                'badge' => 'Corporate & MICE',
                'highlights' => ['Team building & conferences', 'End-to-end event logistics'],
            ],
            [
                'title' => 'Excursion',
                'description' => 'Short trips, day tours, educational tours and quick refreshing getaways.',
                'image' => asset('images/excursion.jpg'),
                'url' => route('packages.category', 'excursion'),
                'icon' => 'compass',
                'badge' => 'Day Trips & Short Tours',
                'highlights' => ['Sightseeing & local exploration', 'Educational & picnic getaways'],
            ],
        ];

        $steps = [
            [
                'step' => '01',
                'title' => 'Send Your Query',
                'desc' => 'Share your travel dream through our quick inquiry form or WhatsApp.',
            ],
            [
                'step' => '02',
                'title' => 'Choose Your Destination',
                'desc' => 'Explore handpicked itineraries and pick what excites you most.',
            ],
            [
                'step' => '03',
                'title' => 'Customise Your Package',
                'desc' => 'Fine-tune the itinerary, hotels and transport to fit your preferences.',
            ],
            [
                'step' => '04',
                'title' => 'Enjoy Your Journey',
                'desc' => 'Pack your bags and have a worry-free, memorable vacation.',
            ],
        ];

        $whyChooseUs = [
            [
                'title' => 'Experienced Travel Team',
                'desc' => 'Years of expertise crafting memorable journeys across India and beyond.',
                'icon' => 'award',
            ],
            [
                'title' => 'Customized Travel Plans',
                'desc' => 'Every itinerary tailored to your pace, interests and budget.',
                'icon' => 'sliders',
            ],
            [
                'title' => 'Affordable Packages',
                'desc' => 'Transparent pricing with no hidden costs — real value for money.',
                'icon' => 'tag',
            ],
            [
                'title' => 'Trusted Hotel Partners',
                'desc' => 'Handpicked verified hotels and homestays for comfort and hygiene.',
                'icon' => 'hotel',
            ],
            [
                'title' => '24/7 Travel Assistance',
                'desc' => 'Dedicated trip manager supporting you before, during and after.',
                'icon' => 'phone-call',
            ],
            [
                'title' => 'Safe & Comfortable Journey',
                'desc' => 'Experienced verified drivers and sanitized well-maintained cabs.',
                'icon' => 'shield-check',
            ],
        ];

        return view('pages.home', compact(
            'categories',
            'featuredPackages',
            'testimonials',
            'galleryImages',
            'stats',
            'travelStyles',
            'steps',
            'whyChooseUs'
        ));
    }

    public function about()
    {
        $stats = [
            ['value' => '15k+', 'label' => 'Happy Travellers'],
            ['value' => '120+', 'label' => 'Curated Itineraries'],
            ['value' => '14+ yrs', 'label' => 'Travel Experience'],
            ['value' => '4.9 / 5', 'label' => 'Customer Rating'],
        ];

        return view('pages.about', compact('stats'));
    }

    public function services()
    {
        $categories = Category::orderBy('order')->get();

        $servicesList = [
            [
                'title' => 'Group Tour',
                'desc' => 'Organized group tours with planned itineraries and comfortable travel arrangements for memorable shared journeys.',
                'url' => route('group-tours'),
                'icon' => 'users',
            ],
            [
                'title' => 'Customised Tour',
                'desc' => 'Fully customizable travel packages tailored to your destination, budget, duration and personal preferences.',
                'url' => route('packages.index'),
                'icon' => 'sliders',
            ],
            [
                'title' => 'Corporate Tour',
                'desc' => 'Professional corporate travel solutions for companies, employees, meetings and team trips.',
                'url' => route('corporate-tours'),
                'icon' => 'briefcase',
            ],
            [
                'title' => 'Excursion',
                'desc' => 'Well-planned excursions and short-distance travel experiences for quick, refreshing getaways.',
                'url' => route('excursions'),
                'icon' => 'compass',
            ],
            [
                'title' => 'Hotel Booking',
                'desc' => 'Easy and reliable hotel booking assistance for different destinations and budgets, handpicked for comfort.',
                'url' => route('contact'),
                'icon' => 'hotel',
            ],
            [
                'title' => 'Car Booking',
                'desc' => 'Comfortable private cars, rental vehicles, airport transfers and local transportation at fair rates.',
                'url' => route('contact'),
                'icon' => 'car',
            ],
        ];

        return view('pages.services', compact('categories', 'servicesList'));
    }

    public function groupTours()
    {
        $packages = TourPackage::where('type', 'group')
            ->orWhere('featured', true)
            ->take(9)
            ->get();

        return view('pages.group-tours', compact('packages'));
    }

    public function corporateTours()
    {
        $packages = TourPackage::where('type', 'corporate')
            ->orWhere('popular', true)
            ->take(6)
            ->get();

        return view('pages.corporate-tours', compact('packages'));
    }

    public function excursions()
    {
        $packages = TourPackage::where('type', 'excursion')
            ->orWhere('duration', 'like', '%1D%')
            ->orWhere('duration', 'like', '%2D%')
            ->take(6)
            ->get();

        if ($packages->isEmpty()) {
            $packages = TourPackage::take(6)->get();
        }

        return view('pages.excursions', compact('packages'));
    }

    public function gallery(Request $request)
    {
        $category = $request->query('category', 'all');

        $query = GalleryImage::orderBy('order');
        if ($category !== 'all') {
            $query->where('category', $category);
        }
        $images = $query->get();

        $categories = [
            ['key' => 'all', 'label' => 'All'],
            ['key' => 'destinations', 'label' => 'Destinations'],
            ['key' => 'hotels', 'label' => 'Hotels'],
            ['key' => 'group_tours', 'label' => 'Group Tours'],
            ['key' => 'transport', 'label' => 'Transport'],
            ['key' => 'nature', 'label' => 'Nature'],
        ];

        return view('pages.gallery', compact('images', 'categories', 'category'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }
}
