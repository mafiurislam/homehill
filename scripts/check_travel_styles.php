<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\TourPackage;

$types = ['group', 'corporate', 'excursion'];
foreach ($types as $t) {
    echo "=== $t ===\n";
    $pkgs = TourPackage::where('category_slug', $t)->get();
    foreach ($pkgs as $p) {
        echo " - " . $p->name . " (" . $p->destination . ", " . $p->duration . ", Rs. " . $p->price . ")\n";
    }
}
