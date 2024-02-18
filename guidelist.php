<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
   
    <title>Guide List</title>
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
        th,td{
            padding:10px;
            border-bottom:1px solid #ddd;
        }
        table,th,td{
           /* border:1px solid;*/
            text-align:center;
        }
        h2{
            padding-left:50px;
            padding-top:20px;
        }
      
        tr:nth-child(even){
            background-color:#f2f2f2
        }
      
            .home{
            padding-left:85rem;
            color:#d96459;
        
        }
    </style>
</head>
<body>
<!-- <div class="row">
    <center><h3>Guide Booking Page</h3></center>
</div>
<div class="row"> -->

<title>Tablee</title>
<h2>Guide List</h2>
<div class="home">
<a href="admin1.html"><button style="background-color:#6096B4;
            color:white;
            border:none;
            width:90px;
            height:35px;
            border-radius:30px;
            font-size:20px;
            ">BACK</button></a>
            </div>
            <br><br>

<table>
    <tr><th>Name</th>
<th>ID</th>
<th>Email</th>
<th>Aadhar</th>
<th>DOB</th>
<th>Place</th>
    </tr>






    <?php
        $conn = mysqli_connect("localhost","root","","dbms_project",3310);
        if($conn-> connect_error){
            die("Connection Failed:".$conn-> connect_error);
        }
        $sql = " select G_Name,G_Id,G_Email,G_Aadhar,G_Dob,G_Place from  guide";
        $result = $conn-> query($sql);
        if($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
                echo "<tr>
                    <td>".$row["G_Name"]."</td>
                    <td>".$row["G_Id"]."</td>
                    <td>".$row["G_Email"]."</td>
                    <td>".$row["G_Aadhar"]."</td>
                    <td>".$row["G_Dob"]."</td>
                    <td>".$row["G_Place"]."</td>
                    
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

