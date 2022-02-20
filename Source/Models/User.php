<?php


namespace Source\Models;
use Source\Core\Model;

class User extends Model
{
    /** @var array $safe no update or create */
    protected static $safe = [
        'id',
        'created_at',
        'updated_at'
    ];
    /**
     * @var array $required table fields
     */
    protected static $required = [
        'first_name',
        'last_name', 'email',
        'password'
    ];

    /** @var string $entity database table */
    protected static $entity = 'users';

    /**
     * @return string
     */
    public  function bootstrap(string $first_name, string $last_name,
                               string $email, string $password,
                               string $document = null): ?User
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->document = $document;

        return $this;
    }

    public function  findById(int $id, string $columns = "*"): ?User
    {
        if (!$this->required()){
            return null;
        }
        return $this->find("id={$id}",$columns);
    }

    public function findByEmail($email, string $columns = "*"): ?User
    {
        return $this->find("id={$email}",$columns);
    }

    public function  find(string $params,  string $columns = "*",
                          string $operadorWhere = " AND " ): ?User {

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

    public function save(): ?User {

        if (!$this->required()){
                return $this->message->warning("Nome, sobrenome, email e senha");
            }
        /**
         * [
            "last_name" => "Sobrenome Obrigatório",
            "first_name" => "Nome é obrigatório"
         ]
         * #tagName é obrigatório;
         */

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
}