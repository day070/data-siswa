<?php
session_start();
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
                <td><input type="text" name="nama" autocomplete="off"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" autocomplete="off"></td>
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
            $countdata = mysqli_num_rows($query);
            $data = mysqli_fetch_array($query);

            if ($countdata > 0) {
                if (password_verify($password, $data['pass'])) {
                    $_SESSION['username'] = $data['user'];
                    $_SESSION['nama'] = $data['nama'];
                    $_SESSION['login'] = true;
                    header('location:index.php');
                } else {
                    ?>
                    <div class="alert alert-danger" role="alert">Password Salah!</div>
                    <?php
                }
            } else {
                ?>
                <div class="alert alert-danger" role="alert">Data yang kamu masukan Salah!</div>
                <?php
            }
        }
        ?>
    </form>

</body>

</html>