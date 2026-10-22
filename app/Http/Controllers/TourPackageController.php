<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TourPackage;
use App\Models\Category;

class TourPackageController extends Controller
{
    public function index(Request $request)
    {
        $selectedCategory = $request->query('category', 'all');
        $search = $request->query('search');

        $categories = Category::orderBy('order')->get();

        $query = TourPackage::query();

        if ($selectedCategory && $selectedCategory !== 'all') {
            $query->where('category_slug', $selectedCategory);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('destination', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%");
            });
        }

        $packages = $query->orderBy('featured', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(12)
            ->withQueryString();

        $currentCategory = $selectedCategory !== 'all' 
            ? Category::where('slug', $selectedCategory)->first() 
            : null;

        return view('pages.packages', compact('packages', 'categories', 'selectedCategory', 'currentCategory', 'search'));
    }

    public function byCategory($categorySlug)
    {
        $slugMap = [
            'group-tour' => ['group', 'group-tour'],
            'group' => ['group', 'group-tour'],
            'corporate-tour' => ['corporate', 'corporate-tour'],
            'corporate' => ['corporate', 'corporate-tour'],
            'excursion' => ['excursion', 'excursions'],
            'excursions' => ['excursion', 'excursions'],
            'customised-tour' => ['customised-tour', 'customised', 'custom'],
            'customised' => ['customised-tour', 'customised', 'custom'],
        ];

        $matchedSlugs = $slugMap[$categorySlug] ?? [$categorySlug];

        $category = Category::whereIn('slug', $matchedSlugs)->first();
        if (!$category) {
            $category = Category::where('slug', $categorySlug)->firstOrFail();
        }

        $categories = Category::orderBy('order')->get();

        $packages = TourPackage::whereIn('category_slug', $matchedSlugs)
            ->orderBy('featured', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(12);

        $selectedCategory = $category->slug;
        $currentCategory = $category;
        $search = null;

        return view('pages.packages', compact('packages', 'categories', 'selectedCategory', 'currentCategory', 'search'));
    }

    public function show($slug)
    {
        $package = TourPackage::where('slug', $slug)->firstOrFail();
        $relatedPackages = TourPackage::where('category_slug', $package->category_slug)
            ->where('id', '!=', $package->id)
            ->take(3)
            ->get();

        return view('pages.package-detail', compact('package', 'relatedPackages'));
    }

    public function apiDetail($id)
    {
        $package = TourPackage::findOrFail($id);
        return response()->json([
            'id' => $package->id,
            'name' => $package->name,
            'slug' => $package->slug,
            'duration' => $package->duration,
            'destination' => $package->destination,
            'price' => number_format($package->price, 0),
            'short_description' => $package->short_description,
            'description' => $package->description,
            'image' => $package->image_url,
            'gallery' => $package->gallery ?? [],
            'highlights' => $package->highlights ?? [],
            'inclusions' => $package->inclusions ?? [],
            'exclusions' => $package->exclusions ?? [],
        ]);
    }
}
