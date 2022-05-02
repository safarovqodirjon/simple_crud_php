<?php
include "conn.php";
$id = $_GET['id'];
$query3 = "select * from user where id = $id;";
$run = $db->query($query3);
if ($run->num_rows > 0) {
    while ($row = $run->fetch_assoc()) {
        $username = $row['name'];
        $email = $row['email'];
        $address = $row['address'];
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body align="center">

<form method="post">
    <label>Name</label>
    <input type="text" name="name" value="<?php echo $username; ?>">
    <label>Email</label>
    <input type="text" name="email" value="<?php echo $email; ?>">
    <label>Address</label>
    <input type="text" name="address" value="<?php echo $address; ?>">
    <input type="submit" name="update" value="Submit"/>
</form>

</body>
</html>

<?php
if (isset($_POST['update'])) {
    $up_name = $_POST['name'];
    $up_email = $_POST['email'];
    $up_address = $_POST['address'];
    $query4 = "update user set name = '$up_name', email='$up_email', address='$up_address' where id='$id'";
    if (mysqli_query($db, $query4)){
        echo("<script>alert('user updated successfully')</script>");
        header("location:create.php");
    } else {
        echo(mysqli_error($db));
    }
}
?>
