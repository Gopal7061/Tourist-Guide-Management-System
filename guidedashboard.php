<?php
session_start();
//echo "welcome".$_SESSION['gname'];
$y=$_SESSION['gname'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GuideDashboard</title>


    <style>
        table{
            border-collapse:collapse;
            width:100%;
            color:#d9;
            font-family:monospace;
            font-size:25px;
            text-align:left;
        }
        th{
            background-color:#6096B4;

            color:white;
        }
      
        tr:nth-child(even){
            background-color:#f2f2f2;
        }
        th,td{
            padding:10px;
            border-bottom:1px solid #ddd;
        }
        table,th,td{
           /* border:1px solid;*/
            text-align:center;
        }
        .home{
            padding-left:85rem;
            color:#d96459;
        
        }
        h1,h3{
            padding-left:50px;
            padding-top:20px;
        }
      
    </style>
</head>
<body>
<!-- <div class="row">
    <center><h3>Guide Booking Page</h3></center>
</div>
<div class="row"> -->
    <h1>Hello <?php echo $_SESSION['gname'];?></h1>
    <h3>See your traveler list below</h3>
<title>Tablee</title>
<div class="home">
<a href="home.html"><button style="background-color:#6096B4;
                                    color:white;
                                    border:none;
                                    width:90px;
                                    height:35px;
                                    border-radius:30px;
                                    font-size:20px">HOME</button></a>
    </div>
<br><br>
<table>
    <tr><th>Booking_Id</th>
<th>U_Name</th>
<th>Date</th>
<th>No_Of_Days</th>
<th>contact</th>

    </tr>






    <?php
        $conn = mysqli_connect("localhost","root","","dbms_project",3310);
        if($conn-> connect_error){
            die("Connection Failed:".$conn-> connect_error);
        }

        
        $sql = " select B.Booking_Id,B.U_Name,B.Date,B.No_Of_Days,B.G_Id,G.G_Id,G.G_Name,U.U_Phone from book B,guide G,user U where B.G_Id=G.G_Id and G.G_Name='$y' and U.U_Name=B.U_Name";
        $result = $conn-> query($sql);
        if($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
                echo " <tr>
                    <td>".$row["Booking_Id"]."</td>
                    <td>".$row["U_Name"]."</td>
                    <td>".$row["Date"]."</td>
                    <td>".$row["No_Of_Days"]."</td>
                    <td>".$row["U_Phone"]."</td>
                   
                </tr>";
            }
            echo "</table>";
        }
        else {
            echo "0 result";
        }
        $conn-> close();                                                                    
       ?>
        <!--
</div>
<br><br>
-->
</body>
</html>