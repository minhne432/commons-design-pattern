<?php

class ConcreatorB implements ICreator
{
    public function factoryMethod(): IProduct
    {
        return new ConcreateProductB();
    }
}
