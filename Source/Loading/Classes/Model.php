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

    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        if (empty($this->data)) {
            $this->data = new \stdClass();
        }

        if (is_array($value) && !empty($value)){
            $this->data->$name = [$value];
        }else {
            $this->data->$name = $value;
        }
    }

    public function __get($name)
    {
        return ($this->data->$name ?? null);
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

    protected function create(string $entity, array $data)
    {
    }

    protected function update()
    {
    }

    protected function delete()
    {
    }

    protected function read(string $select, string $params = null): ?\PDOStatement
    {
        try {

            parse_str($params, $strOptionWhere);

            $where = null;
            foreach ($strOptionWhere as $key => $value){

                if (empty($where)) {
                    $where  = "{$key} = :{$key}";
                }else if(count($strOptionWhere) > 1)
                    $where  .= "{$operadorWhere} {$key} = :{$key}";
            }

            $stm = Connect::getInstance()->prepare($select);

            if ($params) {

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

    /*Método para trazer somente colunas que não autogerenciadas pelo
    Banco de Dados*/
    protected function safe()
    {
        $safe = (array)$this->data;
        foreach (static::$safe as $unset) {
            var_dump($unset);
        }
        var_dump($safe);
    }

    private function filter()
    {
    }

}

