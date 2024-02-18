<?php
$conn = mysqli_connect("localhost","root","","dbms_project",3310);


$P_Name="";
$P_Type="";
$Description="";
$P_Id="";

$errorMessage="";
$successMessage="";

if( $_SERVER['REQUEST_METHOD'] == 'POST'){
   # $G_Id=$_POST["G_Id"];
    if(isset($_POST['P_Name']))
    {
        $P_Name=$_POST["P_Name"];

    }
    $P_Type=$_POST["P_Type"];
    $Description=$_POST["Description"];
    $P_Id=$_POST["P_Id"];

    do{
        if(
           /* empty($G_Id) || */ empty($P_Name) ||  empty($P_Type) ||  empty($Description) ||  empty($P_Id)
        )
        { 
            $errorMessage = "all the fields are required";
            break;
        }

        //add new guide
$sql = "INSERT into place 
        VALUES ('$P_Name','$P_Type','$Description','$P_Id')";
        $result=$conn->query($sql);

        if(!$result){
            $errorMessage="invalid query:" . $conn->error;
            break;
        }
        $P_Name="";
        $P_Type="";
        $Description="";
        $P_Id="";
        $successMessageguide=" added successfully";

    header("location:/dbms_project/placelist.php");

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
            padding-top:10rem;
            padding-left:26rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>New Place</h2>
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
         <!--   <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">ID</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="G_Id" value="<?#php echo $G_Id;?>">
                </div>
            </div> -->
            <div class="row mb-3">
                <label for="" class="col-sm-1 col-form-label">Place_Name</label> &nbsp &nbsp
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="P_Name" value="<?php echo $P_Name;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-1 col-form-label">Place_Type</label>&nbsp &nbsp
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="P_Type" value="<?php echo $P_Type;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-1 col-form-label">Description</label>&nbsp &nbsp
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Description" value="<?php echo $Description;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-1 col-form-label">P_Id</label>&nbsp &nbsp
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="P_Id" value="<?php echo $P_Id;?>">
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