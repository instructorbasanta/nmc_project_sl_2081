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
        echo "This object is destroyed";
    }
    function displayPersonData(){
        return "Name:" . $this->name . '<br/>Address:' . $this->address . '<br>PID:' . $this->pid;
    }
}
$ram = new Person('Ram','KTM',34);
// print_r($ram);
//set data using method
// $ram->setPersonData('Ram','KTM',34);
echo $ram->displayPersonData();
echo '<br>';
print_r($ram);



?>