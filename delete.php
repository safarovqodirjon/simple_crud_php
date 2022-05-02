<?php
include "conn.php";
$id = $_GET['id'];
$qry = "delete from user where id = $id";

if (mysqli_query($db, $qry)){
    header("location: create.php");
}

else{
    echo (mysqli_error($db));
}