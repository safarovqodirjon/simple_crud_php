<?php include 'conn.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>user</title>
</head>
<body align="center">
<form method="post">
    <label>Name</label>
    <input type="text" name="name" placeholder="Enter the name">
    <label>Email</label>
    <input type="text" name="email" placeholder="Enter the email">
    <label>Address</label>
    <input type="text" name="address" placeholder="Enter the address">
    <input type="submit" name="submit" value="Submit"/>
</form>
<hr>
<h3>User List</h3>

<table style="width: 80%" border="2" align="center">
    <tr>
        <th>#N</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Operations</th>
    </tr>
    <?php
    include "read.php";
    $i = 1;
    if ($run->num_rows > 0) {
        while ($row = $run->fetch_assoc()) {
            $id = $row['id'];

            ?>

            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['address'] ?></td>
                <td><a href="edit.php?id=<?php echo $id;?>">Edit</a>
                    <a href="delete.php?id=<?php echo $id;?>" onclick="return confirm('Are you shure?')">Delete</a>
                </td>
            </tr>
            <?php
        }
    }
    ?>

</table>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $query = "INSERT INTO USER(NAME, email, address) VALUES('$name', '$email', '$address');";

    if (mysqli_query($db, $query)) {
        echo("<script>alert('user registered successfully')</script>");
        header("location:create.php");
    } else {
        echo(mysqli_error($db));
    }

}


?>
