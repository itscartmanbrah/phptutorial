<?php

$conn= new mysqli('localhost','root','','online_booking_system');
if($conn->connect_error){
die("Connection Failed:" . $conn->connect_error);
}else{
echo "Connection Success";
};