<?php



class Car
{
  public $engine;
  public $seats;
  public $gps;

  public function showSpecifications()
  {
    echo "Engine: $this->engine \n";
    echo "Seats: $this->seats \n";
    echo "GPS: $this->gps \n";
  }
}

interface CarBuilder
{
  public function setEngine($engine);
  public function setSeats($seats);
  public function setGPS($gps);
  public function getCar();
}



class SportCarBuilder implements CarBuilder
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

  public function setGPS($gps)
  {
    $this->car->gps = $gps;
  }

  public function getCar()
  {
    return $this->car;
  }
}


class CarDirector
{
  private $builder;

  public function setBuilder(CarBuilder $builder)
  {
    $this->builder = $builder;
  }

  public function constructSprotsCar()
  {
    $this->builder->setEngine("V8");
    $this->builder->setSeats(2);
    $this->builder->setGPS("High-end-GPS");
  }

  public function constructFamilyCar()
  {
    $this->builder->setEngine("V6");
    $this->builder->setSeats(7);
    $this->builder->setGPS("Standard GPS");
  }
}



$sportsCardBuilder = new SportCarBuilder();

$director = new CarDirector();
$director->setBuilder($sportsCardBuilder);
$director->constructSprotsCar();

$sportCar = $sportsCardBuilder->getCar();
$sportCar->showSpecifications();
