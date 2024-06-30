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

class ConcreateFactory1 implements IAbstractFactory
{
    public function createProductA(): IProductA
    {
        return new ConcreateProductA1();
    }

    public function createProductB(): IProductB
    {
        return new ConcreateProductB1();
    }
}

class ConcreateProductA1 implements IProductA
{
    public function getName()
    {
        return 'Product A1' . "\n";
    }
}

class ConcreateProductB1 implements IProductB
{
    public function getName()
    {
        return 'Product B1' . "\n";
    }
}

$factory1 = new ConcreateFactory1();

$productA = $factory1->createProductA();
$productB = $factory1->createProductB();

echo $productA->getName();
echo $productB->getName();
