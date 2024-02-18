<?php
$conn = mysqli_connect("localhost","root","","dbms_project",3310);


$U_Name="";
$U_Email="";
$U_Pass="";
$U_Dob="";
$U_Gender="";
$U_Phone="";

$errorMessage="";
$successMessage="";

if( $_SERVER['REQUEST_METHOD'] == 'POST'){
   # $G_Id=$_POST["G_Id"];
   
        $U_Name=$_POST["U_Name"];

    
    $U_Email=$_POST["U_Email"];
    $U_Pass=$_POST["U_Pass"];
    $U_Dob=$_POST["U_Dob"];

    $U_Gender=$_POST["U_Gender"];
    $U_Phone=$_POST["U_Phone"];

    do{
       /* if(
            empty($G_Id) ||  empty($U_Name) || empty($U_Dob) ||empty($U_Pass) || empty($G_Email) ||  empty($U_Phone) ||  empty($U_Gender) 
        )
        { 
            $errorMessage = "allllll the fields are required";
            break;
        }*/

        //add new guide
$sql = "INSERT INTO user
        VALUES(DEFAULT,'$U_Name','$U_Email','$U_Pass','$U_Dob','$U_Gender','$U_Phone')";


        $result=$conn->query($sql);

        if(!$result){
            $errorMessage="invalid query:" . $conn->error;
            break;
        }

       
        $U_Name="";
        $U_Email="";
        $U_Pass="";
        $U_Dob="";
        $U_Gender="";
        $U_Phone="";

    $successMessage="guide added successfully";

    header("location:/dbms_project/userlogin.php");

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
    <title>createUser</title>
    <style>
        .container{
            
            padding-top:10rem;
            padding-left:26rem;
        }
        body{
            background-image:url("sign4.jpg");
                background-repeat:no-repeat;
                background-size:100%;
        }
        .h{
            color:white;
        }
       
    </style>
</head>
<body>
    <div class="container">
        <h2>Hello User</h2>
        <br><br>
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
                <label for="" class="col-sm-1">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="U_Name" value="<?php echo $U_Name;?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-1 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="U_Email" value="<?php echo $U_Email;?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="" class="col-sm-1 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="U_Pass" value="<?php echo $U_Pass;?>" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-1 col-form-label">DOB</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="U_Dob" value="<?php echo $U_Dob;?>" required>
                </div>
            </div>
            
          
            
        
         
            <div class="row mb-3">
                <label for="" class="col-sm-1 col-form-label">Gender</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="U_Gender" value="<?php echo $U_Gender;?>" required>
                </div>
            </div>
         <div class="row mb-3">
                <label for="" class="col-sm-1 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="U_Phone" value="<?php echo $U_Phone;?>" required>
                </div>
            </div>
            <?php
        if(!empty($successMessage)){
            echo "
                <div class='row mb-3'>
                    <div class='offset-sm-1 col-ssm-6'>
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
                <button type="submit" class="btn btn-primary" href="userlogin.php">submit</button>
            </div>
            <div class="col-sm-3 d-grid">
            <a class="btn btn-outline-primary h" href="home.html" role="button">cancel</a>
           </div>
        </form>
    </div>
</body>
</html>