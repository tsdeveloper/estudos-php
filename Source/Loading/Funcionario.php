<?php

namespace Source\Loading;

class Funcionario {
    protected $nome;
    private $cpf;
    public $salario;

    public function __construct($nome, $cpf, $salario) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->salario = $salario;
    }
     private function calcularBonificacao() {
            return $this->salario * 0.10;
    }

    public function mostrarNome() {
        return $this->nome;
    }

    public function mostrarCPF() {
        return $this->nome;
    }
    
}