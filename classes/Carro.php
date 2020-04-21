<?php
namespace Carro;

class Carro {

    //ATRIBUTOS
    public $cor; 
    public $motor; 
    public $marca;
    public $tamanho;
    public $pneus;
    
    //GET = PEGAR ALGUMA COISA
    //SET = Definir alguma coisa
    //AÇÕES => Métodos | Funções
    public function setMudarCor($novaCor) {
        $this->cor = $novaCor;
    }



}