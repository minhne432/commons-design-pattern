<?php

require_once './IAnimal.php';

class Cat implements IAnimal{
    public function makeSound(){
        return "Meow";
    }
}