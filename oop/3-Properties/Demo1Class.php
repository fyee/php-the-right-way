<?php
namespace oop\Properties;

class Demo1Class
{
    private $var = "b";

    public static function mb()
    {
        $z = new DemoA();
        echo $z->var;
    }
}

class DemoA extends Demo1Class
{
    public $var = "a";
}

Demo1Class::mb(); //print b for demoa  could not access private $var
