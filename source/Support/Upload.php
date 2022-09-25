<?php

namespace source\Support;

use CoffeeCode\Uploader\File;
use CoffeeCode\Uploader\Image;
use CoffeeCode\Uploader\Media;
use source\Core\Message;

class Upload
{

    private $message;

    public function __construct()
    {
        $this->message = new Message();
    }

    public function message(): Message
    {
        return $this->message;
    }
//Tamanho que vai ser enviado: 10GB
//Tipos de arquivos permitidos:
    public function image(array $image, string $name, int $width = CONF_IMAGE_SIZE)
    {
        $upload = new Image(CONF_UPLOAD_DIR, CONF_UPLOAD_IMAGE_DIR);

        if (empty($image['type']) || !in_array($image['type'], $upload::isAllowed())) {
            $this->message->error("Você não selecionou uma imagem válida");
            return null;
        }

        return $upload->upload($image, $name, $width, CONF_IMAGE_QUALITY);
    }
}