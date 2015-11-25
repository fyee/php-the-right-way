<?php
spl_autoload_register('myAutoloader');

function myAutoloader($className)
{
    $path = '/home/kral/Projects/www/php-the-right-way/oop/Properties/';
    var_dump($className);
    include $path.$className.'.php';
}

//-------------------------------------

//$myClass = new MyClass();

new Demo1Class();
new SimpleClass();
