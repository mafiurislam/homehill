<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$routes = [
    '/',
    '/about',
    '/packages',
    '/packages/darjeeling-offbeat',
    '/services',
    '/gallery',
    '/contact',
    '/group-tours',
    '/corporate-tours',
    '/excursions',
    '/terms',
    '/privacy',
    '/login',
];

$success = 0;
foreach ($routes as $uri) {
    $request = Illuminate\Http\Request::create($uri, 'GET');
    try {
        $response = $kernel->handle($request);
        $status = $response->getStatusCode();
        echo "Route {$uri} -> Status: {$status}\n";
        if ($status === 200) {
            $success++;
        } else {
            echo "Non-200 response body snippet: " . substr($response->getContent(), 0, 300) . "\n";
        }
    } catch (\Throwable $e) {
        echo "Route {$uri} -> EXCEPTION: " . $e->getMessage() . " at " . $e->getFile() . ":" . $e->getLine() . "\n";
    }
}

echo "\nSummary: {$success}/" . count($routes) . " routes tested successfully with status 200!\n";
