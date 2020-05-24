<?php


namespace Source\Loading\Interfaces;


interface ICrudBase
{
    public function create();
    public function update();
    public function ready();
    public function delete();

}
