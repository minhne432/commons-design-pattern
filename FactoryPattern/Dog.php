<?php

require_once './IAnimal.php';

class Dog implements IAnimal{
    public function makeSound(){
        return "Bark";
    }
}