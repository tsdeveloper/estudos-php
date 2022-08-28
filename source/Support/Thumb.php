<?php


namespace source\Support;


use CoffeeCode\Cropper\Cropper;

class Thumb
{
    private $scropper;
    private $uploads;

    public function __construct()
    {
        $this->scropper = new Cropper(CONF_IMAGE_CACHE, CONF_IMAGE_QUALITY['jpg'], CONF_IMAGE_QUALITY['png']);
    }

}

//Imagem 12MB -> cobrado+
//Imagem 400kb~500kb 80% -> cobrado+
