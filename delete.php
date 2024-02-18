<?php

    $G_Id=$_GET["G_Id"];

    $servername ="localhost";
    $username="root";
    $password="";

    $connection = mysqli_connect($servername,$username,$password,"dbms_project",3310);

    $sql= "DELETE FROM guide WHERE  G_Id= $G_Id";
    $connection->query($sql);

    header("location:/dbms_project/addguide.php");

exit;
?>