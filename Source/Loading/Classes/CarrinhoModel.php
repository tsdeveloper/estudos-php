<?php


namespace Source\Loading\Classes;


use http\Client\Curl\User;

class CarrinhoModel extends Model
{
    /** @var array $safe no update or create */
    protected static $safe = ['id', 'created_at', 'updated_at'];

    /** @var string $entity database table */
    protected static $entity = 'carts';

    /**
     * @return string
     */
    public  function &bootstrap($total, $product): ?CarrinhoModel
    {
        $this->total = $total;
        $this->produtos = [];
         $this->produtos =[$product];


        return $this;
    }

    public function  load(string $params,  string $columns = "*", string $operadorWhere = " AND " ): ?CarrinhoModel {


        parse_str($params, $strOptionWhere);

        $where = null;
        foreach ($strOptionWhere as $key => $value){

            if (empty($where)) {
                $where  = "{$key} = :{$key}";
            }else if(count($strOptionWhere) > 1)
                    $where  .= "{$operadorWhere} {$key} = :{$key}";
        }


            $load = $this->read("SELECT {$columns} FROM " . self::$entity .  " where {$where} 
            AND document = :document"
            ,$params);


            if ($this->fail() || !$load->rowCount()) {
                $this->message = "Usuário não encontrado para o id informado!";
                return null;
            }
          return  $load->fetchObject(__CLASS__);
    }

    public function find($email, string $columns = "*"): ?CarrinhoModel
    {
        $find = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE email = :email", "email={$email}");
        if ($this->fail() || !$find->rowCount()) {
            $this->message = "Usuário não encontrado para o email informado";
            return null;
        }
        return $find->fetchObject(__CLASS__);
    }

    public function getProducts() {

    }



}