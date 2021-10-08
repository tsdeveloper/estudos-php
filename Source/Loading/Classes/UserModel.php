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

    public function save(): ?UserModel {

        if (!$this->required()){
                return null;
            }

       //Update User
        if (!empty($this->id)){
            $userId=  $this->id;
            $email = $this->read("SELECT id FROM users WHERE email = :email AND id != :id",
                        "email={$this->email}&id={$userId}");
            if ($email->rowCount()){
                $this->message = "O e-mail informado já está cadastrado";
                return null;
            }

            $this->update(self::$entity, $this->safe(), "id = :id", "id={$userId}" );
            if ($this->fail()){
                $this->message = "Erro ao atualizar {$this->email}, verifique os dados";
                return null;
            }

            $this->message = "Usuário com email: {$this->email} foi atualizado com sucesso!";


        }
         //Create User
         if (empty($this->id)){
             if ($this->find($this->email)){
                 $this->message = "O e-mail informado já está cadastrado";
                 return null;
             }
             $userId = $this->create(self::$entity,$this->safe());
             if ($this->fail()) {
                 $this->message = "Erro ao cadastrar, verifique os dados";
             }
             $this->message = "Cadastro realizado com sucesso";
         }

        $this->data = $this->read("SELECT * FROM users WHERE id = :id", "id={$userId}")->fetch();
        return $this;
    }
    public function destroy() {

        if (!empty($this->email)){
         $this->delete(self::$entity, "email = :email", "email={$this->email}");

            if ($this->fail()){
                $this->message = "Erro ao deletar o {$this->email}, verifique os dados";
                return null;
            }
        }

        $this->message = "Usuário com email: {$this->email} foi deletado com sucesso!";
        $this->data = null;
        return $this;

    }

    private function required(): bool {
        if (empty($this->first_name) || empty($this->last_name)
            || empty($this->email)){
            $this->message = "Nome, sobrenome e e-email são obrigatórios";
            return false;
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $this->message = "O e-email informado não parece válido";
            return false;
        }

        return true;
    }





}