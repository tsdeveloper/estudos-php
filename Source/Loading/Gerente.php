<?php

namespace Source\Loading;

class Gerente extends Funcionario{
    
        
    public function calcularBonificacao() {
        $this->cpf = "9999999";
        return $this->salario * 0.20;
    }
}