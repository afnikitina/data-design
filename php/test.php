<?php
class Student {
private $studentFullName = '';
private $studentAge = 0;

// class constructor
public function __construct(string $name, int $age) {
$this->studentFullName = $name;
$this->studentAge = $age;
}
//class accessors
public function getStudentFullName(): string {
return $this->studentFullName;
}

public function getStudentAge(): int {
return $this->studentAge;
}

// class mutators
public function setStudentName(string $name): void {
$this->studentFullName = $name;
}

public function setStudentAge(int $age): void {
$this->studentAge = $age;
}
}

// instantiate a couple of objects
$student1 = new Student( "Joe Smith", 18);
$student2 = new Student("Jen Cook", 19);

// print out the properties of the objects
echo $student1->getStudentFullName() ." is " .$student1->getStudentAge() ." years old. <br />";
echo $student2->getStudentFullName() ." is " .$student2->getStudentAge() ." years old. <br />";



?>