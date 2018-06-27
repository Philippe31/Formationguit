<?php
namespace Garage\Colors;

use Garage\Exception\ColorAlreadyExistException;

class ColorStock//catalogue de couleurs possibles

{
    private $colors = []; //sous forme de tableau en mode privée

// on ajoute une couleur en vérifiant que cette dernière respecte le contrat ColorInterface (soit un nom et un hexacode)
    // et un typage de sortie ColorStock
    public function addColor(ColorInterface $color): ColorStock
    {
        if (!in_array($color, $this->colors)) { //vérif si la couleur existe déjà, si non, on la rajoute
            $this->colors[] = $color;
        } else {
            throw new ColorAlreadyExistException("Color already exist");
        }
        return $this;
    }
    //methode pour enlever un couleur qui existe déjà
    public function removeColor(ColorInterface $color): ColorStock
    {
        if (in_array($color, $this->colors)) {
            $key = array_search($color, $this->colors); //recherche par clé dans le tableau
            unset($this->colors[$key]); //suppression de la couleur grâce au mot clé
        }
        return $this;
    }

    //compte le nombre de couleur dans le tableau avec sortie en integer
    public function getColorsCount(): int
    {
        return count($this->colors);
    }

    //retourne la classe de l'objet selon le nom de la couleur (entrée en string et sortie en ColorInterface)
    public function getColor(string $color): ?ColorInterface
    {
        foreach ($this->colors as $colorObject) {
            //if($colorObject instanceof $color){
            if (get_class($colorObject) == $color) {
                return $colorObject;
            }
        }
    }

    //recherche d'une couleur par nom sortie en ColorInterface ou null
    public function searchColorByName($name): ?ColorInterface
    {
        foreach ($this->colors as $value) {
            if (strtolower($value->getName()) == strtolower($name)) {
                return $value;
            }
        }
        return null;
    }

    //recherche d'une couleur par hexacode sortie en ColorInterface ou null
    public function searchColorByHexaCode($hexacode): ?ColorInterface
    {
        foreach ($this->colors as $value) {
            if ($value->getHexaCode() == $hexacode) {
                return $value;
            }
        }
        return null;
    }

    // méthode qui vérifie si les class couleur ont bien les méthodes getName et getHexacode
    // inutile ici grace à l'interface ColorInterface
    //  public function checkColorObject($color)
    // {
    //     return method_exists($color, "getName") && method_exists($color, "getHexaCode");
    // }

}
