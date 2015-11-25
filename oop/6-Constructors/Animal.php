<?php
abstract class Animal
{
    public $type;
    public $name;
    public $sound;

    public function __construct($type, $name, $sound)
    {
        $this->type  = $type;
        $this->name  = $name;
        $this->sound = $sound;
    }

    public function compare($a, $b)
    {
        if ($a->name < $b->name) {
            return -1;
        } elseif ($a->name == $b->name) {
            return 0;
        } else {
            return 1;
        }
    }

    public function __toString()
    {
        return "$this->name the $this->type goes $this->sound";
    }
}

class Dog extends Animal
{
    public function __construct($name)
    {
        parent::__construct("Dog", $name, "woof!");
    }
}

class Cat extends Animal
{
    public function __construct($name)
    {
        parent::__construct("Cat", $name, "meeoow!");
    }
}

class Bird extends Animal
{
    public function __construct($name)
    {
        parent::__construct("Bird", $name, "chirp chirp!!");
    }
}

$animals = array(
    new Dog("Fido"),
    new Bird("Celeste"),
    new Cat("Pussy"),
    new Dog("Brad"),
    new Bird("Kiki"),
    new Cat("Abraham"),
    new Dog("Jawbone")
);

usort($animals, array('Animal', 'compare'));

foreach ($animals as $amimal) {
    echo "$amimal \n";
}
