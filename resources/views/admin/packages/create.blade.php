@extends('layouts.admin')

@section('title', 'Add New Package')
@section('page_title', 'Create Tour Package')

@section('content')

    <div class="max-w-3xl rounded-3xl bg-white p-8 shadow-soft border border-border">
        
        <form method="POST" action="{{ route('admin.packages.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Package Name *</label>
                    <input type="text" name="name" required placeholder="e.g. Majestic Darjeeling & Gangtok" 
                           class="w-full rounded-xl border border-border bg-white px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Category *</label>
                    <select name="category_slug" required class="w-full rounded-xl border border-border bg-white px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->slug }}">{{ $cat->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Destination *</label>
                    <input type="text" name="destination" required placeholder="e.g. Darjeeling, Sikkim" 
                           class="w-full rounded-xl border border-border bg-white px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Duration *</label>
                    <input type="text" name="duration" required placeholder="e.g. 5N / 6D" 
                           class="w-full rounded-xl border border-border bg-white px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Price (₹) *</label>
                    <input type="number" name="price" required min="0" placeholder="e.g. 18500" 
                           class="w-full rounded-xl border border-border bg-white px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Package Type *</label>
                    <select name="type" required class="w-full rounded-xl border border-border bg-white px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                        <option value="regular">Regular</option>
                        <option value="group">Group Tour</option>
                        <option value="corporate">Corporate Tour</option>
                        <option value="excursion">Excursion / Day Tour</option>
                    </select>
                </div>

                <div class="flex items-center gap-6 pt-6">
                    <label class="flex items-center gap-2 cursor-pointer text-sm font-medium">
                        <input type="checkbox" name="featured" value="1" class="rounded text-primary focus:ring-primary/40">
                        <span>Featured on Homepage</span>
                    </label>

                    <label class="flex items-center gap-2 cursor-pointer text-sm font-medium">
                        <input type="checkbox" name="popular" value="1" class="rounded text-primary focus:ring-primary/40">
                        <span>Mark as Popular</span>
                    </label>
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Short Description</label>
                <textarea name="short_description" rows="2" placeholder="Brief summary displayed on package card..." 
                          class="w-full rounded-xl border border-border bg-white px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary"></textarea>
            </div>

            <div>
                <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Detailed Description</label>
                <textarea name="description" rows="5" placeholder="Full itinerary and package overview..." 
                          class="w-full rounded-xl border border-border bg-white px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary"></textarea>
            </div>

            <div>
                <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Highlights (One per line)</label>
                <textarea name="highlights_text" rows="3" placeholder="Sunrise at Tiger Hill&#10;Ghoom Monastery visit&#10;Tea Garden Tour" 
                          class="w-full rounded-xl border border-border bg-white px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary"></textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Image URL / Path</label>
                    <input type="text" name="image" placeholder="images/darjeeling.jpg or https://..." 
                           class="w-full rounded-xl border border-border bg-white px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Or Upload Image</label>
                    <input type="file" name="image_file" accept="image/*" 
                           class="w-full rounded-xl border border-border bg-white px-4 py-2 text-sm focus:outline-none">
                </div>
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-border">
                <button type="submit" class="rounded-xl bg-primary px-7 py-3 text-sm font-semibold text-white shadow-soft hover:bg-primary-light transition-all">
                    Create Package
                </button>
                <a href="{{ route('admin.packages.index') }}" class="rounded-xl border border-border px-5 py-3 text-sm font-medium text-foreground hover:bg-muted transition-colors">
                    Cancel
                </a>
            </div>
        </form>

    </div>

@endsection
