<?php
//connecting to the database
$con = new mysqli("host", "user", "password", "database");
if ($con->connect_error) {
    die('Could not connect: ' . $con->connect_error);
}

$password    = $_REQUEST["password"];
$email       = $_REQUEST["email"];
$formType    = $_REQUEST["formtype"];

if ($formType == "login"  && $email && $password && ($email && $password) !== "") {
    //selecting from table then matching value
    $sql = "SELECT name FROM admin WHERE email = '$email' AND password = '$password'";
    $result = $con->query($sql);
    $res = [];
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $res[] = $row;
    }
    $response = [];
    if (count($res) > 0) {
        $response[0] = $res[0];
        echo(json_encode($response));
    } else {
        echo ("wrong info");
    }
    $result->free();
}
$con->close()
