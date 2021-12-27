<?php

$sizes = [
    "small" => 340,
    "medium" => 640,
    "large" => 1024,
    "xlarge" => 1600
];

$filename = $_GET['url'];
$input = "./src/img/$filename";
$size = $_GET['size'];
$outputname = "./static/img/@{$sizes[$size]}__{$filename}.jpg";

if (!file_exists($outputname)) {   
    $info = getimagesize($input);

    if ($info['mime'] == 'image/jpeg') 
        $image = imagecreatefromjpeg($input);

    elseif ($info['mime'] == 'image/gif') 
        $image = imagecreatefromgif($input);

    elseif ($info['mime'] == 'image/png') 
        $image = imagecreatefrompng($input);

    // resize image with given height size
    $width = imagesx($image);
    $height = imagesy($image);
    
    $new_height = $sizes[$size];
    $new_width = ($new_height / $height) * $width;

    $new_image = imagecreatetruecolor($new_width, $new_height);
    imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    // save image with given quality
    imagejpeg($new_image, $outputname, 85);
}

header("location: $outputname");