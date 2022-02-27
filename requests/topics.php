<?php
//connecting to the database
$con = new mysqli("sql106.epizy.com", "epiz_31049233", "aMYJQ3cJQCHPh", "epiz_31049233_amabolearn");
if ($con->connect_error) {
    die('Could not connect: ' . $con->connect_error);
}

$subject     = $_REQUEST["subject"];

if($subject != "undefined" && $subject != "" && $subject) {
        
   if($con->query("DESCRIBE $subject")) {
        $sql = "SELECT topic FROM $subject";
        $result = $con->query($sql);
        $res = [];
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $res[] = $row["topic"];
        }
        if (count($res) > 0) {
            echo(json_encode($res));
            $result->free();
            $con->close();
        }
        else {
            echo(`no topics`);
            $con->close();
        }
    }
   else {
       echo("table does not exist");
    }
}
