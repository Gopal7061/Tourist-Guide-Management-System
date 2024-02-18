<?php
$conn = mysqli_connect("localhost","root","","dbms_project",3310);
session_start();
   /* echo "welcome".$_SESSION['name'];*/
    $user=$_SESSION['name'];
$G_Id="";
$Date="";
$No_Of_Days="";
$price="";
$place="";
$U_Name="";

$errorMessage="";
$successMessage="";

if( $_SERVER['REQUEST_METHOD'] == 'POST'){
   $G_Id=$_POST["G_Id"];

   if(isset($_POST['Date']))
    {
    
    $Date=$_POST["Date"];
    }
    $No_Of_Days=$_POST["No_Of_Days"];
    $price=$_POST["price"];
    $place=$_POST["place"];
    $U_Name=$_POST["U_Name"];
    
    do{
        if(
           /* empty($G_Id) || */ empty($Date) || empty($No_Of_Days) 
        )
        { 
            $errorMessage = "all the fields are required";
            break;
        }

        //$sql = " select * from  book where Date=$Date ";
        

           
            
            
$sql = "INSERT into book 
        VALUES ('$G_Id',DEFAULT,'$Date','$No_Of_Days','$price','$place','$U_Name')";
        $result=$conn->query($sql);

        if(!$result){
            $errorMessage="invalid query:" . $conn->error;
            break;
        }

       

    $Date="";
$No_Of_Days="";

    $successMessage="guide booked successfully";

    header("location:/dbms_project/userdashboard.php");

    }while(false);
}

    
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>bookingmain</title>
    <style>
        .hello{
            padding-top:10rem;
            padding-left:26rem;
        }
        body{
            background-image:url("book2.jpg");
                background-repeat:no-repeat;
                background-size:100%;
        }
        .h{
            color:white;
        }
    </style>
</head>
<body>
    <div class="hello">
        <h2>Booking</h2>
        <br>
        <?php
        if(!empty($errorMessage)
        ){
            echo "
            <div class='alert alert-warning alert alert-dismissible fade show' role='alert'>
            <strong> $errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
        
        <form action="" method="POST">
        <div class="row mb-3">
                <label for="" class="col-sm-1 c1ol-form-label">G_Id</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="G_Id" value="<?php echo $_GET['G_Id'];?>">
                </div>
            </div>
         
           
            <div class="row mb-3">
                <label for="" class="col-sm-1 col-form-label">Date</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="Date" value="<?php echo $Date;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-1 col-form-label">No_Of_Days</label>
                <div class="col-sm-6">
                    <input type="int" class="form-control" name="No_Of_Days" value="<?php echo $No_Of_Days;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-1 col-form-label">Price</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="price" value="<?php echo $_GET['price'];?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-1 col-form-label">Place</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="place" value="<?php echo $_GET['place'];?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-1 col-form-label">User_Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="U_Name" value="<?php echo $user;?>">
                </div>
    
            </div>
            <?php
        if(!empty($successMessage)){
            echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-ssm-6'>
                        <div class='alert alert-success alert-dismissible fade show' rolr='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>

            ";
        }
            ?>
           <div class="row mb-3">
            <div class="offset-sm-1 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary">submit</button>
            </div>
            <div class="col-sm-3 d-grid">
            <a class="btn btn-outline-primary h" href="home.html" role="button">cancel</a>
           </div>
        </form>
    </div>
</body>
</html>