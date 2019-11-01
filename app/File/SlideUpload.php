<?php

namespace App\File;

use App\File\ImageUpload;

class SlideUpload extends ImageUpload{
    /**
     * Path to upload logo
     * 
     * @var string
     */
    public $path = "storage/images/slider";
    
    public function __construct($fileName){
        $image = new Image($this->path, $fileName);
        $image->dontMakeWatermark();
        parent::__construct($image);
    }
}