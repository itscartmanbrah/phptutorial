<?php
if (isset($_POST['submit'])){

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

require_once '../config/db.php';
require_once 'functions.php';

if(emptyInputSignup($username, $email, $password) !== false){
header("location: ../register.php");
exit();
};

if(invalidEmail($email) !== false){
header("location: ../register.php");
exit();
};

createUser($conn, $username, $password, $email);
}else{
header("location: ../register.php");
exit();
}