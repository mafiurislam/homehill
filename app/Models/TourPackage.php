<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category_slug',
        'destination',
        'duration',
        'price',
        'original_price',
        'short_description',
        'description',
        'image',
        'gallery',
        'highlights',
        'inclusions',
        'exclusions',
        'type',
        'featured',
        'popular',
        'departure_dates',
    ];

    protected $casts = [
        'gallery' => 'array',
        'highlights' => 'array',
        'inclusions' => 'array',
        'exclusions' => 'array',
        'departure_dates' => 'array',
        'featured' => 'boolean',
        'popular' => 'boolean',
        'price' => 'decimal:2',
        'original_price' => 'decimal:2',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_slug', 'slug');
    }

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return asset('images/hero.jpg');
        }
        if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
            return $this->image;
        }
        return asset($this->image);
    }

    public function getFormattedDurationAttribute()
    {
        if (!$this->duration) {
            return 'Custom';
        }
        $d = trim($this->duration);
        
        // If format is "7N / 8D", convert to "8D / 7N"
        if (preg_match('/(\d+)\s*N\s*\/\s*(\d+)\s*D/i', $d, $matches)) {
            return "{$matches[2]}D / {$matches[1]}N";
        }
        
        // If already "8D / 7N"
        if (preg_match('/(\d+)\s*D\s*\/\s*(\d+)\s*N/i', $d, $matches)) {
            return "{$matches[1]}D / {$matches[2]}N";
        }
        
        if (preg_match('/^1\s*Day$/i', $d)) {
            return "1D / 0N";
        }

        return $d;
    }

    public function getGalleryUrlsAttribute(): array
    {
        $urls = [];
        if (!empty($this->gallery) && is_array($this->gallery)) {
            foreach ($this->gallery as $img) {
                if ($img) {
                    $urls[] = (str_starts_with($img, 'http://') || str_starts_with($img, 'https://')) ? $img : asset($img);
                }
            }
        }
        
        if (empty($urls)) {
            $urls[] = $this->image_url;
        }

        // If only 1 image, supplement with quality travel images so the slider has multiple slides
        if (count($urls) === 1) {
            $fallbacks = [asset('images/himachal.jpg'), asset('images/kashmir.jpg'), asset('images/darjeeling.jpg')];
            foreach ($fallbacks as $fb) {
                if (!in_array($fb, $urls)) {
                    $urls[] = $fb;
                }
            }
        }

        return array_values(array_unique(array_slice($urls, 0, 4)));
    }
}
