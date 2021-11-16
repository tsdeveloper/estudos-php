<?php


namespace Source\Core;


class Message
{

    private  $text;
    private  $type;

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    public function success(string $message): Message
    {
        $this->type = CONFIG_MESSAGE_CLASS_SUCCESS;
        $this->text = $this->filter($message);
        return $this;
    }

    private function filter(string $message): string {
        return filter_var($message, FILTER_SANITIZE_SPECIAL_CHARS);
    }


}