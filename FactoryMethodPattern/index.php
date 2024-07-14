<?php


interface IProduct
{
  public function getName();
}

interface ICreator
{
  public function factoryMethod(): IProduct;
}

class ConcreteProductA implements IProduct
{
  public function getName()
  {
    return "Product A \n";
  }
}

class ConcreteProductB implements IProduct
{
  public function getName()
  {
    return "Product B \n";
  }
}

class ConcreatorA implements ICreator
{
  public function factoryMethod(): IProduct
  {
    return new ConcreteProductA();
  }
}

class ConcreatorB implements ICreator
{
  public function factoryMethod(): IProduct
  {
    return new ConcreteProductB();
  }
}

$creatorA = new ConcreatorA();

$productA = $creatorA->factoryMethod();

echo $productA->getName();

$creatorB = new ConcreatorB();

$productB = $creatorB->factoryMethod();

echo $productB->getName();
