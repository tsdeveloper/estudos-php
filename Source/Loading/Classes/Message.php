<?php


namespace Source\Loading\Classes;


use PDO;
use PDOException;
use Source\Loading\Interfaces\ICrudBase;

class Message implements ICrudBase
{

    private $pdo;
    private $dataCreated;
    private $userName;
    private $msg;
    private $postAll = [];

    public function __construct($pdo)
    {

        $this->pdo = $pdo;
    }

    public function create()
    {
        try {

            $data = [
                'dataCreated' => date("Y-m-d H:i:s"),
                'userName' => 'Developer - ' . date("Y-m-d H:i:s"),
                'msg' => 'Testes Msg',
            ];
            $this->pdo->beginTransaction();

            // TODO: Implement create() method.
            $this->pdo->query("INSERT INTO message (dataCreated, userName, msg45) values ('{$data['dataCreated']}', '{$data['userName']}', '{$data['msg']}')");

            $messageId = $this->pdo->lastInsertId();
            $this->pdo->query("INSERT INTO message (dataCreated, userName, msg331) values ('{$data['dataCreated']}', '{$data['userName']}', '{$data['msg']}')");

//            $this->pdo->prepare($sql)->execute($data);
            $this->pdo->commit();
        } catch (PDOException $exception) {
            $this->pdo->rollback();
            var_dump($exception);
        }


    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function ready()
    {
        // TODO: Implement ready() method.
        try {

            // TODO: Implement create() method.
            $sql = 'SELECT * FROM  message';

            $stm = $this->pdo->query($sql);
            $result = $stm->fetchAll();
//            var_dump($result);

            return $result;
        } catch (PDOException $exception) {
            var_dump($exception);
        }

    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    /**
     * @return mixed
     */
    public function getDataCreated()
    {
        $this->dataCreated = date("Y-m-d H:i:s");
        return $this->dataCreated;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * @param mixed $msg
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;
    }
}
