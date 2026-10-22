@extends('layouts.admin')

@section('title', 'Manage Tour Packages')
@section('page_title', 'Tour Packages')

@section('content')

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <!-- Search and Category Filters -->
        <form method="GET" action="{{ route('admin.packages.index') }}" class="flex flex-wrap items-center gap-3 flex-1 max-w-xl">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search package name or destination..." 
                   class="flex-1 min-w-[200px] rounded-xl border border-border bg-white px-3.5 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-primary/30">

            <select name="category" onchange="this.form.submit()" class="rounded-xl border border-border bg-white px-3.5 py-2 text-xs font-medium focus:outline-none">
                <option value="">All Categories</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->slug }}" {{ request('category') === $cat->slug ? 'selected' : '' }}>{{ $cat->title }}</option>
                @endforeach
            </select>

            <button type="submit" class="rounded-xl bg-foreground text-white px-4 py-2 text-xs font-semibold hover:bg-primary transition-colors">
                Search
            </button>
        </form>

        <a href="{{ route('admin.packages.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-primary px-5 py-2.5 text-xs font-semibold text-white shadow-soft hover:bg-primary-light transition-all self-start sm:self-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Add New Package</span>
        </a>
    </div>

    <!-- Packages Table -->
    <div class="rounded-3xl bg-white p-6 shadow-soft border border-border">
        @if($packages->isEmpty())
            <div class="py-12 text-center text-muted-foreground text-sm">
                No tour packages found.
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="text-muted-foreground border-b border-border">
                            <th class="pb-3 font-semibold">Image</th>
                            <th class="pb-3 font-semibold">Package Name</th>
                            <th class="pb-3 font-semibold">Destination</th>
                            <th class="pb-3 font-semibold">Category</th>
                            <th class="pb-3 font-semibold">Duration</th>
                            <th class="pb-3 font-semibold">Price</th>
                            <th class="pb-3 font-semibold">Featured</th>
                            <th class="pb-3 font-semibold text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border">
                        @foreach($packages as $pkg)
                            <tr>
                                <td class="py-3">
                                    <img src="{{ $pkg->image_url }}" alt="{{ $pkg->name }}" class="h-10 w-14 rounded-lg object-cover">
                                </td>
                                <td class="py-3 font-bold text-foreground max-w-xs">
                                    <a href="{{ route('packages.show', $pkg->slug) }}" target="_blank" class="hover:text-primary transition-colors">
                                        {{ $pkg->name }}
                                    </a>
                                </td>
                                <td class="py-3 text-muted-foreground">
                                    {{ $pkg->destination }}
                                </td>
                                <td class="py-3">
                                    <span class="rounded-full bg-emerald-50 text-emerald-800 px-2.5 py-0.5 text-[11px] font-semibold">
                                        {{ $pkg->category->title ?? $pkg->category_slug }}
                                    </span>
                                </td>
                                <td class="py-3 text-foreground font-medium">
                                    {{ $pkg->duration ?? '—' }}
                                </td>
                                <td class="py-3 font-bold text-primary">
                                    ₹{{ number_format($pkg->price, 0) }}
                                </td>
                                <td class="py-3">
                                    @if($pkg->featured)
                                        <span class="rounded-full bg-emerald-100 text-emerald-800 px-2 py-0.5 text-[10px] font-bold">Featured</span>
                                    @else
                                        <span class="text-muted-foreground text-[11px]">—</span>
                                    @endif
                                </td>
                                <td class="py-3 text-right whitespace-nowrap space-x-1">
                                    <a href="{{ route('admin.packages.edit', $pkg->id) }}" class="inline-flex items-center justify-center h-7 px-2.5 rounded-lg bg-emerald-50 text-primary hover:bg-emerald-100 font-semibold text-[11px]" title="Edit Package">
                                        Edit
                                    </a>

                                    <form method="POST" action="{{ route('admin.packages.delete', $pkg->id) }}" class="inline" onsubmit="return confirm('Delete package {{ addslashes($pkg->name) }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center justify-center h-7 px-2.5 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 font-semibold text-[11px]" title="Delete">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $packages->links() }}
            </div>
        @endif
    </div>

@endsection
