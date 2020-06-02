<?php

namespace Source\Loading\Classes;
use Source\Loading\Interfaces\ICrudBase;
use Source\Loading\Interfaces\IFuncionario;

class Funcionario implements ICrudBase, IFuncionario {
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
   
    //INTERFACE = CONTRATO
    //CRUD = Create (CRIAR), READY (BUSCAR/SELECIONAR), UPDATE (ATUALIZAR) e DELETE (APAGAR/EXCLUIR)

    public function create()
    {
        echo 'Cadastrando funcionário';
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

    public function nomeDoBancoDeDados()
    {
        // TODO: Implement nomeDoBancoDeDados() method.
    }

    public function obterCPF()
    {
        // TODO: Implement obterCPF() method.
        return $this->cpf;
    }
}

