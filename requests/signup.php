<?php
//connecting to the database
$con = new mysqli("host", "user", "password", "database");
if ($con->connect_error) {
    die('Could not connect: ' . $con->connect_error);
}
$adminAccessPin = "";
$password    = $_REQUEST["password"];
$email       = $_REQUEST["email"];
$formType    = $_REQUEST["formtype"];
$name        = $_REQUEST["name"];
$accessPin   = $_REQUEST["accessPin"];

if ($formType === "signup"  && $email && $password && $name && ($email && $password && $name) !== "" && $accessPin) {
    if ($accessPin === $adminAccessPin) {
        //addAdmin( $name , $email , $password);

        $sql = "SELECT name FROM admin WHERE email = '$email' AND password = '$password' AND name = '$name'";
        $result = $con->query($sql);
        $res = [];
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $res[] = $row;
        }
        $response = [];
        if (count($res) > 0) {
            $response[0] = $res[0];
            echo (json_encode($response));
            $result->free();
            $con->close();
        } else {
            //add data to db
            $insertionQuery = "INSERT INTO admin (name , email , password) VALUES ('$name','$email','$password')";
            $con->query($insertionQuery);
            $con->close();
            $signup_response = [];
            $signup_response[0]["name"] = $name;
            echo (json_encode($signup_response));
        }
    } else {
        echo ("Access pin is incorrect");
    }
}
?>