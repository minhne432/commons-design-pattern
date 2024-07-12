<?php

interface IAbstractFactory
{
    public function createProductA(): IProductA;
    public function createProductB(): IProductB;
}

interface IProductA
{
    public function getName();
}

interface IProductB
{
    public function getName();
}

class concreteFactory1 implements IAbstractFactory
{

    public function createProductA(): IProductA
    {
        return new ConcreteProductA1();
    }

    public function createProductB(): IProductB
    {
        return new ConcreteProductB1();
    }
}

class ConcreteProductA1 implements IProductA
{
    public function getName()
    {
        return "Product A1 \n";
    }
}

class ConcreteProductB1 implements IProductB
{
    public function getName()
    {
        return "Product B1 \n";
    }
}


$factory  = new concreteFactory1();

$productA = $factory->createProductA();
$productB = $factory->createProductB();

echo $productA->getName();
echo $productB->getName();
