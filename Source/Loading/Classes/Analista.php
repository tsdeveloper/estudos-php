<?php

namespace Source\Loading\Classes;

class Analista extends Funcionario{


    public function calcularBonificacao() {
        $this->cpf = "9999999";
        return $this->salario * 0.30;
    }
}