<?php
namespace oop\basics;
require 'SimpleClass.php';
use oop\basics\Bear;

function __autoload($name) {
	echo "Want to load $name.\n";
	throw new MissingException("Unable to load $name.");
}

class ExtendsClass extends SimpleClass {
	function display() {
		echo "Extend class\n";
		parent::displayVar();
		$bar = new Bear();
		$bar->eat(4);
	}
}

$c = __NAMESPACE__ . '\\ExtendsClass';
$extend = new $c;

$extend->display();