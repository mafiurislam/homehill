<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\TourPackage;
use App\Models\Category;

foreach (['group', 'corporate', 'excursion', 'customised', 'himachal', 'kashmir'] as $slug) {
    echo $slug . ': ' . TourPackage::where('category_slug', $slug)->count() . "\n";
}
