<?php
class Green implements ColorInterface //implémentation de l'interface pour dire que la classe respecte bien le contrat ColorInterface
{
    private $name = "Green";
    private $hexaCode = "#00ff00";

    public function getName(): string//typage de sortie en string
    {
        return $this->name;
    }
    public function getHexaCode(): string//typage de sortie en string
    {
        return $this->hexaCode;
    }
}
