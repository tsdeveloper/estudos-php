<?php

namespace Source\Loading;

class Funcionario {
    protected $nome;
    protected $cpf;
    public $salario;

    public function __construct($nome, $cpf, $salario) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->salario = $salario;
    }
    public function calcularBonificacao() {
            return $this->salario * 0.10;
    }

    public function mostrarNome() {
        return $this->nome;
    }

    public function mostrarCPF() {
        return $this->cpf;
    }

    //INTERFACE = CONTRATO
    //CRUD = Create (CRIAR), READY (BUSCAR/SELECIONAR), UPDATE (ATUALIZAR) e DELETE (APAGAR/EXCLUIR)

}

