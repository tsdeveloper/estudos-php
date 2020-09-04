<?php

namespace Source\Loading\Classes;

abstract class Model
{
    /** @var object|null */
    protected $data;

    /** @var \PDOException */
    protected $fail;

    /** @var string|null */
    protected $message;

    /** @return null|object */
    public function data(): ?object
    {
        return $this->data;
    }

    /** @return \PDOException */
    public function fail(): ?\PDOException
    {
        return $this->fail;
    }

    /** @return null|string */
    public function message(): ?string
    {
        return $this->message;
    }

    protected   function create() {}
    protected  function update() {}
    protected  function delete() {}
    protected  function read() {}
    protected  function safe(): ?array {}
    private  function filter() {}

}

