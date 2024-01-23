<?php
require("conection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>

                    <button type="submit" name="kirim">Kirim</button>
                </td>
            </tr>
        </table>
        <?php
        if (isset($_POST['kirim'])) {
            $username = $_POST['nama'];
            $password = $_POST['password'];

            $query = mysqli_query($con, "SELECT * FROM tbl_user WHERE user='$username'");
            if (!$query) {
                echo mysqli_error($con);
            } else {
                header('location:index.php');
            }
        }
        ?>
    </form>

</body>

</html>