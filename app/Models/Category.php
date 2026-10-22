<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'short',
        'description',
        'image',
        'icon',
        'order',
    ];

    public function packages()
    {
        return $this->hasMany(TourPackage::class, 'category_slug', 'slug');
    }

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return asset('images/darjeeling.jpg');
        }
        if (str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
            return $this->image;
        }
        return asset($this->image);
    }
}
