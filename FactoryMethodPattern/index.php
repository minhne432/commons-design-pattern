<?php

require_once './IProduct.php';
require_once './ConcreateProductA.php';
require_once './ICreator.php';
require_once './ConcreatorA.php';

require_once './ConcreateProductB.php';
require_once './ConcreatorB.php';


$creatorA = new ConcreatorA();

$productA = $creatorA->factoryMethod();

echo $productA->getName() . "\n";

$creatorB = new ConcreatorB();

$productB = $creatorB->factoryMethod();

echo $productB->getName();
