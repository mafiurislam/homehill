@extends('layouts.admin')

@section('title', 'Manage Gallery')
@section('page_title', 'Travel Gallery Photos')

@section('content')

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Gallery Grid (2 cols) -->
        <div class="lg:col-span-2 rounded-3xl bg-white p-6 shadow-soft border border-border">
            <h3 class="text-base font-bold text-foreground mb-4">Current Gallery Images</h3>

            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                @foreach($images as $img)
                    <div class="relative rounded-2xl overflow-hidden border border-border group bg-muted">
                        <img src="{{ $img->image_url }}" alt="{{ $img->title }}" class="h-36 w-full object-cover">
                        <div class="p-2.5 bg-white">
                            <h4 class="text-xs font-bold text-foreground truncate">{{ $img->title }}</h4>
                            <span class="text-[10px] text-muted-foreground capitalize">{{ str_replace('_', ' ', $img->category) }}</span>
                        </div>
                        <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <form method="POST" action="{{ route('admin.gallery.delete', $img->id) }}" onsubmit="return confirm('Delete this image?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="h-7 w-7 rounded-full bg-red-600 text-white flex items-center justify-center hover:bg-red-700 shadow-sm" title="Delete">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $images->links() }}
            </div>
        </div>

        <!-- Add Image Form (1 col) -->
        <div class="rounded-3xl bg-white p-6 shadow-soft border border-border h-fit">
            <h3 class="text-base font-bold text-foreground mb-4">Add Gallery Image</h3>

            <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Image Caption / Title *</label>
                    <input type="text" name="title" required placeholder="e.g. Sunrise over Kanchenjunga" 
                           class="w-full rounded-xl border border-border bg-white px-3.5 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Category *</label>
                    <select name="category" required class="w-full rounded-xl border border-border bg-white px-3.5 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                        <option value="destinations">Destinations</option>
                        <option value="hotels">Hotels</option>
                        <option value="group_tours">Group Tours</option>
                        <option value="transport">Transport</option>
                        <option value="nature">Nature</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Image Path / URL</label>
                    <input type="text" name="image" placeholder="images/darjeeling.jpg or https://..." 
                           class="w-full rounded-xl border border-border bg-white px-3.5 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Or Upload File</label>
                    <input type="file" name="image_file" accept="image/*" 
                           class="w-full rounded-xl border border-border bg-white px-3.5 py-2 text-xs focus:outline-none">
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full rounded-xl bg-primary py-2.5 text-xs font-semibold text-white shadow-soft hover:bg-primary-light transition-all">
                        Upload to Gallery
                    </button>
                </div>
            </form>
        </div>

    </div>

@endsection
