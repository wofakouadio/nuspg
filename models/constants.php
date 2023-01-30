<?php

    //function to sanitize and serialize input
    function SanitizeInput($data)
    {
        $data = trim($data);
        $data = htmlentities($data);
        $data = htmlspecialchars($data);
        $data = stripcslashes($data);
        $data = strtoupper($data);

        return $data;
    }



        // function to compress or reduce profile picture
    function ImageCompression($image_source, $image_compress){

        $image_info = getimagesize($image_source);
        if ($image_info["mime"] == "image/jpeg") {
            $image_source = imagecreatefromjpeg($image_source);
            imagejpeg($image_source, $image_compress, 35);
        } elseif ($image_info["mime"] == "image/png") {
            $image_source = imagecreatefrompng($image_source);
            imagepng($image_source, $image_compress, 6);
        } else {
            $image_source = imagecreatefromjpeg($image_source);
            imagejpeg($image_source, $image_compress, 35);
        }

        return $image_compress;

    }