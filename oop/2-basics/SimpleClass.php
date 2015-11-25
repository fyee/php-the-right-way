<?php
namespace oop\basics;
class SimpleClass {

	//property declaration
	public $var = "a default  value";

	public function displayVar() {
		echo $this->var . "\n";
	}

	public static function getClassName() {
		return SimpleClass::class;
	}
}

$simple = new SimpleClass();
$simple->displayVar();
echo SimpleClass::getClassName();
/*$instance = new SimpleClass();
$assinged = &$instance;

var_dump($instance);
var_dump($assinged);

$instance->var = "hello php";

//unset($instance);
$instance = null;

var_dump($instance);
var_dump($assinged);
 */
/*$className ='SimpleClass';  //可以传入类名来创建一个类
$instance = new $className();
$instance->displayVar();
 */

$instance = new SimpleClass();

$assigned = $instance;
//  $instance 和 $assigned  拥有各自的内存地址  分别指向各自的SimpleClass(),  修改时不影响 对象
$reference = &$instance;
//$reference  和 $instance 指向统一内存.

/*$instance->var = " \$assigned will have this value";
$instance = null;
var_dump($instance);
var_dump($assigned);
var_dump($reference);

 */
