<?php
namespace Source\Inheritance\Address;

class Address {

private $street;
private $number;
private $complement;

    public function __construct($street, $number, $complement = null){
        $this->street = $street;
        $this->number = $number;
        $this->complement = $complement;
        
    }
}