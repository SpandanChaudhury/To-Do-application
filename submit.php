<?php 
session_start();
date_default_timezone_set('Asia/Kolkata');
$error = "";
include "connection.php";
if(isset($_GET['delete']))
{
    $sno = $_GET['delete'];
    $query_delete = "DELETE FROM ENTRY WHERE SNO = '$sno'";
    $sql_link_delete = mysqli_query($conn, $query_delete);
}
if(isset($_REQUEST['task']))
    $input_task = $_REQUEST['task'];
    if(empty($input_task))
        $error = "Please enter a task";
    else{
        $date_time = date("Y-m-d H-i-s");
        $query_insert = "INSERT INTO ENTRY(DATE_ENTERED, TASK) VALUES('$date_time','$input_task')";
        $sql_link = mysqli_query($conn, $query_insert);
        if(!$sql_link)
            $error = "Could not connect to the data base";
    }

    $query_retreive = "SELECT * FROM ENTRY";
    $sql_link_get = mysqli_query($conn, $query_retreive);
?>