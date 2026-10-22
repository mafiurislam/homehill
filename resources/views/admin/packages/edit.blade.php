@extends('layouts.admin')

@section('title', 'Edit Package — ' . $package->name)
@section('page_title', 'Edit Tour Package')

@section('content')

    <div class="max-w-3xl rounded-3xl bg-white p-8 shadow-soft border border-border">
        
        <form method="POST" action="{{ route('admin.packages.update', $package->id) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Package Name *</label>
                    <input type="text" name="name" value="{{ old('name', $package->name) }}" required
                           class="w-full rounded-xl border border-border bg-white px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Category *</label>
                    <select name="category_slug" required class="w-full rounded-xl border border-border bg-white px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                        @foreach($categories as $cat)
                            <option value="{{ $cat->slug }}" {{ $package->category_slug === $cat->slug ? 'selected' : '' }}>{{ $cat->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Destination *</label>
                    <input type="text" name="destination" value="{{ old('destination', $package->destination) }}" required
                           class="w-full rounded-xl border border-border bg-white px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Duration *</label>
                    <input type="text" name="duration" value="{{ old('duration', $package->duration) }}" required
                           class="w-full rounded-xl border border-border bg-white px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Price (₹) *</label>
                    <input type="number" name="price" value="{{ old('price', (int)$package->price) }}" required min="0"
                           class="w-full rounded-xl border border-border bg-white px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Package Type *</label>
                    <select name="type" required class="w-full rounded-xl border border-border bg-white px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                        <option value="regular" {{ $package->type === 'regular' ? 'selected' : '' }}>Regular</option>
                        <option value="group" {{ $package->type === 'group' ? 'selected' : '' }}>Group Tour</option>
                        <option value="corporate" {{ $package->type === 'corporate' ? 'selected' : '' }}>Corporate Tour</option>
                        <option value="excursion" {{ $package->type === 'excursion' ? 'selected' : '' }}>Excursion / Day Tour</option>
                    </select>
                </div>

                <div class="flex items-center gap-6 pt-6">
                    <label class="flex items-center gap-2 cursor-pointer text-sm font-medium">
                        <input type="checkbox" name="featured" value="1" {{ $package->featured ? 'checked' : '' }} class="rounded text-primary focus:ring-primary/40">
                        <span>Featured on Homepage</span>
                    </label>

                    <label class="flex items-center gap-2 cursor-pointer text-sm font-medium">
                        <input type="checkbox" name="popular" value="1" {{ $package->popular ? 'checked' : '' }} class="rounded text-primary focus:ring-primary/40">
                        <span>Mark as Popular</span>
                    </label>
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Short Description</label>
                <textarea name="short_description" rows="2" class="w-full rounded-xl border border-border bg-white px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">{{ old('short_description', $package->short_description) }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Detailed Description</label>
                <textarea name="description" rows="5" class="w-full rounded-xl border border-border bg-white px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">{{ old('description', $package->description) }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Highlights (One per line)</label>
                <textarea name="highlights_text" rows="3" class="w-full rounded-xl border border-border bg-white px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">{{ implode("\n", $package->highlights ?? []) }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Image URL / Path</label>
                    <input type="text" name="image" value="{{ old('image', $package->image) }}"
                           class="w-full rounded-xl border border-border bg-white px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                    <div class="mt-2 flex items-center gap-2">
                        <span class="text-xs text-muted-foreground">Current:</span>
                        <img src="{{ $package->image_url }}" alt="Preview" class="h-8 w-12 rounded object-cover">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Or Upload New Image</label>
                    <input type="file" name="image_file" accept="image/*" 
                           class="w-full rounded-xl border border-border bg-white px-4 py-2 text-sm focus:outline-none">
                </div>
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-border">
                <button type="submit" class="rounded-xl bg-primary px-7 py-3 text-sm font-semibold text-white shadow-soft hover:bg-primary-light transition-all">
                    Update Package
                </button>
                <a href="{{ route('admin.packages.index') }}" class="rounded-xl border border-border px-5 py-3 text-sm font-medium text-foreground hover:bg-muted transition-colors">
                    Cancel
                </a>
            </div>
        </form>

    </div>

@endsection
