      <?php
          $a = "SELECT * FROM CUSTOMER WHERE CUSTOMER_ID='$customerid'";
          $b = oci_parse($connection,$a);
          $c = oci_execute($b);
          while($d = oci_fetch_assoc($b)){
        ?>
      <div class="row">
        <div class=" column3 col-md-7">
          <img style="width:70%; height:250px; padding-right:20px; margin-top: 0px; justify-content: center;" src="images/<?php echo $d['PROFILEPIC'] ?> ">
        </div>

          <div class="column4 col-md-4">
                        <ul class="list-unstyled">

                <li>
                    <h4>Name: 
                      <i>
                        <?php echo $d['NAME'] ?>
                      </i>
                    </h4>
                </li>

                <br>

                <li>
                    <h4>Email:
                     <i> 
                      <?php echo $d['CUSTOMER_EMAIL'] ?>
                     </i>
                    </h4>
                </li>

                <br>

                <li>
                    <h4>Address : 
                      <i>
                      <?php echo $d['CUSTOMER_ADDRESS'] ?> 
                      </i>
                    </h4>
                </li>

                <br>

                <li>
                    <h4>Phone: 
                      <i>
                        <?php echo $d['CUSTOMER_PHONE'] ?>
                      </i>
                    </h4>
                </li>

                <br>
            </ul>

          </div>
      </div>
      <div class="row">
        <div class=" column2 col-md-5">
              
              <a class="btn btn-secondary sad" href="updatecustomerpassword.php">Update Password
              </a>
              <a class="btn btn-secondary sad" href="updatecustomer.php?cid='.$customerid.'" >Update Profile
                </a>
              </button>
              
        </div>
     </div>