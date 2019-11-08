<?php

namespace App\File;

use App\File\Image;

class Logo{
    /**
     * Get list logo
     * 
     * @return array Logo
     */
    public function get(){
        return[
            new Image('storage/images/logo','logo-light', 117, 25),
            new Image('storage/images/logo', 'logo-dark', 117, 25),
            new Image('storage/images/logo', 'logo-small', 32, 18)
        ];
    }
}