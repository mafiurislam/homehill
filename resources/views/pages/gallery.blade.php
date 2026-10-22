@extends('layouts.app')

@section('title', 'Travel Gallery — Hills Home Travels')

@section('content')

    <!-- Hero Banner with Breadcrumbs -->
    <section class="relative pt-32 pb-20 overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('images/bhutan.jpg') }}" alt="Travel Gallery" class="h-full w-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/55 to-black/80"></div>
        </div>

        <div class="relative z-10 container-px mx-auto max-w-7xl text-center">
            <nav class="flex items-center justify-center gap-2 text-sm text-white/70 mb-4">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                <span>&gt;</span>
                <span class="text-white font-medium">Gallery</span>
            </nav>

            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight">
                Travel Gallery
            </h1>

            <p class="mt-4 max-w-2xl mx-auto text-base sm:text-lg text-white/85 leading-relaxed">
                A glimpse of the breathtaking moments our travellers have lived.
            </p>
        </div>
    </section>

    <!-- Gallery Categories and Grid -->
    <section class="section-py container-px mx-auto max-w-7xl">
        
        <!-- Category Filter Tabs -->
        <div class="flex flex-wrap justify-center gap-2 sm:gap-3 mb-12">
            @foreach($categories as $cat)
                <a href="{{ route('gallery', ['category' => $cat['key']]) }}" 
                   class="rounded-full px-5 py-2.5 text-xs sm:text-sm font-semibold transition-all {{ $category === $cat['key'] ? 'bg-primary text-white shadow-soft' : 'bg-white text-foreground/70 border border-border hover:border-primary' }}">
                    {{ $cat['label'] }}
                </a>
            @endforeach
        </div>

        <!-- Masonry Grid of Images -->
        <div class="columns-1 sm:columns-2 lg:columns-3 gap-6 space-y-6">
            @foreach($images as $img)
                <div class="break-inside-avoid relative rounded-3xl overflow-hidden shadow-soft hover:shadow-float transition-all duration-300 group cursor-pointer"
                     onclick="openLightbox('{{ $img->image_url }}', '{{ addslashes($img->title) }}')">
                    <img src="{{ $img->image_url }}" alt="{{ $img->title }}" class="w-full h-auto object-cover transition-transform duration-500 group-hover:scale-105">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <div class="text-white">
                            <span class="text-[11px] font-semibold uppercase tracking-wider text-emerald-300 block mb-1">
                                {{ ucfirst(str_replace('_', ' ', $img->category)) }}
                            </span>
                            <h3 class="text-lg font-bold leading-snug">{{ $img->title }}</h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </section>

    <!-- Global Image Lightbox Modal -->
    <div id="lightboxModal" class="fixed inset-0 z-50 hidden modal-backdrop flex items-center justify-center p-4" onclick="closeLightbox()">
        <div class="relative max-w-4xl max-h-[90vh] bg-black rounded-3xl overflow-hidden shadow-2xl" onclick="event.stopPropagation()">
            <button onclick="closeLightbox()" class="absolute top-4 right-4 z-10 h-10 w-10 rounded-full bg-white/20 text-white flex items-center justify-center hover:bg-white/40 text-2xl transition-colors">&times;</button>
            <img id="lightboxImg" src="" alt="" class="max-h-[80vh] w-auto max-w-full object-contain mx-auto">
            <div class="p-4 bg-zinc-950 text-center">
                <h4 id="lightboxTitle" class="text-white text-base font-semibold"></h4>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    function openLightbox(url, title) {
        document.getElementById('lightboxImg').src = url;
        document.getElementById('lightboxTitle').textContent = title;
        const modal = document.getElementById('lightboxModal');
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        const modal = document.getElementById('lightboxModal');
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
</script>
@endpush
