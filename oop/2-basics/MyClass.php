<?php
class MyClass
{

    public $message = "hello";

    public function MyClassFunction()
    {
        function InnerFunction()
        {
            self::echoSomething();
        }
        InnerFunction();
    }

    public function echoSomething()
    {

        echo $this->message;
    }
}

$myclass = new MyClass();
$myclass->echoSomething();
$myclass->MyClassFunction();
