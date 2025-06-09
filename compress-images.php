<?php
// Script to compress and resize video-thumb.png

// Output information about source file
$source_file = 'video-thumb.png';
$source_size = filesize($source_file);
$source_info = getimagesize($source_file);

// Define target dimensions (80% of original)
$width = isset($source_info[0]) ? intval($source_info[0] * 0.8) : 800;
$height = isset($source_info[1]) ? intval($source_info[1] * 0.8) : 600;

// Load source image
$source = imagecreatefrompng($source_file);

// Create target image
$target = imagecreatetruecolor($width, $height);

// Preserve transparency
imagecolortransparent($target, imagecolorallocate($target, 0, 0, 0));
imagealphablending($target, false);
imagesavealpha($target, true);

// Resize the image
imagecopyresampled($target, $source, 0, 0, 0, 0, $width, $height, $source_info[0], $source_info[1]);

// Save as video-thumb-optimized.png with higher compression
$target_file = 'video-thumb-optimized.png';
imagepng($target, $target_file, 8); // Compress with level 8 (0-9, 9 being highest compression)

// Output information about target file
$target_size = filesize($target_file);
$target_info = getimagesize($target_file);

// Output stats
echo "Original: " . $source_info[0] . "x" . $source_info[1] . ", " . round($source_size / 1024) . " KB\n";
echo "Optimized: " . $target_info[0] . "x" . $target_info[1] . ", " . round($target_size / 1024) . " KB\n";
echo "Reduction: " . round(100 - ($target_size / $source_size * 100)) . "%\n";

imagedestroy($source);
imagedestroy($target);
?> 