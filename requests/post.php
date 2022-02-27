<?php
//connecting to the database
$con = new mysqli("localhost", "nodejspractice", "@200420052006%", "amabolearn");
if ($con->connect_error) {
    die('Could not connect: ' . $con->connect_error);
}
$topic       = $_REQUEST["topic"];
$subject     = $_REQUEST["subject"];
$formType    = $_REQUEST["formtype"];
$writer      = $_REQUEST["writer"];
$content     = $_REQUEST["content"];

if($formType === "itemPost" && $topic && $subject && $content && $writer && ($topic && $subject && $content && $writer) != "" ) {
        
    $sql = "SELECT topic FROM $subject WHERE topic = '$topic'";
    $result = $con->query($sql);
    $res = [];
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $res[] = $row;
    }
    if (count($res) > 0) {
        echo("topic discussed");
        $result->free();
        $con->close();
    } else {
        $insertionQuery = "INSERT INTO $subject (topic , content , writerName) VALUES ('$topic','$content','$writer')";
        $con->query($insertionQuery);
        $con->close();
        echo("posted");
    }
}
?>