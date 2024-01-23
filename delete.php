<?php
require("conection.php");
$nisn = $_GET['nisn'];
$queryDelete = mysqli_query($con, "DELETE FROM tbl_siswa WHERE nisn='$nisn'");
if ($queryDelete) {
    header("location:index.php");
}

?>