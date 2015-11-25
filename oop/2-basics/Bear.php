<?php
namespace oop\basics;
//class definition
class Bear {
	public $name;
	public $weight;
	public $age;
	public $sex;
	public $colour;

	//constructor
	public function __construct() {
		$this->age = 0;
		$this->wight = 100;
	}
	//define methods
	public function eat($units) {
		echo $this->name . " is eating " . $units . " units of food...  ";
		$this->weight += $units;
	}
	public function run() {
		echo $this->name . " is runging... ";
	}
}
Class PolarBear extends Bear {
	public function __construct() {
		parent::__construct();
		$this->colour = "blue";
		$this->weight = "600";
	}
	public function swim() {
		echo $this->name . " is swimming ... ";
	}
}
$polarBear = new PolarBear();
$polarBear->name = "swift";
$polarBear->eat(20);

echo date_default_timezone_get();