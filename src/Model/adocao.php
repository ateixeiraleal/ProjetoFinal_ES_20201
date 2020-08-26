<?php

class Adocao{
    private $id;
    private $data;
    private $pet;
    private $doador;
    private $adotante;

    function __construct($pet, $doador, $adotante) {
        $this->data = md5(time());
        $this->pet = $pet;
        $this->doador = $doador;
        $this->adotante = $adotante;
    }

    function getID(){
        return $this->id;
    }

    function getdata() {
        return $this->data;
    }

    function getPet() {
        return $this->pet;
    }

    function getDoador() {
        return $this->doador;
    }

    function getAdotante() {
        return $this->adotante;
    }
}

?>