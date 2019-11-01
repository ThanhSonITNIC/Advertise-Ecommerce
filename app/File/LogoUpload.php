<?php

namespace App\File;

use App\File\ImageUpload;
use App\File\Image;

class LogoUpload extends ImageUpload{
    /**
     * Path to upload logo
     * 
     * @var string
     */
    public $path = "storage/images/logo";
    
    public function __construct($fileName){
        $image = new Image($this->path, $fileName);
        $image->dontMakeWatermark();
        parent::__construct($image);
    }
}