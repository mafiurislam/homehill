@props(['pkg'])

@php
    $gallery = $pkg->gallery_urls ?? [$pkg->image_url];
    $cardId = 'pkg-card-' . $pkg->id . '-' . \Illuminate\Support\Str::random(4);
@endphp

<div class="group rounded-3xl overflow-hidden bg-white border border-slate-100 shadow-[0_4px_25px_-5px_rgba(0,0,0,0.06)] hover:shadow-[0_12px_35px_-5px_rgba(0,0,0,0.12)] transition-all duration-300 flex flex-col justify-between h-full"
     data-card-slider="{{ $cardId }}"
     data-total-slides="{{ count($gallery) }}">
    
    <!-- Top Image Slider Area -->
    <div class="relative h-56 sm:h-60 w-full overflow-hidden bg-slate-900 select-none">
        <!-- Image Slides (Smooth Continuous / Crossfade Loop) -->
        <div class="relative w-full h-full">
            @foreach($gallery as $idx => $img)
                <div class="slide-item absolute inset-0 transition-opacity duration-700 ease-in-out {{ $idx === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' }}"
                     data-slide-index="{{ $idx }}">
                    <img src="{{ $img }}" alt="{{ $pkg->name }} photo {{ $idx + 1 }}" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" loading="lazy">
                </div>
            @endforeach
        </div>

        <!-- Bottom Gradient for Overlay Legibility -->
        <div class="absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-black/75 via-black/35 to-transparent pointer-events-none z-10"></div>

        <!-- Left Arrow Button -->
        @if(count($gallery) > 1)
            <button type="button" 
                    onclick="window.stepCardSlider('{{ $cardId }}', -1); event.preventDefault(); event.stopPropagation();" 
                    aria-label="Previous image" 
                    class="package-slider-arrow left">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
            </button>

            <!-- Right Arrow Button -->
            <button type="button" 
                    onclick="window.stepCardSlider('{{ $cardId }}', 1); event.preventDefault(); event.stopPropagation();" 
                    aria-label="Next image" 
                    class="package-slider-arrow right">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
            </button>
        @endif

        <!-- Bottom-Left Location with Map Pin -->
        <div class="absolute bottom-3 left-3.5 z-20 flex items-center gap-1.5 text-white text-xs sm:text-[13px] font-medium drop-shadow-sm pointer-events-none">
            <svg class="w-3.5 h-3.5 text-white shrink-0 drop-shadow" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            <span class="line-clamp-1">{{ $pkg->destination }}</span>
        </div>

        <!-- Bottom-Right Slider Indicator Dots -->
        @if(count($gallery) > 1)
            <div class="absolute bottom-3 right-3.5 z-20 flex items-center gap-1.5 pointer-events-none">
                @foreach($gallery as $idx => $img)
                    <span class="slide-dot package-slide-dot {{ $idx === 0 ? 'active' : 'inactive' }}"
                          data-dot-index="{{ $idx }}"></span>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Card Body Arranged Below Image -->
    <div class="p-5 sm:p-6 flex-1 flex flex-col justify-between space-y-4 bg-white">
        <div class="space-y-3">
            <!-- Title -->
            <h3 class="text-xl sm:text-[22px] font-bold text-slate-900 group-hover:text-primary transition-colors leading-snug">
                <a href="{{ route('packages.show', $pkg->slug) }}" class="hover:underline">
                    {{ $pkg->name }}
                </a>
            </h3>

            <!-- Description -->
            <p class="text-sm text-slate-600 line-clamp-2 leading-relaxed">
                {{ $pkg->short_description ?? $pkg->description }}
            </p>

            <!-- Duration Pill Badge -->
            <div class="pt-0.5">
                <span class="package-duration-pill">
                    <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>{{ $pkg->formatted_duration }}</span>
                </span>
            </div>

            <!-- Highlights with Delicate Green Checkmarks -->
            @if(!empty($pkg->highlights) && count($pkg->highlights) > 0)
                <ul class="space-y-1.5 text-xs sm:text-[13px] text-slate-700 pt-1.5">
                    @foreach(array_slice($pkg->highlights, 0, 3) as $hl)
                        <li class="flex items-center gap-2">
                            <svg class="w-3.5 h-3.5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            <span class="line-clamp-1">{{ $hl }}</span>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <!-- Full-Width Book Now Button (Exact Match to Reference) -->
        <div class="pt-3 border-t border-slate-100">
            <button type="button" 
                    onclick="openBookingDrawer('{{ addslashes($pkg->name) }}', '{{ addslashes($pkg->destination) }}')" 
                    class="package-book-btn">
                <span>Book Now</span>
            </button>
        </div>
    </div>
</div>
