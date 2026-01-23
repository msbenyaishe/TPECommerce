<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

try {
    echo "=== Testing File Upload ===\n";
    
    // Create a test file
    $testFile = UploadedFile::fake()->image('test.jpg', 100, 100);
    
    echo "Storing file...\n";
    $path = $testFile->store('products', 'public');
    echo "✓ File stored at: " . $path . "\n";
    
    echo "\n=== Creating Product with File ===\n";
    $product = Product::create([
        'nom' => 'Test Product with Image',
        'prix' => 99.99,
        'categorie' => 'Electronics',
        'image' => $path,
    ]);
    echo "✓ Product created: ID " . $product->id . "\n";
    echo "✓ Image path: " . $product->image . "\n";
    
} catch (\Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . "\n";
    echo "Line: " . $e->getLine() . "\n";
    echo "Trace: " . $e->getTraceAsString() . "\n";
}
