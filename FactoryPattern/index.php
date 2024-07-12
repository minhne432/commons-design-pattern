<?php

interface Animal
{
    public function makeSound();
}

class Dog implements Animal
{
    public function makeSound()
    {
        return "Bark \n";
    }
}

class Cat implements Animal
{
    public function makeSound()
    {
        return "Meww \n";
    }
}

class AnimalFactory
{
    public function createAnimal($type): Animal
    {
        if ($type == 'dog') {
            return new Dog();
        } elseif ($type = 'cat') {
            return new Cat();
        } else {
            throw new Exception("Animal type not reconized");
        }
    }
}

$factory = new AnimalFactory();

$dog = $factory->createAnimal('dog');

echo $dog->makeSound();

$cat = $factory->createAnimal('cat');

echo $cat->makeSound();
