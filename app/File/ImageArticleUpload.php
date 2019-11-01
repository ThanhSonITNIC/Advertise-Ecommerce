<?php

namespace App\File;

use App\File\ImageUpload;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use File;
use App\File\Image;

class ImageArticleUpload extends ImageUpload{
    /**
     * Path to upload post
     * 
     * @var string
     */
    public $path = "storage/images/article";

    /**
     * Rename file upload
     * 
     * @var string
     */
    public $fileName;

    /**
     * Width size
     */
    public $width;

    /**
     * Height size
     */
    public $height;

    public function __construct(){
        // custom path
        $this->path = Str::finish($this->path, '/');
        $this->path .= $now = Carbon::now()->format('Y/m');

        // custom file name
        $this->fileName = Str::random(20);

        $image = new Image($this->path, $this->fileName);
        $image->dontMakeWatermark();
        $image->size($this->width, $this->height);
        parent::__construct($image);
    }

    /**
     * Upload file
     * 
     * @param UploadedFile $file
     * 
     * @return json path file
     */
    public function upload(UploadedFile $file){
        return parent::upload($file);
    }
    
}