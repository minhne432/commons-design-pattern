<?php

require './FAnimalFactory.php';

$factory = new AinalFactory();

try {

    $dog = $factory->createAnimal('dog');
    echo $dog->makeSound();

    $cat = $factory->createAnimal('cat');
    echo $cat->makeSound();
} catch (Exception $e) {
    echo $e->getMessage();
}
