<?php

    $P_Id=$_GET["P_Id"];

    $servername ="localhost";
    $username="root";
    $password="";

    $connection = mysqli_connect($servername,$username,$password,"dbms_project",3310);

    $sql= "DELETE FROM place WHERE  P_Id= $P_Id";
    $connection->query($sql);

    header("location:/dbms_project/placelist.php");

exit;
?>

