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

    /**
     * @param string $terms
     * @param string $params
     * @param string $columns
     * @return null|User
     */
    public function find(string $terms, string $params, string $columns = "*"): ?User
    {
        $find = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE {$terms}", $params);
        if ($this->fail() || !$find->rowCount()) {
            return null;
        }
        return $find->fetchObject(__CLASS__);
    }

  public function all(int $limit = 30, int $offset = 0, string $columns = "*"): ?array
    {
        $all = $this->read("SELECT {$columns} FROM " . self::$entity .
            " LIMIT :limit OFFSET :offset",
            "limit={$limit}&offset={$offset}");

        return $all->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    /**
     * @param int $id
     * @param string $columns
     * @return null|User
     */
    public function findById(int $id, string $columns = "*"): ?User
    {
        return $this->find("id = :id", "id={$id}", $columns);
    }

    /**
     * @param $email
     * @param string $columns
     * @return null|User
     */
    public function findByEmail($email, string $columns = "*"): ?User
    {
        return $this->find("email = :email", "email={$email}", $columns);
    }

    public function save(): ?User {

        if (!$this->required()){
                $this->message->warning("Nome, sobrenome, email e senha");
                return null;
            }
       //Update User
        if (!empty($this->id)){
            $userId=  $this->id;

            if ($this->find("email = :e AND id != :i", "e={$this->email}&i={$this->id}")){
                $this->message->warning("O e-mail informado já está cadastrado");
                return null;
            }

            $this->update(self::$entity, $this->safe(), "id = :id", "id={$userId}" );
            if ($this->fail()){
                $this->message->error("Erro ao atualizar {$this->email}, verifique os dados");
                return null;
            }

            $this->message->success("Usuário com email: {$this->email} foi atualizado com sucesso!");
        }
         //Create User
         if (empty($this->id)){
             if ($this->findByEmail($this->email)){
                 $this->message->warning("O e-mail informado já está cadastrado");
                 return null;
             }
             $userId = $this->create(self::$entity,$this->safe());
             if ($this->fail()) {
                 $this->message->error("Erro ao cadastrar, verifique os dados");
                 return null;
             }

         }

        $this->data = ($this->findById($userId))->data();
        return $this;
    }

    public function destroy() {

        if (!empty($this->email)){
         $this->delete(self::$entity, "email = :email", "email={$this->email}");

            if ($this->fail()){
                $this->message->error("Erro ao deletar o {$this->email}, verifique os dados");
                return null;
            }
        }

        $this->message->success("Usuário com email: {$this->email} foi deletado com sucesso!");
        $this->data = null;
        return $this;

    }
}