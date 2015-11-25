<?php
//调用方式是会生成一个伪类,纸箱调用着
class SimpleThis {
	/*static*/function foo() {
		if (isset($this)) {
			echo '$this is defined(';
			echo get_class($this);
			echo ")\n";
		} else {
			echo "\$this is not defined.\n";
		}
	}
}

class B {
	function bar() {
		SimpleThis::foo();
	}
}

$a = new SimpleThis();
$a->foo();

$b = new B();
$b->bar();