<?php
namespace Garage;

use Garage\Colors\ColorInterface;

interface ColorizableInterface
{
    public function getColor(): ?ColorInterface; //typage en sortie ColorInterface ou null
    public function setColor(ColorInterface $color): ColorizableInterface; //typage en entrée ColorInterface et typage en sortie ColorizableInterface
}
