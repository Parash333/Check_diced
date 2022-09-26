<?php
session_start();
$active = 'Account';
if (!isset($_SESSION['cid'])) {
    header("location:login.php");
    # code...
  }

    else {
        
        $customerid=$_SESSION['cid'];
    
    }

    include 'connection.php';

  ?>
  <center><!-- center Begin -->
    
    <h1> Delete Your Account: </h1>
    
    <form action="" method="post"><!-- form Begin -->
        
       <input type="submit" name="Yes" value="Yes, I Want To Delete" class="btn btn-danger"> 
        
       <input type="submit" name="No" value="No, I Donot Want To Delete" class="btn btn-primary"> 
        
    </form><!-- form Finish -->
    
</center><!-- center Finish -->


<?php 

$customerid = $_SESSION['cid'];

if(isset($_POST['Yes'])){
    
    $delete_customer = "delete from CUSTOMER where CUSTOMER_ID='$customerid'";
    
    $run_delete_customer = oci_parse($connection,$delete_customer);
    $del = oci_execute($run_delete_customer);
    
    if($run_delete_customer){
        
        session_destroy();
        
        echo "<script>alert('Successfully deleted your account')</script>";
        
        echo "<script>window.open('index.php','_self')</script>";
        
    }
    
}

if(isset($_POST['No'])){
    
    echo "<script>window.open('customerview.php','_self')</script>";
    
}

?>