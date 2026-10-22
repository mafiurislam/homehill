<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->bootstrap();

// 1. Package detail
$pkg = \App\Models\TourPackage::first();
if ($pkg) {
    $req = Illuminate\Http\Request::create('/package/' . $pkg->slug, 'GET');
    $res = $kernel->handle($req);
    echo "Detail Page /package/{$pkg->slug} -> Status: " . $res->getStatusCode() . "\n";

    // 2. API detail
    $apiReq = Illuminate\Http\Request::create('/api/package/' . $pkg->id, 'GET');
    $apiRes = $kernel->handle($apiReq);
    echo "API /api/package/{$pkg->id} -> Status: " . $apiRes->getStatusCode() . "\n";
}

// 3. Test Inquiry Submission
$inqReq = Illuminate\Http\Request::create('/inquiries', 'POST', [
    'full_name' => 'Test Traveler',
    'contact_number' => '9876543210',
    'email' => 'traveler@example.com',
    'destination' => 'Darjeeling',
    'from_location' => 'Kolkata',
    'members' => '3',
    'message' => 'Looking for 5 days trip in November',
    'package_name' => 'Darjeeling Special',
    'type' => 'booking'
], [], [], ['HTTP_ACCEPT' => 'application/json']);

$inqRes = $kernel->handle($inqReq);
echo "Inquiry Submission POST /inquiries -> Status: " . $inqRes->getStatusCode() . " Content: " . $inqRes->getContent() . "\n";

// Verify it exists in DB
$count = \App\Models\Inquiry::where('contact_number', '9876543210')->count();
echo "Inquiry saved in SQLite database: " . ($count > 0 ? "YES (Count: {$count})" : "NO") . "\n";

// 4. Test Admin Authenticated Dashboard
$adminUser = \App\Models\User::where('email', 'admin@hillshome.com')->first();
if ($adminUser) {
    \Illuminate\Support\Facades\Auth::login($adminUser);
    $adminReq = Illuminate\Http\Request::create('/admin', 'GET');
    $adminRes = $kernel->handle($adminReq);
    echo "Admin Dashboard /admin -> Status: " . $adminRes->getStatusCode() . "\n";
}
