<?php
//connecting to the database
$con = new mysqli("sql106.epizy.com", "epiz_31049233", "aMYJQ3cJQCHPh", "epiz_31049233_amabolearn");
if ($con->connect_error) {
    die('Could not connect: ' . $con->connect_error);
}

$subject     = $_REQUEST["subject"];
$topic       = $_REQUEST["topic"];

if($subject && $topic) {
        
   if($con->query("DESCRIBE $subject")) {
        $sql = "SELECT content , writerName FROM $subject WHERE topic = '$topic'";
        $result = $con->query($sql);
        $res = [];
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $res[] = $row;
        }
        if (count($res) > 0) {
            echo(json_encode($res));
            $result->free();
            $con->close();
        }
        else {
            echo(`no such content available`);
            $con->close();
        }
    }
   else {
       echo("table does not exist");
    }
}
?>