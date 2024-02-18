<?php
$conn = mysqli_connect("localhost","root","","dbms_project",3310);


$G_Name="";
$G_Dob="";
$G_Aadhar="";
$G_Email="";
$G_Pass="";
$G_Address="";
$G_Place="";
$G_Gender="";
$G_Phone="";
$price="";

$errorMessage="";
$successMessage="";

if( $_SERVER['REQUEST_METHOD'] == 'POST'){
   # $G_Id=$_POST["G_Id"];
    if(isset($_POST['G_Name']))
    {
        $G_Name=$_POST["G_Name"];

    }
    $G_Dob=$_POST["G_Dob"];
    $G_Aadhar=$_POST["G_Aadhar"];
    $G_Email=$_POST["G_Email"];
    $G_Pass=$_POST["G_Pass"];
    $G_Address=$_POST["G_Address"];
    $G_Place=$_POST["G_Place"];
    $G_Gender=$_POST["G_Gender"];
    $G_Phone=$_POST["G_Phone"];
    $price=$_POST["price"];

    do{
        if(
           /* empty($G_Id) || */ empty($G_Name) || empty($G_Dob) || empty($G_Aadhar) || empty($G_Email) || empty($G_Pass) || empty($G_Address) ||  empty($G_Place) ||  empty($G_Phone) ||  empty($G_Gender) 
        )
        { 
            $errorMessage = "all the fields are required";
            break;
        }

        //add new guide

        $sql = "INSERT INTO guide (G_Name, G_Dob, G_Aadhar, G_Email, G_Pass, G_Address, G_Place, G_Gender, G_Phone, price) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
       
       $stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssss", $G_Name, $G_Dob, $G_Aadhar, $G_Email, $G_Pass, $G_Address, $G_Place, $G_Gender, $G_Phone, $price);

$G_Name = $_POST["G_Name"];
$G_Dob = $_POST["G_Dob"];
$G_Aadhar = $_POST["G_Aadhar"];
$G_Email = $_POST["G_Email"];
$G_Pass = $_POST["G_Pass"];
$G_Address = $_POST["G_Address"];
$G_Place = $_POST["G_Place"];
$G_Gender = $_POST["G_Gender"];
$G_Phone = $_POST["G_Phone"];
$price = $_POST["price"];

$result = $stmt->execute();

if (!$result) {
    $errorMessage = "Error: " . $stmt->error;
} else {
    $successMessage = "Guide added successfully.";
}

   

    header("location:/dbms_project/addguide.php");

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
    <title>create</title>
    <style>
        .container{
            padding-top:1rem;
            padding-left:26rem;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h2>New Guide</h2><br>

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
                <label for="" class="col-sm-1   col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="G_Name" value="<?php echo $G_Name;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-1 col-form-label">DOB</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="G_Dob" value="<?php echo $G_Dob;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-1 col-form-label">Aadhar</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="G_Aadhar" value="<?php echo $G_Aadhar;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-1 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="G_Email" value="<?php echo $G_Email;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-1 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="G_Pass" value="<?php echo $G_Pass;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-1 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="G_Address" value="<?php echo $G_Address;?>">
                </div>
            </div>
        
            <div class="row mb-3">
                <label for="" class="col-sm-1 col-form-label">Place</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="G_Place" value="<?php echo $G_Place;?>">
                </div>
            </div>

            <div class="row mb-3">
                <label for="" class="col-sm-1 col-form-label">Gender</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="G_Gender" value="<?php echo $G_Gender;?>">
                </div>
            </div>
         <div class="row mb-3">
                <label for="" class="col-sm-1 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="G_Phone" value="<?php echo $G_Phone;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-1 col-form-label">Price</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="price" value="<?php echo $price;?>">
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
                <button type="submit" class="btn btn-primary">submit</button>
            </div>
            <div class="col-sm-3 d-grid">
            <a class="btn btn-outline-primary" href="admin1.html" role="button">cancel</a>
           </div>
        </form>
    </div>
</body>
</html>