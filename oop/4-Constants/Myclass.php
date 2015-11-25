<?php
class Myclass
{
    const CONSTANT = " constant value";
    public function showConstant()
    {
        echo self::CONSTANT;
    }
}

echo Myclass::CONSTANT;
$classname = 'Myclass';
echo $classname::CONSTANT;

$class = new Myclass();
$class->showConstant();

echo $class::CONSTANT;
