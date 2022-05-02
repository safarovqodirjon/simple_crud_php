<?php
$db = mysqli_connect("localhost:3306", "root", '', "crud");
if (!$db) {
    die('error in db' . mysqli_error($db));
}

//
//$arr = mysqli_query($db, "describe user;");
//print_r(mysqli_fetch_assoc($arr));



