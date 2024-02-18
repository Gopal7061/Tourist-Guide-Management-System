


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
   
    <title>Booking list</title>
    <style>
         .imp{
            border-collapse:collapse;
            width:100%;
            padding-left:10px;
            font-size:25px;
            
         
        }
        table,th,td{
           /* border:1px solid;*/
            text-align:center;
        }
       
        th,td{
            padding:10px;
            border-bottom:1px solid #ddd;
        }
        .btnn{
            padding-left:85rem;
        }
        tr:hover{
            background-color:#B9F3FC;
        }
        h3{
            padding-left:20px;
            padding-top:20px;
        }
        h5{
            padding-left:20px;
            padding-top:10px;
        }
         .heading-sub12{
    font-weight: 500;
    font-size: 20px;
    text-align: right;
}
.td2{
    padding-left:69rem;
}
 
      
    </style>
</head>
<body>
<div class=""><table><td class="td1">
<h3>Hello ADMIN</h3>
    <h5>view booking list</h5>
</td>
<td class="td2">    <p style="font-size: 14px;color: rgb(119, 119, 119);text-align: right;padding-right:50px;"> Today's Date  </p>

<p class="heading-sub12" style="padding-right: 50px;margin: 0;">
                                <?php 
                            date_default_timezone_set('Asia/Kolkata');
    
                            $today = date('Y-m-d');
                            echo $today;

?></p></td></table>
    <br>

    <div class="btnn">
    <a class="btn btn-primary" href="admin1.html" role="button">Back</a>
    </div>

</div>
<br><br>

<table class="imp">
 <thead>

  <tr><th>Booking_Id</th>
  <th>G_Id</th>
  <th>Date</th>
  <th>No_Of_Days</th>
  <th>Place</th>
  <th>Action</th>
    </tr>
    </thead>

<tbody>

    <?php
        $conn = mysqli_connect("localhost","root","","dbms_project",3310);
        if($conn-> connect_error){
            die("Connection Failed:".$conn-> connect_error);
        }
       $sql = " select Booking_Id,G_Id,Date,No_Of_Days,place from  book";
       //$sql ="CALL test();";

        $result = $conn-> query($sql);
        if($result-> num_rows > 0){
            while($row = $result-> fetch_assoc()){
                echo "<tr>
                    <td>$row[Booking_Id]</td>
                    <td>$row[G_Id]</td>
                    <td>$row[Date]</td>
                    <td>$row[No_Of_Days]</td>
                    <td>$row[place]</td>
                    <td><a class='btn btn-primary btn-sm' href='delete2.php?G_Id=$row[G_Id]'>Delete</a></td>
                </tr>";
            }
            echo "</table>";
        }
        else {
            echo "0 result";
        }
        $conn-> close();                                                                    
       ?>
           </tbody>
        </table>
        <!--
</div>
<br><br>
-->
</table>
</body>
</html>

