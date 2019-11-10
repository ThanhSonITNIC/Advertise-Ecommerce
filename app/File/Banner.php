<?php

namespace App\File;

use App\File\Image;

class Banner{
    /**
     * Get list logo
     * 
     * @return array Logo
     */
    public function get(){
        return[
            new Image('storage/images/banner','banner_img', 854, 709),
        ];
    }
}