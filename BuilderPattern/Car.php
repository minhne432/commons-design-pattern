<?php

class Car
{
    public $engine;
    public $seats;
    public $gps;

    public function showSpecification()
    {
        echo "Engine: $this->engine \n";
        echo "Seats: $this->seats \n";
        echo "GPS: $this->gps \n";
    }
}
