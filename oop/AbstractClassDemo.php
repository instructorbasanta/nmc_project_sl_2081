<?php
abstract class Authentication{
    abstract function register();
    abstract function login();

    function logout(){
        session_start();
        session_destroy();
        return "Logout success";
    }

    function showWelcome($username){
        return 'Welcome ' . $username;
    }
}

interface Session{
    function startSession();
    function endSession();
    function printSession();
}

interface CRUDOperation{
    function insert();
    function list();
    function update();
    function delete();
}

class Admin extends Authentication implements Session,CRUDOperation{
    function register(){
        require_once 'admin_register.php';
        return "Admin Register Page";
    }

    function login(){
        return "Admin Login Page";
    }

    function startSession(){
        
    }

    function endSession(){

    }

    function printSession(){

    }

    function insert(){

    }

    function list(){

    }

    function update(){

    }

    function delete(){
        
    }
}

$admin = new Admin();
echo $admin->register();
echo $admin->login();
echo $admin->showWelcome('Raju');
echo $admin->logout();

class Student extends Authentication{
    function register(){
        require_once 'student_register.php';
        return "Student Register Page";
    }

    function login(){
        return "Student Login Page";
    }
}


$ram = new Student();
echo $ram->register();
echo $ram->login();
echo $ram->showWelcome('Ram Kumar');
echo $ram->logout();
?>