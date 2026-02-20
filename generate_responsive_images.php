<?php
$imagesToProcess = [
    'public/images/laut-singapore2.webp',
    'public/images/laut-malay-new.webp',
    'public/images/sunset.webp',
    'public/images/car-rental.webp',
    'public/images/flight.webp',
    'public/images/hotel.webp',
    'public/images/destination.webp',
    'public/images/car-1769194982.webp',
    'public/images/1737478083.webp',
    'public/images/1737478144.webp',
    'public/images/1737478187.webp'
];

$widths = [480, 800, 1200];

foreach ($imagesToProcess as $imgPath) {
    if (!file_exists($imgPath)) {
        echo "File not found: $imgPath\n";
        continue;
    }

    $info = pathinfo($imgPath);
    $dir = $info['dirname'];
    $filename = $info['filename'];
    $extension = $info['extension'];
    
    // Original dimensions
    list($origW, $origH) = getimagesize($imgPath);

    foreach ($widths as $w) {
        if ($origW <= $w) continue; // Don't upscale
        
        $newFilename = "{$dir}/{$filename}-{$w}w.{$extension}";
        if (file_exists($newFilename)) continue;
        
        $h = intval(($origH / $origW) * $w);
        
        echo "Generating {$newFilename} ({$w}x{$h})...\n";
        
        if ($extension === 'webp') {
             $srcImg = imagecreatefromwebp($imgPath);
             $dstImg = imagecreatetruecolor($w, $h);
             
             // Preserve transparency
             imagealphablending($dstImg, false);
             imagesavealpha($dstImg, true);
             $transparent = imagecolorallocatealpha($dstImg, 255, 255, 255, 127);
             imagefilledrectangle($dstImg, 0, 0, $w, $h, $transparent);
             
             imagecopyresampled($dstImg, $srcImg, 0, 0, 0, 0, $w, $h, $origW, $origH);
             imagewebp($dstImg, $newFilename, 85); // High quality
             
             imagedestroy($srcImg);
             imagedestroy($dstImg);
        }
    }
}
echo "Responsive image generation complete.\n";
