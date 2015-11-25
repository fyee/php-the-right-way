<?php
namespace oop\Properties;

class SimpleClass
{
    private $var1 = 'hello'.'world';

    public function __construct()
    {
        $this->var1 = "php";
        echo $this->var1;
    }

    public function getVar()
    {
        echo $this->var1;
    }

}

$sample = new SimpleClass();
echo $sample->getVar();
