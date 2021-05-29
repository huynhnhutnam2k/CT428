<?php 
require_once 'Connect/connect.php';
if(isset($_GET['search']) && !empty($_GET['search'])){
    $key=$_GET['search'];
    $query = "SELECT * FROM products where products.pro_name like '%$key%' ";
    $rs = $conn->query($query);
    $products=array();
    while($row=$rs->fetch_assoc()){
        $products[]=$row;
    }
    header("Location: product.php");
}
else{
    $q_new = "SELECT * FROM products 
    order BY products.created_at DESC limit 4";
    $pro_new=array();
    $rs_new = $conn->query($q_new);
    while($row=$rs_new->fetch_assoc()){
        $pro_new[]=$row;
    }
    $q_hot = "SELECT * FROM products 
    where products.pro_hot =1
    LIMIT 8";
    $pro_hot=array();
    $rs_hot= $conn->query($q_hot);
    while ($row=$rs_hot->fetch_assoc()) {
        $pro_hot[]=$row;
    }
    
    $q_sale = "SELECT * FROM products 
    where products.pro_sale != 0
    LIMIT 4";
    $pro_sale = array();
    $rs_sale = $conn->query($q_sale);
    while($row=$rs_sale->fetch_assoc()){
        $pro_sale[]=$row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Daily Shop | Home</title>
    
    <!-- Font awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="css/jquery.simpleLens.css">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="css/theme-color/default-theme.css" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="css/style.css" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    

</head>
  <body> 
    
    

  
  <header id="aa-header">
    
     <?php include 'header.php' ?>
  </header>
 
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="product.php">Shop</a></li>
              <li><a href="contact.php">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <!-- / menu -->
  <!-- Start slider -->
  <section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="img/slider/man.jpg" alt="Men slide img" style="object-fit: cover;"/>
              </div>
              <
            </li>
            
            <li>
              <div class="seq-model">
                <img data-seq src="img/slider/jean.jpg" alt="Women Jeans slide img" style="object-fit: cover;" width="1080px" />
              </div>
              
            </li>
                      
            <li>
              <div class="seq-model">
                <img data-seq src="img/slider/shoes.jpg" alt="Shoes slide img" />
              </div>
              
            </li>
                              
          </ul>
        </div>
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>
  <!-- / slider -->
  
  <!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <ul class="nav nav-tabs aa-products-tab">
                    <li class="active"><a href="#hot" data-toggle="tab">HOT</a></li>
                    <li><a href="#sale" data-toggle="tab">SALE</a></li>
                    <li><a href="#new" data-toggle="tab">NEW</a></li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- Start men product category -->
                    <div class="tab-pane fade in active" id="hot">
                      
                      <ul class="aa-product-catg">
                        <?php foreach ($pro_hot as $hot) {
                         ?>
                          <li>
                            <figure>
                              <a class="aa-product-img" href="product-detail.php?id=<?=$hot['id']?>"><img src="<?=$hot['pro_view']?>" ></a>
                              <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <figcaption>
                                <h4 class="aa-product-title"><a href="product-detail.php?name=<?$hot['pro_name']?>">T-Shirt</a></h4>
                                <p style="text-align: right; color:red;"><?=number_format($pro['pro_price'])." VND";?></p>
                              </figcaption>
                            </figure>                         
                            
                           
                             <span class="aa-badge aa-sold-out" href="#">HOT</span>
                          </li>
                        <?php } ?>
                      </ul>
                      
                    </div>
                   
                    <div class="tab-pane fade" id="new">
                      <ul class="aa-product-catg">
                        <?php foreach ($pro_new as $new)  {
                        ?>
                          <li>
                            <figure>
                              <a class="aa-product-img" href="#"><img src="img/man/t-shirt-1.png" alt="polo shirt img"></a>
                              <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                               <figcaption>
                                <h4 class="aa-product-title"><a href="#">T-Shirt</a></h4>
                                <span class="aa-product-price">$45.50</span>
                              </figcaption>
                            </figure>                         
                            
                           
                             
                          </li>
                        <?php } ?>
                      </ul> 
                    </div>
                    
                    <div class="tab-pane fade" id="sale">
                       <ul class="aa-product-catg">
                        <?php foreach ($pro_sale as $sale)  {
                        ?>
                          <li>
                            <figure>
                              <a class="aa-product-img" href="#"><img src="img/electronics/electronic-1.png" alt="polo shirt img"></a>
                              <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <figcaption>
                                <h4 class="aa-product-title"><a href="#">This is Title</a></h4>
                                <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                              </figcaption>
                            </figure>                         
                            <span class="aa-badge aa-sale" href="#">SALE!</span>
                          </li>
                        <?php } ?>
                                               
                      </ul>
                      
                    </div>
                  </div>
                                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  
  
  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>FREE SHIPPING</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>30 DAYS MONEY BACK</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>SUPPORT 24/7</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 


  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>SUBCRIBE HERE </h3>
            <p> Nhập email để nhận tin tức mới nhất</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  

  
  <footer id="aa-footer">
    <?php include 'footer.php' ?>
    
  </footer>
  
 

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.js"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>  
  <!-- To Slider JS -->
  <script src="js/sequence.js"></script>
  <script src="js/sequence-theme.modern-slide-in.js"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="js/jquery.simpleLens.js"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="js/nouislider.js"></script>
  <!-- Custom js -->
  <script src="js/custom.js"></script> 

  </body>
</html>