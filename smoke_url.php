<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$data = json_decode(file_get_contents(__DIR__ . '/storage/app/upload_smoke.json'), true);
$disk = $data['disk'];
$path = $data['path'];
echo Illuminate\Support\Facades\Storage::disk($disk)->url($path) . PHP_EOL;
