<?php

namespace App\Http\Controllers\Upload;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\File\ImagePostUpload;
use App\File\ImageArticleUpload;
use App\File\LogoUpload;
use App\File\BannerUpload;
use App\Http\Requests\ImageUploadRequest;

class ImagesController extends Controller
{
    public function post(ImageUploadRequest $request){
        return (new ImagePostUpload())->upload($request->file()['upload']);
    }

    public function article(ImageUploadRequest $request){
        return (new ImageArticleUpload())->upload($request->file()['upload']);
    }

    public function logo(ImageUploadRequest $request){
        return (new LogoUpload($request->name))->upload($request->file()['upload']);
    }

    public function banner(ImageUploadRequest $request){
        return (new BannerUpload($request->name))->upload($request->file()['upload']);
    }
}
