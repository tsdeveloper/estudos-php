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
}