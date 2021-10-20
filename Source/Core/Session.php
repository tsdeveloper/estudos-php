<?php


namespace Source\Core;


class Session
{
    public function __construct()
    {
        if (!session_id()) {
            session_save_path(CONFIG_SES_PATH);
            session_start();
        }
    }

    public function set(string $key, $value): Session {
        $_SESSION[$key] = (is_array($value) ? (object)$value : $value);
        return $this;
    }
}