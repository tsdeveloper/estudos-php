<?php


namespace Source\Loading\Loading;


interface CrudBase
{
    public function create();
    public function update();
    public function ready();
    public function delete();
}
