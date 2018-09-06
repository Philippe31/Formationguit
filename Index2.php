<?php

include "vendor/autoload.php";

use Garage\Car;
use Garage\Colors\ColorStock;
use Garage\Colors\Red;
use Garage\Exception\ColorAlreadyExistException;
use Garage\Garage;

try {
    $colorStock = new ColorStock();
    $colorStock->addColor(new Red());
    dump($colorStock);

    $garage = new Garage($colorStock);
    dump($garage);
    $car = new Car();

    $garage->paint($car, 'Red');
    dump($car);

} catch (ColorAlreadyExistException $e) {
    echo $e->getMessage();
} catch (ColorAlreadyExistException $e) {
    echo $e->getMessage();
} catch (VehicleNotAllowedException $e) {
    echo $e->getMessage();
}
