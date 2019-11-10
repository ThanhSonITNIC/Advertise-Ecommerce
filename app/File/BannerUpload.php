<?php

namespace App\File;

use App\File\ImageUpload;
use App\File\Image;

class BannerUpload extends ImageUpload{
    /**
     * Path to upload banner
     * 
     * @var string
     */
    public $path = "storage/images/banner";
    
    public function __construct($fileName){
        $image = new Image($this->path, $fileName);
        $image->dontMakeWatermark();
        parent::__construct($image);
    }
}