<?php

require_once './Car.php';
require_once './CarDirector.php';
require_once './ICarBuilder.php';
require_once './sportsCarBuilder.php';

$director = new CarDirector();

$sportsCarBuilder = new sportsCarBuilder();

$director->setBuilder($sportsCarBuilder);

$director->constructSportsCar();

$sportsCar = $sportsCarBuilder->getCar();

$sportsCar->showSpecification();
