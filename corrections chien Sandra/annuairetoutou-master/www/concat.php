<?php

class Person
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}

$vincent = new Person("Vincent");

$prenom = "Edouardo";

echo "Salut <i>";
echo $vincent->getName();
echo "</i><br>";