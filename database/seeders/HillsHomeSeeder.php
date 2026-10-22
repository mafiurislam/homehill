<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;
use App\Models\TourPackage;
use App\Models\Testimonial;
use App\Models\GalleryImage;

class HillsHomeSeeder extends Seeder
{
    /**
     * Map Base44 image URL to local asset path if matching.
     */
    private function mapImage(?string $url): string
    {
        if (!$url) {
            return 'images/hero.jpg';
        }

        $imageMap = [
            'c694b7aec_generated_198bcec0.jpg' => 'images/hero.jpg',
            'd23ec8656_generated_3f7fc3a1.jpg' => 'images/darjeeling.jpg',
            '5a5000c04_generated_9f1a95b2.jpg' => 'images/sikkim.jpg',
            'a31448355_generated_e90bb133.jpg' => 'images/northBengal.jpg',
            '56dc553fd_generated_5a7e2b29.jpg' => 'images/dooars.jpg',
            '6263bbad7_generated_0023d16e.jpg' => 'images/bhutan.jpg',
            '2446906a6_generated_7b13215b.jpg' => 'images/kashmir.jpg',
            '574d8ce32_generated_3a1c917c.jpg' => 'images/himachal.jpg',
            'a915f1420_generated_f3aaa27c.jpg' => 'images/goa.jpg',
            'ad3a8676e_generated_1d2fb925.jpg' => 'images/rajasthan.jpg',
            '4b003b861_generated_45cfa83c.jpg' => 'images/northeast.jpg',
            '4d916fc06_generated_f6cfd5ef.jpg' => 'images/aboutTeam.jpg',
            '8da5d2fc0_generated_8c20bd28.jpg' => 'images/groupTour.jpg',
            'aec9b25b2_generated_04f0b624.jpg' => 'images/customisedTour.jpg',
            '2ea6235b2_generated_2b6ca1e4.jpg' => 'images/corporateTour.jpg',
            'e9efbb9e3_generated_adf02b15.jpg' => 'images/excursion.jpg',
            'e58e7f5ce_generated_image.png' => 'images/southIndia.png',
            '988977fcb_generated_image.png' => 'images/southBengal.png',
            '01f5d2b48_generated_image.png' => 'images/andaman.png',
            '63bec92ea_logo.png' => 'images/logo.png',
        ];

        foreach ($imageMap as $needle => $local) {
            if (str_contains($url, $needle)) {
                return $local;
            }
        }

        return $url;
    }

    public function run(): void
    {
        // 1. Admin user
        User::updateOrCreate(
            ['email' => 'admin@hillshome.com'],
            [
                'name' => 'Hills Home Admin',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Categories
        $categoriesFile = database_path('data/categories.json');
        if (file_exists($categoriesFile)) {
            $categories = json_decode(file_get_contents($categoriesFile), true);
            foreach ($categories as $cat) {
                Category::updateOrCreate(
                    ['slug' => $cat['slug']],
                    [
                        'title' => $cat['title'],
                        'short' => $cat['short'] ?? null,
                        'description' => $cat['description'] ?? null,
                        'image' => $this->mapImage($cat['image'] ?? null),
                        'icon' => $cat['icon'] ?? 'Mountain',
                        'order' => (int)($cat['order'] ?? 0),
                    ]
                );
            }
        }

        // 3. Tour Packages
        $packagesFile = database_path('data/packages.json');
        if (file_exists($packagesFile)) {
            $packages = json_decode(file_get_contents($packagesFile), true);
            foreach ($packages as $pkg) {
                $gallery = [];
                if (!empty($pkg['gallery']) && is_array($pkg['gallery'])) {
                    foreach ($pkg['gallery'] as $g) {
                        $gallery[] = $this->mapImage($g);
                    }
                }

                TourPackage::updateOrCreate(
                    ['slug' => $pkg['slug'] ?? \Illuminate\Support\Str::slug($pkg['name'] ?? $pkg['destination'])],
                    [
                        'name' => $pkg['name'] ?? 'Tour Package',
                        'category_slug' => $pkg['category'] ?? null,
                        'destination' => $pkg['destination'] ?? null,
                        'duration' => $pkg['duration'] ?? null,
                        'price' => (float)($pkg['price'] ?? 0),
                        'original_price' => isset($pkg['original_price']) ? (float)$pkg['original_price'] : null,
                        'short_description' => $pkg['short_description'] ?? null,
                        'description' => $pkg['description'] ?? null,
                        'image' => $this->mapImage($pkg['image'] ?? null),
                        'gallery' => $gallery,
                        'highlights' => $pkg['highlights'] ?? [],
                        'inclusions' => $pkg['inclusions'] ?? [
                            'Hotel accommodation with breakfast',
                            'All transfers & sightseeing by private cab',
                            'Toll taxes, parking and driver allowances',
                            '24/7 on-trip assistance from team'
                        ],
                        'exclusions' => $pkg['exclusions'] ?? [
                            'Airfare / train fare',
                            'Personal expenses and entry fees to monuments',
                            'Optional activities and adventure sports',
                            'GST / Taxes as applicable'
                        ],
                        'type' => $pkg['type'] ?? 'regular',
                        'featured' => (bool)($pkg['featured'] ?? false),
                        'popular' => (bool)($pkg['popular'] ?? false),
                        'departure_dates' => $pkg['departure_dates'] ?? [],
                    ]
                );
            }
        }

        // 4. Testimonials
        $testimonialsFile = database_path('data/testimonials.json');
        if (file_exists($testimonialsFile)) {
            $testimonials = json_decode(file_get_contents($testimonialsFile), true);
            foreach ($testimonials as $t) {
                Testimonial::updateOrCreate(
                    ['customer_name' => $t['customer_name'], 'review' => $t['review']],
                    [
                        'destination' => $t['destination'] ?? 'Incredible Journey',
                        'rating' => (int)($t['rating'] ?? 5),
                        'review' => $t['review'],
                        'photo' => !empty($t['photo']) ? $this->mapImage($t['photo']) : null,
                    ]
                );
            }
        }

        // 5. Gallery Images (12 default authentic photos)
        $defaultGallery = [
            ['title' => 'Darjeeling Tea Gardens', 'category' => 'destinations', 'image' => 'images/darjeeling.jpg', 'order' => 1],
            ['title' => 'Sikkim Monastery', 'category' => 'destinations', 'image' => 'images/sikkim.jpg', 'order' => 2],
            ['title' => 'Dooars Wildlife', 'category' => 'nature', 'image' => 'images/dooars.jpg', 'order' => 3],
            ['title' => "Bhutan Tiger's Nest", 'category' => 'destinations', 'image' => 'images/bhutan.jpg', 'order' => 4],
            ['title' => 'Kashmir Houseboats', 'category' => 'hotels', 'image' => 'images/kashmir.jpg', 'order' => 5],
            ['title' => 'Himachal Valley', 'category' => 'nature', 'image' => 'images/himachal.jpg', 'order' => 6],
            ['title' => 'Goa Beaches', 'category' => 'destinations', 'image' => 'images/goa.jpg', 'order' => 7],
            ['title' => 'Rajasthan Fort', 'category' => 'destinations', 'image' => 'images/rajasthan.jpg', 'order' => 8],
            ['title' => 'Northeast Root Bridge', 'category' => 'nature', 'image' => 'images/northeast.jpg', 'order' => 9],
            ['title' => 'Group Adventure', 'category' => 'group_tours', 'image' => 'images/groupTour.jpg', 'order' => 10],
            ['title' => 'Corporate Retreat', 'category' => 'group_tours', 'image' => 'images/corporateTour.jpg', 'order' => 11],
            ['title' => 'Custom Journey', 'category' => 'transport', 'image' => 'images/customisedTour.jpg', 'order' => 12],
        ];

        foreach ($defaultGallery as $g) {
            GalleryImage::updateOrCreate(
                ['title' => $g['title']],
                $g
            );
        }
    }
}
