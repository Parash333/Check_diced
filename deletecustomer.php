<?php 
session_start();
    
    if(!isset($_SESSION['id'])){
        
        echo "<script>window.open('adminlogin.php','_self')</script>";
    }else{
?>

<?php 

    if(isset($_GET['delete_customer'])){
        
        $delete_id = $_GET['delete_customer'];
        
        $delete_c = "delete from CUSTOMER where CUSTOMER_ID='$delete_id'";
        
        $run_delete = oci_parse($connection,$delete_c);
        
        if($run_delete){
            
            echo "<script>alert('One of your costumer has been Deleted')</script>";
            
            echo "<script>window.open('index.php?view_customers','_self')</script>";
            
        }
        
    }

?>

<?php } ?>