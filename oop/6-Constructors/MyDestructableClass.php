<?php
class MyDestructableClass
{
    private $name = 'MyDestructableClass';
    public function __construct()
    {
        print 'In Constructor \n';
    }

    public function __destruct()
    {
        print "Destroying ".$this->name."\n";
    }
}

$obj = new MyDestructableClass();
