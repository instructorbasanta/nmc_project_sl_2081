<?php
//features of OOP:Modularity, Code Reusablity, Clean code, Learnablity
//Term: Class, Object, Abstraction, Inheritance, Polymorphisam(overiding, overloading),Encapsulation,method, properties, constructor, destructor,interface, static keyword, $this keyword, parent keyword,namespace,Trait
//define class
class Person{
    private $name,$address,$pid;

    function setPersonData($n,$a,$pid){
        $this->name = $n;
        $this->address = $a;
        $this->pid = $pid;
    }
    //define constructor
    function __construct($n,$a,$pid){
        $this->name = $n;
        $this->address = $a;
        $this->pid = $pid;
    }

    function __destruct(){
        unset($this->name);
        echo "<br/>This object is destroyed";
    }
    function displayData(){
        return "Name:" . $this->name . '<br/>Address:' . $this->address . '<br>PID:' . $this->pid;
    }
}

class Student extends Person{
    private $course,$roll;

    function __construct($n,$a,$pid,$c,$r){
        parent::__construct($n,$a,$pid);
        $this->roll = $r;
        $this->course = $c;
    }

    function displayData(){
        return parent::displayData() . '<br>' . 'Course:' . $this->course . '<br/>Roll:'. $this->roll;

    }
}
$ram = new Student('Ram','KTM',34,'BCA',1);
echo $ram->displayData();


?>