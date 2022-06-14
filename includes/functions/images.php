<?php

function i($filename, $size = "default", $format = "webp")
{

    $sizes = [
        "small" => 340,
        "medium" => 640,
        "large" => 1024,
        "xlarge" => 1600,
        "default" => 0
    ];

    $input = "./src/img/$filename";
    $hashfile = hash_file('sha256', $input);
    $outputname = "/static/img/@{$sizes[$size]}__{$hashfile}.$format";

    if (!file_exists('/static/img/')) {
        mkdir('/static/img/', 0777, true);
    }

    if (!file_exists($outputname)) {
        $info = getimagesize($input);

        if ($info['mime'] == 'image/jpeg')
            $image = imagecreatefromjpeg($input);

        elseif ($info['mime'] == 'image/gif')
            $image = imagecreatefromgif($input);

        elseif ($info['mime'] == 'image/png')
            $image = imagecreatefrompng($input);

        // resize image with given width size
        $width = imagesx($image);
        $height = imagesy($image);

        if ($size == "default") {
            $new_width = imagesx($image);
            $new_height = imagesy($image);
        } else {
            $new_width = $sizes[$size];
            $new_height = ($new_width / $width) * $height;
        }

        $new_image = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

        // save image with given quality
        if ($format == "webp") {
            imagewebp($new_image, $outputname, 80);
        } else if ($format == "png") {
            copy($input, $outputname);
        }
    }

    return $outputname;
}
