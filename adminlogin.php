<?php
session_start();
include('connection.php');
include 'includes/navbar.php';
if(isset($_POST['login']))
{   
    $name= $_POST['ADMIN_NAME'];
    $pass = $_POST['PASSWORD'];

        $mno = "SELECT * FROM ADMIN WHERE ADMIN_NAME='$name' AND ADMIN_PASS='$pass'";
        $nop = oci_parse($connection,$mno);
        oci_execute($nop);
        $row = oci_fetch_assoc($nop);
        $opq = oci_num_rows($nop);
        if($opq == 1)
        {   $_SESSION['id']=$row['ADMIN_ID'];
            $_SESSION['ADMIN_NAME'] = $name;
            header("location:addProduct.php");
        }
        else
        {
            $errormessage="Invalid Login Details !!!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="../includes/style.css">
    <script type="text/javascript">
$(document).ready(function(){
    $(".close").click(function(){
        $('#myAlert').alert();
        
    });
});
</script>
    <style>

        /* inline css for login form */

.form-container{
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0px 0px 10px 0px ;
    margin-bottom:15px;
    margin-top: 15px;
}

.form-container p{
    size: 12px;
    text-align: center;
}
.form-container .form-control{
    border:1px solid ##74b72e;
    background: white;
}
.loghead{
    color: #74b72e;

}
.log{
    background: #74b72e;
    color: white;
    font-family: Verdana, Geneva, Tahoma, sans-serif;

}

    </style>

</head>
<body>   
    <div class="container-fluid">
        <div class="row justify-content-center ">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <form action="" class="form-container" enctype="multipart/form-data" method="POST">
                    <h4 class="loghead text-center">Login Form</h4>
                    <br>
                    <?php

                        if(isset($errormessage)){
                            echo"<div class='alert alert-danger' id='myAlert'>
                            <a href='#' class='close' data-dismiss='alert'>&times;</a>";
                            echo "$errormessage";
                            echo "</div>";
                        }
                        ?>
                    <div class="form-group">
                        <input name="ADMIN_NAME" type="text" class="form-control" required  placeholder="   Enter name">
                    </div>
                    <div class="form-group">
                        <input type="password" name="PASSWORD" class="form-control" required  placeholder="   Enter password">
                        <br>
                    </div>
                    <button type="submit" name="login" class="btn btn-block log">Login</button>
                       
                    
                </form>
            </div>
        </div>
    </div>
<?php include ("footer.php"); ?>
</body>
</html>



