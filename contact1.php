<?php 
$active='Contact';
include'header.php';?>
       <div id="content"><!-- #content Begin -->
             <div class="container"><!-- container Begin -->
                     <div class="box"><!-- box Begin -->
                         <div class="box-header"><!-- box-header Begin -->
                             <center><!-- center Begin -->
                                 <h2 style="color:#74b72e "> Feel free to Contact Us</h2>
                                 <p class="text-muted"><!-- text-muted Begin -->
                                     If you have any questions, feel free to contact us. Our Customer Service work <strong>24/7</strong>
                                 </p><!-- text-muted Finish -->
                             </center><!-- center Finish -->
                             <form action="contact1.php" method="post"><!-- form Begin -->
                                 <div class="form-group"><!-- form-group Begin -->
                                     <label>Name</label>
                                     <input type="text" class="form-control" name="name" required>
                                 </div><!-- form-group Finish -->
                                 <div class="form-group"><!-- form-group Begin -->
                                     <label>Email</label>
                                     <input type="email" class="form-control" name="email" required>
                                 </div><!-- form-group Finish -->
                                 <div class="form-group"><!-- form-group Begin -->
                                     <label>Subject</label>
                                     <input type="text" class="form-control" name="subject" required>
                                 </div><!-- form-group Finish -->
                                 <div class="form-group"><!-- form-group Begin -->
                                     <label>Message</label>
                                     <textarea name="message" class="form-control"></textarea>
                                 </div><!-- form-group Finish -->
                                 <div class="text-center"><!-- text-center Begin -->
                                     <button type="submit" name="submit" class="btn btn-success" style="background: #74b72e" >
                                     <i class="fa fa-user-md"></i> Send Message
                                     </button>
                                 </div><!-- text-center Finish -->
                             </form>
                                                    <?php 
                       
                       if(isset($_POST['submit'])){
                           
                           /// Admin receives message with this ///
                           
                           $sender_name = $_POST['name'];
                           
                           $sender_email = $_POST['email'];
                           
                           $sender_subject = $_POST['subject'];
                           
                           $sender_message = $_POST['message'];
                           
                           $receiver_email = "hungerworld2020@gmail.com";
                           
                           mail($receiver_email,$sender_name,$sender_subject,$sender_message,$sender_email);
                           
                           /// Auto reply to sender with this ///
                           
                           $email = $_POST['email'];
                           
                           $subject = "Welcome to my website";
                           
                           $msg = "Thanks for sending us message. We will get to you as soon as possible";
                           
                           $from = "Sonikasharma5716@gmail.com";
                           
                           mail($email,$subject,$msg,$from);
                           
                           echo "<h2 align='center'> Thank you for the message!! We will contact you soon. </h2>";
                           
                       }
                       
                       ?><!-- form Finish -->
                         </div><!-- box-header Finish -->
                     </div><!-- box Finish -->
             </div><!-- container Finish -->
         </div><!-- #content Finish -->
    </div>

      <hr>
               <footer style="margin-bottom:0px;">
        <div class="container-fluid text-center foot" id="foot">
            <div class=" row">
                <div class="footcon col-md-4">
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Contact us</h5>
                    <br>
                        

                    <ul class="list-unstyled">
                        <li>
                            Location: Cleckhudderfax,United Kingdom

                        </li>
                        <br>
                        <li>
                            Phone: +0768942122
                        </li>
                        <br>
                            
                        <li>
                            Email: CleckDiced2021@gmail.com
                        </li>
                        <br>
                    </ul>

                </div>
                <div class=" footcon col-md-4">
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">About us</h5>
                    <br>
                    <ul class="list-unstyled">
                        <li>
                            CleckDiced is the online platform for all traders and customer around cleckhudderfax area helping to selling and buying goods.                        </li>
                    </ul>

                </div>
                <div class="footcon col-md-4">
                    <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Menu</h5>
                    <br>
                    <ul class="list-unstyled">
                        <li>
                            <a href="index.php" style="color:white;">Home</a>
                        </li>
                        <br>
                        <li>
                            <a href="product.php"  style="color:white;">Products</a>
                        </li>
                        <li>
                        <br>
                            <a href="traderreg.php"  style="color:white;">Sell on CleckDiced</a>
                        </li>
                         <li>
                        <br>
                            <a href="FAQ.php"  style="color:white;">FAQ</a>
                        </li>
                    </ul>
                </div>
    
            </div>

            <div class="social">
                    <h5 style="color:white;" class="font-weight-bold  mt-3 mb-4">Socials</h5>

                <div class="justify-content-center">
                    <a href="https://instagram.com"><i class="fab fa-instagram m-2"></i></a>
                    <a href="https://facebook.com"><i class="fab fa-facebook-f m-2"></i></a>
                    <a href="https://plus.google.com"><i class="fab fa-google-plus-g"></i></a>
                </div>
            </div>
            <hr>
            <h5 style="color:white;">© 2020 Copyrignt: CleckDiced2021.com, All Rights Reserved.</h5>
        </div>
    </footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html> 
