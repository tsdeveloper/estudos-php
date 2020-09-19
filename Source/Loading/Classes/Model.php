<?php

namespace Source\Loading\Classes;

use Source\Loading\Database\Connect;

abstract class Model
{
    /** @var object|null */
    protected $data;

    /** @var \PDOException */
    protected $fail;

    /** @var string|null */
    protected $message;

    public function  __set($name, $value)
    {
        // TODO: Implement __set() method.
        if (empty($this->data)) {
            $this->data = new \stdClass();
        }

        $this->data->$name = $value;
    }

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

    protected  function read(string $select, string $params = null) {
            try {

                $stm = Connect::getInstance()->prepare($select);
                if ($params)
                {
                    /*vai converter a string $params em um array
                    $params = "id=7"

                     $params = [
                        "id" => 7
                    ]
                    */
                    echo '$params antes da conversão';

                    parse_str($params, $params);

                    echo '$params depois da conversão';


                    foreach ($params as $key => $value) {

                        $type = (is_numeric($value) ? \PDO::PARAM_INT : \PDO::PARAM_STR);

                        $stm->bindValue(":{$key}", $value, $type);
                    }
                }

                $stm->execute();
                return $stm;

            } catch (\PDOException $exception) {
                $this->fail = $exception;
                return null;
            }
    }

    protected  function safe(): ?array {}
    private  function filter() {}

}

