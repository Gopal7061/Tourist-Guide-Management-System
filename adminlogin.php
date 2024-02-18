<?php
    if(isset($_POST['A_Name'])){
        $A_Name=$_POST['A_Name'];
    }
    if(isset($_POST['A_Name'])){
        $A_Pass=$_POST['A_Pass'];

    }
    

    $conn= new mysqli("localhost","root","","dbms_project",3310);
    if($conn->connect_error){
        die("Failed to connect: " .$conn->connect_error);

    }
    else{
        $stmt=$conn->prepare(" select * from admin where A_Name=?");
        $stmt->bind_param("s",$A_Name);
        $stmt->execute();
        $result=$stmt->get_result();
        if($result->num_rows >0){
            $data=$result->fetch_assoc();
            if($data['A_Pass']==$A_Pass){
                header("location:/dbms_project/admin1.html");
            }
            else{
                echo"<script>alert('wrong password');</script>";
        }
    } 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <style>
        .box{
position: absolute;
top: 50%;
left:50%;
transform: translate(-50%,-50%);
width: 400px;
padding: 40px;
background:white;
box-sizing: border-box;
box-shadow : 0 15px 25px rgba(0,0,0,0.5);
border-radius: 10px;
}
        .name{
            padding-right: 100px;
        }
        /*.login{
            padding-top: 7rem;
            padding-left: 40rem;
            display: inline-block;
        }*/
        
        #sbutton {
    background-color: black;
    color:white;
    border-radius: 10px;
    line-height: 2.5;
    font-size: 1rem;
    text-align: center;
    border:0;
    padding: 0 20px;
        }

    </style>
<div class="box">
    <h3>Welcome Back Admin!!!!</h3>
    <form class="login"  method="POST">
        <center>
            <h1 >Login</h1>
            <label for="" class="name">User Name</label>
            <br>
            <input type="text" name="A_Name" required><br><br>
            <label for=""  class="name">Password</label>
            <br>
            <input type="password" name="A_Pass" id="" required><br><br>
            <br>
            <a type="submit"class="" href="admin1.html"><button id="sbutton">Login</button></a>

            
            
        </center>
    </form>
    </div>
</body>
</html>