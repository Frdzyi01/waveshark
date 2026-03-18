$usedImages = [];

try {
$tables = ['st_john_products', 'landing_services', 'sabah_products', 'langkawi_products'];
foreach ($tables as $table) {
$images = \Illuminate\Support\Facades\DB::table($table)->pluck('image')->toArray();
foreach ($images as $img) {
if ($img) {
$usedImages[] = ltrim($img, '/');
}
}
}
} catch (\Exception $e) {
echo "Error: " . $e->getMessage() . "\n";
}

echo "===USED_DB_IMAGES===\n";
echo json_encode($usedImages) . "\n";
echo "===END_USED_DB_IMAGES===\n";