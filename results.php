<!-- Seperate file for searching action -->
<?php
session_start();
// starting session
// reducting unnecessary error
error_reporting(0);
?>
    <?php
    if(!isset($_SESSION['customerid'])){
      include("header.php");
    }
?>
<div class="col-md-12"> 
<div class="container">
            <h1 class="text-center" style=" color:#74b72e; height: 10px;" >Our Products</h1>
            <hr style="background:#ff5300;"> 
</div>
        <!-- <div class="container justify-content-center text-center"> -->
        
                </div>
              </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
<div  class="col-md-4" style="margin-right: 20px;">
        <div class="panel-heading">
        <h2>Categories:</h2>
    </div>
            <form method="POST" enctype="multipart/form-data" action="results.php" style="margin-left: 8px;">
                    <div class="input-group mx-5 my-2">
                        <select class="cat" name="cat" style=" width: 100%; height: 30px;">
                        <?php
                            $d="SELECT * FROM TRADER";
                            $f = oci_parse($connection,$d);
                            $g= oci_execute($f);
                            while($h= oci_fetch_assoc($f)){
                             echo'<option value="'.$h['CATEGORY'].'">  '.$h['CATEGORY'].'</option>';
                            }
                        ?>
                        <!-- <br> -->
                         </select>
                         <div class="search-btn">
                          <!-- <br> -->
                        <input type="text" class="form-control" name="search" placeholder="  Search Here" style="width: 70%;">
                      </div>
<!-- <br> -->
                          <input type="submit" name="sub" value="Search" class="form-control" style=" background-color: #74b72e;border-color:#74b72e; color:white; height: 33px; width: 30%;">
                        </div>
                    </div>
                    </form>
        </ul><!-- nav nav-pills nav-stacked category-menu Finish -->
    </div><!-- panel-body Finish -->
  </div>
            <?php
if(isset($_POST['submit'])){
    if(isset($_GET['search']) && isset($_GET['cat'])){
    $search = $_GET['search'];
                $s=null;
                $cat = $_GET['cat'];
                echo $cat;
                echo $search;
            }
                if($_POST['sort']=='PRODUCTPRICEDESC'){
                    if(isset($_GET['search']) && isset($_GET['cat'])){
                    $s = "SELECT * FROM PRODUCT ,TRADER WHERE PRODUCT.PRODUCT_NAME LIKE '%$search%' AND TRADER.CATEGORY = '$cat' AND TRADER.TRADER_ID = PRODUCT.TRADER_ID order by PRODUCTPRICE DESC";
                    }else{
                        $s = "SELECT * FROM PRODUCT order by PRODUCTPRICE DESC";
                    }
                    echo $s;
                }
                if($_POST['sort']=='PRODUCTPRICEASC'){
                    if(isset($_GET['search']) && isset($_GET['cat'])){
                    $s = "SELECT * FROM PRODUCT ,TRADER WHERE PRODUCT.PRODUCT_NAME LIKE '%$search%' AND TRADER.CATEGORY = '$cat' AND TRADER.TRADER_ID = PRODUCT.TRADER_ID order by PRODUCTPRICE ASC";
                    }
                    else{
                        $s = "SELECT * FROM PRODUCT order by PRODUCTPRICE ASC";
                    }
                    echo $s;
                }
                if($_POST['sort']=='PRODUCT_NAMEDESC'){
                    if(isset($_GET['search']) && isset($_GET['cat'])){
                    $s = "SELECT * FROM PRODUCT ,TRADER WHERE PRODUCT.PRODUCT_NAME LIKE '%$search%' AND TRADER.CATEGORY = '$cat' AND TRADER.TRADER_ID = PRODUCT.TRADER_ID ORDER BY PRODUCT_NAME DESC";
                    }
                    else{
                        $s = "SELECT * FROM PRODUCT ORDER BY PRODUCT_NAME DESC";
                    }
                    echo "</br>";
                    echo $s;
                }
                if($_POST['sort']=='PRODUCT_NAMEASC'){
                    if(isset($_GET['search']) && isset($_GET['cat'])){
                    $s = "SELECT * FROM PRODUCT ,TRADER WHERE PRODUCT.PRODUCT_NAME LIKE '%$search%' AND TRADER.CATEGORY = '$cat' AND TRADER.TRADER_ID = PRODUCT.TRADER_ID order by PRODUCT_NAME ASC";
                    }
                    else{
                        $s = "SELECT * FROM PRODUCT ORDER BY PRODUCT_NAME";
                    }
                    echo "</br>";
                    echo $s;
                }
                $n = oci_parse($connection,$s);
           $o = oci_execute($n);
           while($ro = oci_fetch_assoc($n)){
                echo'<div class="col-md-4 col-sm-6 center-responsive">';
                    echo'<div class="product">';
                        echo'<img src="products/'.$ro['PRODUCT_PIC1'].'" alt="product image" class="img-responsive">';
                        echo '<div class ="text">';
                       echo'<h3>';
                     echo'<a href="details.php?
                                pid='.$ro['PRODUCT_ID'].'">'.$ro['PRODUCT_NAME'].'</a>';
                                               echo'</h3>';
                            if ($ro['DISAMOUNT']>0) {
                           echo'<p class="price"><s><span>$'.$ro['PRODUCTPRICE'].'/'.$ro['PRODUCTUNIT'].'</s></p>';
                         $d= $ro['DISAMOUNT'];
                        $ro['PRODUCTPRICE'] = $ro['PRODUCTPRICE'] - ($ro['PRODUCTPRICE'] * ($d/100));
                        echo'<h4 class="price"><span>$'.($ro['PRODUCTPRICE'] - ($ro['PRODUCTPRICE'] * ($d/100))).'/'.$ro['PRODUCTUNIT'].'</h4>';
                        }else
                        {
                           echo'<p class="price"><span>$'.$ro['PRODUCTPRICE'].'/'.$ro['PRODUCTUNIT'].'</p>';
                        }
                      echo'<p class="buttons">';
                            echo'<a class="btn btn-default" href="details.php?
                                pid='.$ro['PRODUCT_ID'].'">
                                                        View Details
                                                    </a>';
                    if(!isset($_SESSION['cid']))
                      {
                            echo'  <a class="btn btn-primary" href="login.php?
                            pid='.$ro['PRODUCT_ID'].'">
                            <i class="fa fa-shopping-cart"></i> Add To Cart
                            </a>';
                            echo'</p>';
                      }
                      else
                      {
                               echo'  <a class="btn btn-primary" href="details.php?
                            pid='.$ro['PRODUCT_ID'].'">
                            <i class="fa fa-shopping-cart"></i> Add To Cart
                            </a>';
                            echo'</p>';
                      }
                       echo'</div>'; 
                    echo'</div>';
               echo'</div>';
           }
         }else{
            if(isset($_POST['sub'])){
                $search = $_POST['search'];
                $s=null;
                $cat = $_POST['cat'];
    if(!empty($cat)){
        $s = "SELECT * FROM PRODUCT ,TRADER WHERE PRODUCT.PRODUCT_NAME LIKE '%$search%' AND TRADER.CATEGORY = '$cat' AND TRADER.TRADER_ID = PRODUCT.TRADER_ID";
    }
    else{    
        $s = "SELECT * FROM PRODUCT WHERE PRODUCT_NAME LIKE '%$search%'";
    }
        $n = oci_parse($connection,$s);
           $o = oci_execute($n);
            $x = oci_num_rows($n);
           while($ro = oci_fetch_assoc($n)){
                echo'<div class="col-md-4 center-responsive">';
                    echo'<div class="product">';
                        echo'<img src="products/'.$ro['PRODUCT_PIC1'].'" alt="product image" class="img-responsive">';
                        echo '<div class ="text">';
                       echo'<h3>';
                     echo'<a href="details.php?
                                pid='.$ro['PRODUCT_ID'].'">'.$ro['PRODUCT_NAME'].'</a>';
                                               echo'</h3>';
                             if ($ro['DISAMOUNT']>0) {
                           echo'<p class="price"><s><span>$'.$ro['PRODUCTPRICE'].'/'.$ro['PRODUCTUNIT'].'</s></p>';
                         $d= $ro['DISAMOUNT'];
                        $ro['PRODUCTPRICE'] = $ro['PRODUCTPRICE'] - ($ro['PRODUCTPRICE'] * ($d/100));
                        echo'<h4 class="price"><span>$'.($ro['PRODUCTPRICE'] - ($ro['PRODUCTPRICE'] * ($d/100))).'/'.$ro['PRODUCTUNIT'].'</h4>';
                        }else
                        {
                           echo'<p class="price"><span>$'.$ro['PRODUCTPRICE'].'/'.$ro['PRODUCTUNIT'].'</p>';
                        }
                      echo'<p class="buttons">';
                            echo'<a class="btn btn-default" href="details.php?
                                pid='.$ro['PRODUCT_ID'].'">
                                                        View Details
                                                    </a>';
                               echo'  <a class="btn btn-primary" href="details.php?
                            pid='.$ro['PRODUCT_ID'].'">
                                                        <i class="fa fa-shopping-cart"></i> Add To Cart
                                                        </a>';
                                                        echo'</p>';
                       echo'</div>'; 
                    echo'</div>';
               echo'</div>';
            }
        }
      }
           ?>    
   </body>
</html>