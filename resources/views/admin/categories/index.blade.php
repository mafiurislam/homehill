@extends('layouts.admin')

@section('title', 'Manage Categories')
@section('page_title', 'Tour Categories & Destinations')

@section('content')

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Categories Table (2 cols) -->
        <div class="lg:col-span-2 rounded-3xl bg-white p-6 shadow-soft border border-border">
            <h3 class="text-base font-bold text-foreground mb-4">All Active Categories</h3>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="text-muted-foreground border-b border-border">
                            <th class="pb-3 font-semibold">Image</th>
                            <th class="pb-3 font-semibold">Title</th>
                            <th class="pb-3 font-semibold">Slug</th>
                            <th class="pb-3 font-semibold">Packages</th>
                            <th class="pb-3 font-semibold">Order</th>
                            <th class="pb-3 font-semibold text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border">
                        @foreach($categories as $cat)
                            <tr>
                                <td class="py-3">
                                    <img src="{{ $cat->image_url }}" alt="{{ $cat->title }}" class="h-10 w-12 rounded-lg object-cover">
                                </td>
                                <td class="py-3 font-bold text-foreground">
                                    <a href="{{ route('packages.category', $cat->slug) }}" target="_blank" class="hover:text-primary transition-colors">
                                        {{ $cat->title }}
                                    </a>
                                </td>
                                <td class="py-3 text-muted-foreground font-mono text-[11px]">
                                    {{ $cat->slug }}
                                </td>
                                <td class="py-3 font-medium text-foreground">
                                    <span class="rounded-full bg-emerald-50 text-emerald-800 px-2 py-0.5 text-[11px] font-semibold">
                                        {{ $cat->packages_count ?? 0 }} packages
                                    </span>
                                </td>
                                <td class="py-3 text-muted-foreground">
                                    {{ $cat->order }}
                                </td>
                                <td class="py-3 text-right">
                                    <form method="POST" action="{{ route('admin.categories.delete', $cat->id) }}" class="inline" onsubmit="return confirm('Delete category {{ addslashes($cat->title) }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center justify-center h-7 px-2.5 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 font-semibold text-[11px]">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add Category Form (1 col) -->
        <div class="rounded-3xl bg-white p-6 shadow-soft border border-border h-fit">
            <h3 class="text-base font-bold text-foreground mb-4">Add New Category</h3>

            <form method="POST" action="{{ route('admin.categories.store') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Title *</label>
                    <input type="text" name="title" required placeholder="e.g. Bhutan & Nepal" 
                           class="w-full rounded-xl border border-border bg-white px-3.5 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Slug (optional)</label>
                    <input type="text" name="slug" placeholder="e.g. bhutan-nepal" 
                           class="w-full rounded-xl border border-border bg-white px-3.5 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Short Tagline</label>
                    <input type="text" name="short" placeholder="Brief tagline..." 
                           class="w-full rounded-xl border border-border bg-white px-3.5 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Description</label>
                    <textarea name="description" rows="2" placeholder="Detailed description..." 
                              class="w-full rounded-xl border border-border bg-white px-3.5 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary"></textarea>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Image Path</label>
                    <input type="text" name="image" value="images/darjeeling.jpg" 
                           class="w-full rounded-xl border border-border bg-white px-3.5 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Order Index</label>
                    <input type="number" name="order" value="10" 
                           class="w-full rounded-xl border border-border bg-white px-3.5 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full rounded-xl bg-primary py-2.5 text-xs font-semibold text-white shadow-soft hover:bg-primary-light transition-all">
                        Save Category
                    </button>
                </div>
            </form>
        </div>

    </div>

@endsection
