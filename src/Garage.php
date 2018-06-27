<?php
class Garage
{
    private $colorStock;

    public function __construct(ColorStock $colorStock)
    {
        $this->colorStock = $colorStock;
    }

    public function paint(VehicleInterface $vehicle, string $colorName)
    {
        if ($vehicle instanceof ColorizableInterface) {

            $color = $this->colorStock->searchColorByName($colorName);
            if ($color !== null) {
                $vehicle->setColor($color);
            } else {
                throw new ColorNotAvailableException("Color not available");
            }

        } else {
            throw new VehicleNotAllowedException("Vehicle not allowed (not colorizable)");

        }
    }
    public function buyColor(Colorinterface $color)
    {
        $this->colorStock->addColor($color);
    }
    public function removeColor(ColorInterface $color)
    {
        $this->colorStock->removeColor($color);
    }
}
