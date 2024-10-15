<?php

function emptyInputSignup($username, $email, $password){
$result = true;

if(empty($username) || empty($email) || empty($password)){
$result = false;
}else{
$result = false;
}
return $result;
}


function invalidEmail($email)
{
    $result = true;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function createUser($conn, $username, $password, $email){

$sql = "INSERT INTO user (username, password, email) VALUES (?,?,?);";
$statement = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($statement, $sql)){
header("location: ../register.php");
exit();
}

mysqli_stmt_bind_param($statement, "sss", $username, $password, $email);
mysqli_stmt_execute($statement);
mysqli_stmt_close($statement);

header("location: ../login.html");
exit();
}

function loginUser($conn, $username, $password){
$sql = "SELECT * FROM user WHERE username= ? AND password = ?;";
$statement = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($statement, $sql)){
header("location: ../register.php");
exit();
}

mysqli_stmt_bind_param($statement, "ss", $username, $password);
mysqli_stmt_execute($statement);
$resultData = mysqli_stmt_get_result($statement);
    $row = mysqli_fetch_assoc($resultData);

    if (!empty($row)) {
        header("location: ../views/index.html");
        exit();
    } else {
        header("location: ../login.html");
        exit();
    }

    mysqli_stmt_close($stmt);

}