<?php

class CarDirector
{
    private $builder;

    public function setBuilder(ICarBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function constructSportsCar()
    {
        $this->builder->setEngine("V8");
        $this->builder->setSeats(2);
        $this->builder->setGps("High-end GPS");
    }

    public function constructFamilyCar()
    {
        $this->builder->setEngine("V6");
        $this->builder->setSeats(5);
        $this->builder->setGps("Standard GPS");
    }
}
