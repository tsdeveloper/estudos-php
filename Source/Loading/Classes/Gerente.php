<?php

namespace Source\Loading\Classes;

class Gerente extends Funcionario{
    

    public function mostrarCPF() {

        return $this->cpf;
    }

    public function calcularBonificacao() {
        return $this->salario * 0.10;
    }

}