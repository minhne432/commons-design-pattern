<?php


interface ICarBuilder
{
    public function setEngine($engine);
    public function setSeats($seats);
    public function setGps($gps);
    public function getCar();
}
