<?php


namespace Source\Core;


class Message
{

    private  $text;
    private  $type;

   public function __toString()
   {
      return $this->render();
   }

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
        $this->type = CONFIG_MESSAGE_SUCCESS;
        $this->text = $this->filter($message);
        return $this;
    }

    public function warning(string $message): Message
    {
        $this->type = CONFIG_MESSAGE_WARNING;
        $this->text = $this->filter($message);
        return $this;
    }

    public function info(string $message): Message
    {
        $this->type = CONFIG_MESSAGE_INFO;
        $this->text = $this->filter($message);
        return $this;
    }

    public function error(string $message): Message
    {
        $this->type = CONFIG_MESSAGE_ERROR;
        $this->text = $this->filter($message);
        return $this;
    }

    public function render(): string
    {
        return "<div class='" . CONFIG_MESSAGE_CLASS . " {$this->getType()}'>{$this->getText()}</div>";
    }

    public function json(): string
    {
        return json_encode(
            [
            $this->getType() => $this->getText()
        ]);
    }

    public function flash(string $key): void
    {
        (new Session())->set($key, $this);

    }

    private function filter(string $message): string
    {
        return filter_var($message, FILTER_SANITIZE_SPECIAL_CHARS);
    }


}