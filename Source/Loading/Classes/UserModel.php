<?php


namespace Source\Loading\Classes;


use http\Client\Curl\User;

class UserModel extends Model
{
    /** @var array $safe no update or create */
    protected static $safe = ['id', 'created_at', 'updated_at'];

    /** @var string $entity database table */
    protected static $entity = 'users';

    /**
     * @return string
     */
    public  function bootstrap($first_name, $last_name, $email, $document): ?UserModel
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->document = $document;

        return $this;
    }

    public function  load(string $params,  string $columns = "*", string $operadorWhere = " AND " ): ?UserModel {

        parse_str($params, $strOptionWhere);

        $where = null;
        foreach ($strOptionWhere as $key => $value){

            if (empty($where)) {
                $where  = "{$key} = :{$key}";
            }else if(count($strOptionWhere) > 1)
                    $where  .= "{$operadorWhere} {$key} = :{$key}";
        }
            $load = $this->read("SELECT {$columns} FROM " . self::$entity .  " where {$where}"
            ,$params);

            if ($this->fail() || !$load->rowCount()) {
                $this->message = "Usuário não encontrado para o id informado!";
                return null;
            }
          return  $load->fetchObject(__CLASS__);
    }

    public function find($email, string $columns = "*"): ?UserModel
    {
        $find = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE email = :email", "email={$email}");
        if ($this->fail() || !$find->rowCount()) {
            $this->message = "Usuário não encontrado para o email informado";
            return null;
        }
        return $find->fetchObject(__CLASS__);
    }

    public function save() {
        $this->safe();
    }




}