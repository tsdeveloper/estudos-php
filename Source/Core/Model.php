<?php

namespace Source\Core;

abstract class Model
{
    /** @var object|null */
    protected $data;

    /** @var \PDOException */
    protected $fail;

    /** @var Message|null */
    protected $message;

    public function __construct()
    {
        $this->message = new Message();
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        if (empty($this->data)) {
            $this->data = new \stdClass();
        }

        $this->data->$name = $value;
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data->$name);
    }

    /**
     * @param $name
     * @return null
     */
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

    /** @return Message/null */
    public function message(): ?Message
    {
        return $this->message;
    }

    protected function create(string $entity, array $data)
    {
        try {
            $columns = implode(", ", array_keys($data));
            $values = ":" . implode(", :", array_keys($data));

            $stmt = Connect::getInstance()->prepare("INSERT INTO {$entity} ({$columns}) VALUES ({$values})");
            $stmt->execute($this->filter($data));

            return Connect::getInstance()->lastInsertId();
        } catch (\PDOException $exception) {
            $this->fail = $exception;

            return null;
        }
    }

    protected function update(string $entity, array $data, string $terms, string $params)
    {
        try {
            $listColums = [];
            foreach ($data as $col => $value) {
                $listColums[] = "{$col} = :{$col}";
            }
            $listColums = implode(", ", $listColums);

            echo '<p>Dados do Array sem alteração</p>';
            var_dump($data);

            $stmt = Connect::getInstance()->prepare("UPDATE {$entity} SET {$listColums} WHERE {$terms}");
            parse_str($params, $params);
            echo '<p>Parametro convertido para array</p>';
            var_dump($params);


            echo '<p>Juntando o array com os dados usuário + id do usuário</p>';

            $stmt->execute($this->filter(array_merge($data, $params)));

            return ($stmt->rowCount() ?? 1);

        } catch (\PDOException $exception) {
            $this->fail = $exception;
            return null;
        }
    }

    protected function delete(string $entity, string $terms, string $params): ?int
    {
        try {
            $query = "DELETE FROM {$entity} WHERE {$terms}";
            $stmt = Connect::getInstance()->prepare($query);
            parse_str($params, $params);
            $stmt->execute($params);
            return ($stmt->rowCount() ?? 1);
        } catch (\PDOException $exception) {
            $this->fail = $exception;
            return null;
        }
    }

    protected function read(string $select, string $params = null): ?\PDOStatement
    {
        try {
            $stmt = Connect::getInstance()->prepare($select);
            if ($params) {
                parse_str($params, $params);
                foreach ($params as $key => $value) {
                    $type = (is_numeric($value) ? \PDO::PARAM_INT : \PDO::PARAM_STR);
                    $stmt->bindValue(":{$key}", $value, $type);
                }
            }

            $stmt->execute();
            return $stmt;
        } catch (\PDOException $exception) {
            $this->fail = $exception;
            return null;
        }
    }

    /*Método para trazer somente colunas que não autogerenciadas pelo
    Banco de Dados*/
    protected function safe(): ?array
    {
        $safe = (array)$this->data;
        foreach (static::$safe as $unset) {
            unset($safe[$unset]);
        }
        return $safe;
    }

    /**
     * @param array $data
     * @return array|null
     */
    protected function filter(array $data): ?array
    {
        $filter = [];
        foreach ($data as $key => $value) {
            $filter[$key] = (is_null($value) ? null : filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS));
        }

        return $filter;
    }

    /**
     * @return bool
     */
    protected function required(): bool
    {
        $valor1 = static::$is_admin;
        $data = (array)$this->data();
        foreach (static::$required as $field) {
            if (empty($data[$field])) {
                return false;
            }
            return true;
        }


    }

}

