<?php
namespace Garage\Colors;

interface ColorInterface
{
    public function getName(): string;
    public function getHexaCode(): string;
}
