<?php
$active = 'Account';
include 'connection.php';
include 'header.php';
// include 'include/nav.php';
$customer_session = $_SESSION['cid'];

$get_customer = "select * from CUSTOMER where CUSTOMER_ID='$customer_session'";

$run_customer = oci_parse($connection,$get_customer);

oci_execute($run_customer);

$row_customer = oci_fetch_array($run_customer);

$customer_id = $row_customer['CUSTOMER_ID'];

$customer_name = $row_customer['NAME'];

$customer_email = $row_customer['CUSTOMER_EMAIL'];

$customer_address = $row_customer['CUSTOMER_ADDRESS'];

$customer_contact = $row_customer['CUSTOMER_PHONE'];

$customer_image = $row_customer['PROFILEPIC'];

?>

    <style>
.columnup
{       
      width:100%;
      padding: 50px;
      border: 2px solid #74b72e;
      border-radius: 2px;
      margin-top:10px;
      text-align: left;
      box-shadow: 0% 2px #74b72e;

}


    </style>
<div class="row">
    <div class=" columnup col-md-8">
<h1 align="center" style="color:#74b72e;"> Edit Your Account </h1>

<form action="" method="post" enctype="multipart/form-data"><!-- form Begin -->
   
    <div class="form-group"><!-- form-group Begin -->
       
        <label> Customer Name: </label>
       
        <input type="text" name="NAME" class="form-control" value="<?php echo $customer_name; ?>" required>
       
    </div><!-- form-group Finish -->
   
    <div class="form-group"><!-- form-group Begin -->
       
        <label> Customer Email: </label>
       
        <input type="text" name="CUSTOMER_EMAIL" class="form-control" value="<?php echo $customer_email; ?>" required>
       
    </div><!-- form-group Finish -->
   
   
    <div class="form-group"><!-- form-group Begin -->
       
        <label> Customer Contact: </label>
       
        <input type="text" name="CUSTOMER_PHONE" class="form-control" value="<?php echo $customer_contact; ?>" required>
       
    </div><!-- form-group Finish -->
   
    <div class="form-group"><!-- form-group Begin -->
       
        <label> Customer Address: </label>
       
        <input type="text" name="CUSTOMER_ADDRESS" class="form-control" value="<?php echo $customer_address; ?>" required>
       
    </div><!-- form-group Finish -->
   
    <div class="form-group"><!-- form-group Begin -->
       
        <label> Customer Image: </label>
       
        <input type="file" name="PROFILEPIC" class="form-control form-height-custom">
       
        <img class="img-responsive" style="width: 25%; height: 25%;" src="images//<?php echo isset($c_image) ? $c_image : $customer_image ?>" alt="customer Image">
       
    </div><!-- form-group Finish -->
   
    <div class="text-center"><!-- text-center Begin -->
       
        <button name="update" class="btn btn-primary" style="background-color:#74b72e;"><!-- btn btn-primary Begin -->
           
            <i class="fa fa-user-md"></i> Update Now
           
        </button><!-- btn btn-primary inish -->
       
    </div><!-- text-center Finish -->
   <br>
</form><!-- form Finish -->
</div>
</div>
</div>
<br>
<?php

if(isset($_POST['update'])){
   
    $update_id = $customer_id;
   
    $c_name = $_POST['NAME'];
   
    $c_email = $_POST['CUSTOMER_EMAIL'];
   
    $c_address = $_POST['CUSTOMER_ADDRESS'];
   
    $c_contact = $_POST['CUSTOMER_PHONE'];
   
    $c_image = $_FILES['PROFILEPIC']['name'];
   
    $c_image_tmp = $_FILES['PROFILEPIC']['tmp_name'];
    if (!empty($c_image))
    {
    move_uploaded_file ($c_image_tmp,"images/$c_image");
    $update_customer = "UPDATE CUSTOMER set NAME='$c_name',CUSTOMER_EMAIL='$c_email',CUSTOMER_ADDRESS='$c_address',CUSTOMER_PHONE='$c_contact',PROFILEPIC='$c_image' where CUSTOMER_ID='$update_id' ";
   }
   else
   {
        $update_customer = "UPDATE CUSTOMER set NAME='$c_name',CUSTOMER_EMAIL='$c_email',CUSTOMER_ADDRESS='$c_address',CUSTOMER_PHONE='$c_contact' where CUSTOMER_ID='$update_id' ";
   }
    $run_customer = oci_parse($connection,$update_customer);

    oci_execute($run_customer);
   
    if($run_customer){
       
        echo "<script>alert('Your account has been updated successfully. Please login again.')</script>";
       
        echo "<script>window.open('updatecustomer.php','_self')</script>";
       
    }
   
}
include 'footer.php';

?>