<?php
$urls = [
    '/',
    '/packages/group-tour',
    '/packages/customised-tour',
    '/packages/corporate-tour',
    '/packages/excursion',
    '/packages/himachal',
    '/packages/kashmir',
    '/package/spiti-valley',
    '/about',
    '/services',
    '/gallery',
    '/contact',
];

foreach ($urls as $u) {
    $ch = curl_init("http://127.0.0.1:8000" . $u);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    $res = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    echo "$u => $code\n";
}
