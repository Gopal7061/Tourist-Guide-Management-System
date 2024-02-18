<?php
session_start();
/*echo "welcome".$_SESSION['name'];*/
$x=$_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
   
    <title>UserDashboard</title>
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
        .a{
            padding-left:85rem;        }
            .btn{
                color:white;
                background-color:#6096B4;
            }
            th,td{
            padding:10px;
            border-bottom:1px solid #ddd;
        }
        table,th,td{
           /* border:1px solid;*/
            text-align:center;
        }
        h5,h3{
            padding-left:50px;
            padding-top:20px;
        }
    </style>
</head>
<body>
<div class="">
    <h3>Hello <?php echo $_SESSION['name'] ?></h3>
    <h5>view your bookings</h5>
    <div class="a">
    <a class='btn'  href='bookingpage.php' >BOOK</a>
    </div>
    <br>
</div>


<title>Tablee</title>
<table>
    

<tr><th>Booking_Id</th>
<th>G_Id</th>
<th>Date</th>
<th>No_Of_Days</th>
<th>Place</th>
<th>contact</th>
    </tr>




    <?php
        $conn = mysqli_connect("localhost","root","","dbms_project",3310);
        if($conn-> connect_error){
            die("Connection Failed:".$conn-> connect_error);
        }
        $sql = " select Booking_Id,B.G_Id,Date,No_Of_Days,place,U_Name,G.G_Phone from  book B,guide g where U_Name='$x' and B.G_Id=g.G_Id";
        $result = $conn-> query($sql);
        if($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
                echo "<tr>
                    <td>".$row["Booking_Id"]."</td>
                    <td>".$row["G_Id"]."</td>
                    <td>".$row["Date"]."</td>
                    <td>".$row["No_Of_Days"]."</td>
                    <td>".$row["place"]."</td>
                    <td>".$row["G_Phone"]."</td>
                    
                    
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
</table>
</body>
</html>

