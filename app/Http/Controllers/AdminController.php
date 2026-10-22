<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\TourPackage;
use App\Models\Testimonial;
use App\Models\GalleryImage;
use App\Models\Inquiry;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'inquiries' => Inquiry::count(),
            'new_inquiries' => Inquiry::where('status', 'new')->count(),
            'packages' => TourPackage::count(),
            'categories' => Category::count(),
            'testimonials' => Testimonial::count(),
            'gallery' => GalleryImage::count(),
        ];

        $recentInquiries = Inquiry::latest()->take(8)->get();
        $recentPackages = TourPackage::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentInquiries', 'recentPackages'));
    }

    // Inquiries Management
    public function inquiries(Request $request)
    {
        $type = $request->query('type');
        $status = $request->query('status');

        $query = Inquiry::latest();

        if ($type) {
            $query->where('type', $type);
        }
        if ($status) {
            $query->where('status', $status);
        }

        $inquiries = $query->paginate(20)->withQueryString();

        return view('admin.inquiries.index', compact('inquiries', 'type', 'status'));
    }

    public function updateInquiryStatus(Request $request, $id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $request->validate(['status' => 'required|in:new,contacted,completed']);
        $inquiry->update(['status' => $request->status]);

        return back()->with('success', 'Inquiry status updated successfully.');
    }

    public function deleteInquiry($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->delete();

        return back()->with('success', 'Inquiry deleted successfully.');
    }

    // Packages Management
    public function packages(Request $request)
    {
        $search = $request->query('search');
        $category = $request->query('category');

        $query = TourPackage::latest();

        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('destination', 'like', "%{$search}%");
        }
        if ($category) {
            $query->where('category_slug', $category);
        }

        $packages = $query->paginate(20)->withQueryString();
        $categories = Category::orderBy('order')->get();

        return view('admin.packages.index', compact('packages', 'categories', 'search', 'category'));
    }

    public function createPackage()
    {
        $categories = Category::orderBy('order')->get();
        return view('admin.packages.create', compact('categories'));
    }

    public function storePackage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_slug' => 'required|string',
            'destination' => 'required|string|max:255',
            'duration' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'type' => 'required|string|in:regular,group,corporate,excursion',
            'featured' => 'boolean',
            'popular' => 'boolean',
            'highlights_text' => 'nullable|string',
        ]);

        $slug = Str::slug($validated['name']);
        if (TourPackage::where('slug', $slug)->exists()) {
            $slug .= '-' . time();
        }

        $highlights = [];
        if (!empty($validated['highlights_text'])) {
            $highlights = array_filter(array_map('trim', explode("\n", $validated['highlights_text'])));
        }

        $image = $validated['image'] ?? 'images/darjeeling.jpg';
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/uploads'), $filename);
            $image = 'images/uploads/' . $filename;
        }

        TourPackage::create([
            'name' => $validated['name'],
            'slug' => $slug,
            'category_slug' => $validated['category_slug'],
            'destination' => $validated['destination'],
            'duration' => $validated['duration'],
            'price' => $validated['price'],
            'original_price' => $validated['original_price'] ?? null,
            'short_description' => $validated['short_description'] ?? null,
            'description' => $validated['description'] ?? null,
            'image' => $image,
            'type' => $validated['type'],
            'featured' => $request->has('featured'),
            'popular' => $request->has('popular'),
            'highlights' => $highlights,
            'inclusions' => [
                'Hotel accommodation with breakfast',
                'All transfers & sightseeing by private cab',
                'Toll taxes, parking and driver allowances',
                '24/7 on-trip assistance from team'
            ],
            'exclusions' => [
                'Airfare / train fare',
                'Personal expenses and entry fees',
                'Optional activities and adventure sports'
            ],
        ]);

        return redirect()->route('admin.packages.index')->with('success', 'Package created successfully.');
    }

    public function editPackage($id)
    {
        $package = TourPackage::findOrFail($id);
        $categories = Category::orderBy('order')->get();
        return view('admin.packages.edit', compact('package', 'categories'));
    }

    public function updatePackage(Request $request, $id)
    {
        $package = TourPackage::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_slug' => 'required|string',
            'destination' => 'required|string|max:255',
            'duration' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'type' => 'required|string|in:regular,group,corporate,excursion',
            'highlights_text' => 'nullable|string',
        ]);

        $image = $package->image;
        if (!empty($validated['image'])) {
            $image = $validated['image'];
        }
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/uploads'), $filename);
            $image = 'images/uploads/' . $filename;
        }

        $highlights = $package->highlights;
        if (!empty($validated['highlights_text'])) {
            $highlights = array_filter(array_map('trim', explode("\n", $validated['highlights_text'])));
        }

        $package->update([
            'name' => $validated['name'],
            'category_slug' => $validated['category_slug'],
            'destination' => $validated['destination'],
            'duration' => $validated['duration'],
            'price' => $validated['price'],
            'original_price' => $validated['original_price'] ?? null,
            'short_description' => $validated['short_description'] ?? null,
            'description' => $validated['description'] ?? null,
            'image' => $image,
            'type' => $validated['type'],
            'featured' => $request->has('featured'),
            'popular' => $request->has('popular'),
            'highlights' => $highlights,
        ]);

        return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully.');
    }

    public function deletePackage($id)
    {
        $package = TourPackage::findOrFail($id);
        $package->delete();

        return back()->with('success', 'Package deleted successfully.');
    }

    // Categories
    public function categories()
    {
        $categories = Category::withCount('packages')->orderBy('order')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'short' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'order' => 'integer',
        ]);

        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);

        Category::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'short' => $validated['short'] ?? null,
            'description' => $validated['description'] ?? null,
            'image' => $validated['image'] ?? 'images/darjeeling.jpg',
            'order' => $validated['order'] ?? 0,
        ]);

        return back()->with('success', 'Category created successfully.');
    }

    public function deleteCategory($id)
    {
        $cat = Category::findOrFail($id);
        $cat->delete();

        return back()->with('success', 'Category deleted successfully.');
    }

    // Testimonials
    public function testimonials()
    {
        $testimonials = Testimonial::latest()->paginate(20);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function storeTestimonial(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'destination' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string',
        ]);

        Testimonial::create($validated);

        return back()->with('success', 'Testimonial created successfully.');
    }

    public function deleteTestimonial($id)
    {
        Testimonial::findOrFail($id)->delete();
        return back()->with('success', 'Testimonial deleted successfully.');
    }

    // Gallery
    public function gallery()
    {
        $images = GalleryImage::latest()->paginate(24);
        return view('admin.gallery.index', compact('images'));
    }

    public function storeGallery(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'image' => 'nullable|string',
        ]);

        $imagePath = $validated['image'] ?? 'images/darjeeling.jpg';
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/uploads'), $filename);
            $imagePath = 'images/uploads/' . $filename;
        }

        GalleryImage::create([
            'title' => $validated['title'],
            'category' => $validated['category'],
            'image' => $imagePath,
            'order' => 0,
        ]);

        return back()->with('success', 'Gallery image added successfully.');
    }

    public function deleteGallery($id)
    {
        GalleryImage::findOrFail($id)->delete();
        return back()->with('success', 'Gallery image deleted successfully.');
    }
}
