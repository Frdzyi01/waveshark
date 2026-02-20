<?php
$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator("resources/views"));
$updatedFiles = 0;

foreach ($files as $file) {
    if ($file->isFile() && str_ends_with($file->getFilename(), ".blade.php")) {
        $path = $file->getPathname();
        $content = file_get_contents($path);

        $new = preg_replace('/([a-zA-Z0-9_\-]+)\.(jpg|jpeg|png)/i', '$1.webp', $content);

        if ($new !== $content) {
            file_put_contents($path, $new);
            echo "Updated WebP in file: {$path}\n";
            $updatedFiles++;
        }
    }
}
echo "Total files updated: $updatedFiles\n";
