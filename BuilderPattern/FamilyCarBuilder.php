<?php

class FamilyCarBuilder implements ICarBuilder
{
    private $car;

    public function __construct()
    {
        $this->car = new Car();
    }

    public function setEngine($engine)
    {
        $this->car->engine = $engine;
    }

    public function setSeats($seats)
    {
        $this->car->seats = $seats;
    }

    public function setGps($gps)
    {
        $this->car->gps = $gps;
    }

    public function getCar()
    {
        return $this->car;
    }
}
