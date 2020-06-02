<?php


namespace Source\Loading\Loading\Classes;


use Source\Loading\Interfaces\ICrudBase;

class Post implements ICrudBase
{

    private $pdo;
    private $dataCreated;
    private $userName;
    private $msg;

    public function __construct($pdo)
    {

        $this->pdo = $pdo;
    }

    public function create()
    {
        try {

            $data = [
                'dataCreated' => $this->getDataCreated(),
                'userName' => $this->getUserName(),
                'msg' => $this->getMsg(),
            ];
            // TODO: Implement create() method.
            $sql = 'INSERT INTO message (dataCreated, userName, msg) values (:dataCreated, :userName, :msg)';

            $this->pdo->prepare($sql)->execute($data);

        } catch (PDOException $exception) {
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
