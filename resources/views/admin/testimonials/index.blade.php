@extends('layouts.admin')

@section('title', 'Manage Testimonials')
@section('page_title', 'Customer Testimonials & Reviews')

@section('content')

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Testimonials List (2 cols) -->
        <div class="lg:col-span-2 rounded-3xl bg-white p-6 shadow-soft border border-border">
            <h3 class="text-base font-bold text-foreground mb-4">Published Testimonials</h3>

            <div class="space-y-4">
                @foreach($testimonials as $t)
                    <div class="p-5 rounded-2xl border border-border bg-[#fafdfb] flex flex-col justify-between space-y-3">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-sm font-bold text-foreground">{{ $t->customer_name }}</h4>
                                <span class="text-xs text-muted-foreground">{{ $t->destination }}</span>
                            </div>
                            <div class="flex items-center gap-1 text-yellow-400">
                                @for($i = 0; $i < $t->rating; $i++)
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                @endfor
                            </div>
                        </div>

                        <p class="text-xs sm:text-sm text-foreground/80 italic leading-relaxed">
                            "{{ $t->review }}"
                        </p>

                        <div class="flex items-center justify-end pt-2 border-t border-border">
                            <form method="POST" action="{{ route('admin.testimonials.delete', $t->id) }}" onsubmit="return confirm('Delete this review?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs text-red-600 hover:text-red-800 font-medium">
                                    Delete Testimonial
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $testimonials->links() }}
            </div>
        </div>

        <!-- Add Testimonial Form (1 col) -->
        <div class="rounded-3xl bg-white p-6 shadow-soft border border-border h-fit">
            <h3 class="text-base font-bold text-foreground mb-4">Add Testimonial</h3>

            <form method="POST" action="{{ route('admin.testimonials.store') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Customer / Group Name *</label>
                    <input type="text" name="customer_name" required placeholder="e.g. Rahul Sharma & Family" 
                           class="w-full rounded-xl border border-border bg-white px-3.5 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Destination / Trip</label>
                    <input type="text" name="destination" placeholder="e.g. Kashmir 6D/5N" 
                           class="w-full rounded-xl border border-border bg-white px-3.5 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Rating *</label>
                    <select name="rating" required class="w-full rounded-xl border border-border bg-white px-3.5 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary">
                        <option value="5">5 Stars (Excellent)</option>
                        <option value="4">4 Stars (Good)</option>
                        <option value="3">3 Stars (Average)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-foreground uppercase tracking-wider mb-1">Review Text *</label>
                    <textarea name="review" required rows="4" placeholder="Enter customer experience..." 
                              class="w-full rounded-xl border border-border bg-white px-3.5 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary"></textarea>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full rounded-xl bg-primary py-2.5 text-xs font-semibold text-white shadow-soft hover:bg-primary-light transition-all">
                        Save Testimonial
                    </button>
                </div>
            </form>
        </div>

    </div>

@endsection
