<?php
declare (strict_types = 1); //obligation de typage
//tous les includes concernés

include 'Exception/ColorAlreadyExistException.php';
include 'Exception/VehicleNotAllowedException.php';
include 'Exception/ColorNotAvailableException.php';
include 'VehicleInterface.php';
include "ColorizableInterface.php";
include "Colors/ColorInterface.php";
include 'Colors/Red.php';
include 'Colors/Green.php';
include 'Colors/Black.php';
include 'Colors/ColorStock.php';
include 'Car.php';
include 'Moto.php';
include 'Truck.php';
include 'Garage.php';

$colorStock = new ColorStock(); //instanciation d'une nouvelle palette de couleur
try {
    $colorStock->addColor(new Green); //ajout d'une couleur par instanciation d'une couleur (verte)
    $colorStock->addColor(new Green); //ajout d'une couleur par instanciation d'une couleur (verte)
    var_dump($colorStock);
} catch (ColorAlreadyExistException $e) {
    echo '<br>';
    echo 'ATTENTION :' . $e->getMessage();
}

$garage = new Garage($colorStock); //instanciation d'un nouveau garage qui possède cette nouvelle palette de couleur

$moto = new Moto($colorStock); //instanciation d'une moto colorisable avec la palette de couleur

try {

    $garage->paint($moto, "green"); //method du garage qui peint la moto avec la couleur demandée en param
    var_dump($moto);

    $car = new Car();
    $garage->paint($car, "green"); //method du garage qui peint la moto avec la couleur demandée en param
    var_dump($car);
    $truck = new Truck();
    $garage->paint($truck, "green"); //method du garage qui peint la moto avec la couleur demandée en param
    var_dump($truck);
} catch (VehicleNotAllowedException $e) {
    echo '<br/>';
    echo 'ERREUR !!!' . $e->getMessage();
} catch (ColorNotAvailableException $e) {
    echo '<br/>';
    echo 'Une erreur s\'est produite :' . $e->getMessage();
} finally {
    echo '<br/>FIN DU PROGRAMME';
}
