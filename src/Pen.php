<?php
namespace Garage;

use Garage\Exception\ColorInterface;

class Pen implements ColorizableInterface//implémentation de l'interface pour dire que la classe respecte bien le contrat ColorizableInterface

{
    private $color;

    public function getColor(): ?ColorInterface
    {
        return $this->color;
    }
    public function setColor(ColorInterface $color): ColorizableInterface
    {
        $this->color = $color;
        return $this;
    }
}
