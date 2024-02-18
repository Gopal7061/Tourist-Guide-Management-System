<?php
    
    session_start();
    /*echo "welcome".$_SESSION['name'];*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Place list</title>
    <style>
         table{
            border-collapse:collapse;
            width:100%;
            
            font-size:25px;
         
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
    </style>
</head>
<body>
    <div class="container my-5">
        <h2>Hello <?php echo $_SESSION['name'] ?></h2>
        <br>
        <br><br>
        <table>
            <thead>
            <tr>
                <th>P_Name</th>
               
                <th>Place_Type</th>
                <th>Description</th>
               
                <th>Action</th>
         

            </tr>
            </thead>
            <tbody>
                <?php
                     $conn = mysqli_connect("localhost","root","","dbms_project",3310);
                     if($conn-> connect_error){
                        die("Connection Failed:".$conn-> connect_error);
                    }
                    $sql="select * from place";
                    $result=$conn->query($sql);

                    if(!$result){
                        die("Invalid query:" . $conn->error);
                    }

                    while($row=$result->fetch_assoc()){
                        echo "
                        <tr>

                    <td>$row[P_Name]</td>
                    <td>$row[P_Type]</td>
                    <td>$row[Description]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='guideforuser.php?P_Name=$row[P_Name]'>BOOK</a>

                    </td>
                    
                </tr>
                        ";
                    }
                ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>