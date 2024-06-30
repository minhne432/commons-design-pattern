<?php

class ConcreatorA implements ICreator
{
    public function factoryMethod(): IProduct
    {
        return new ConcreateProductA();
    }
}
