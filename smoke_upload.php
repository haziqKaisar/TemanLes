<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$disk = config('filesystems.payment_proofs_disk', 'public');
$file = Illuminate\Http\UploadedFile::fake()->image('proof.jpg');
$path = $file->storePublicly('payment-proofs', $disk);
$result = [
    'disk' => $disk,
    'path' => $path,
    'exists' => Illuminate\Support\Facades\Storage::disk($disk)->exists($path),
];
file_put_contents(__DIR__ . '/storage/app/upload_smoke.json', json_encode($result));
