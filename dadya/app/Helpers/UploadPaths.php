<?php


namespace App\Helpers;


class UploadPaths
{
    public static $uploadPaths = array(
        'books_photos' => '/uploads/books'
    );

    public static function getUploadPath($path){
        return public_path().self::$uploadPaths[$path];
    }
}
