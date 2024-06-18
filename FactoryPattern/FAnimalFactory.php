<?php

require_once './Cat.php';
require_once './Dog.php';

class AinalFactory
{
    public function createAnimal($type)
    {
        if ($type == 'dog') {
            return new Dog();
        } elseif ($type == 'cat') {
            return new Cat();
        } else {
            throw new Exception("Animal type is not recognized");
        }
    }
}
