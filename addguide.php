<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>add guide</title>
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
        .hii{
            /*word-spacing:50rem;*/
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h2>Hello Admin</h2>
        <br>
        <div class="hii">
        <a class="btn btn-primary" href="newguide.php" role="button">New GUide</a> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
        
        <a class="btn btn-primary" href="admin1.html" role="button">Back</a>
    </div>
        <br><br>
        <table>
            <thead>
            <tr>
                <th>ID
                </th>
                <th>Name</th>
                <th>Place</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
                <?php
                     $conn = mysqli_connect("localhost","root","","dbms_project",3310);
                     if($conn-> connect_error){
                        die("Connection Failed:".$conn-> connect_error);
                    }
                    $sql="select G_Id,G_Name,G_Place,G_Gender,G_Phone from guide";
                    $result=$conn->query($sql);

                    if(!$result){
                        die("Invalid query:" . $conn->error);
                    }

                    while($row=$result->fetch_assoc()){
                        echo "
                        <tr>
                    <td>$row[G_Id]</td>
                    <td>$row[G_Name]</td>
                    <td>$row[G_Place]</td>
                    <td>$row[G_Gender]</td>
                    <td>$row[G_Phone]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='delete.php?G_Id=$row[G_Id]'>Delete</a>

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