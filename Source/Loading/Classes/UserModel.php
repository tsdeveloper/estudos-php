<?php


namespace Source\Loading\Classes;


class UserModel extends Model
{
    /** @var array $safe no update or create */
    protected static $safe = ['id', 'created_at', 'updated_at'];

    /** @var string $entity database table */
    protected static $entity = 'users';

    public function  bootstrap() {}

    public function  load(int $id,  string $columns = "*" ) {
            $load = $this->read("SELECT {$columns} FROM " . self::$entity .  " where id = :id"
                                                                                ,"id={$id}");
            if ($this->fail() || !$load->rowCount()) {
                $this->message = "Usuário não encontrado para o id informado!";
                return null;
            }

//            return $load->fetchObject(__CLASS__);
            return $load->fetch();
    }

    public function  find($email) {}
    public function  all($limit = 30, $offset = 0) {}
    public function  save() {}
    public function  destroy() {}
    public function  required() {}

}