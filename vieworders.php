<!doctype html>
<html class="no-js" lang="en">

    <!--Header towsss-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>ORORS</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/favicon.png">

        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/stylecheckout.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>    
        <link href="https://fonts.googleapis.com/css2?family=Andada+Pro&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    </head>

    <!--Body-->
    <body>
       

        <!-- PRELOADER -->
        <div id="preloader">
            <div class="preloader-area">
            	<div class="preloader-box">
            		<div class="preloader"></div>
            	</div>
            </div>
        </div>

        <section class="header-top-section">
            <div class="container">
                <div class="row">
                    <div  class="col-md-6">
                        <div class="header-top-content">
                            <ul class="nav nav-pills navbar-left">
                                <li><a href="#"><i class="pe-7s-call"></i><span>0999-999-9999</span></a></li>
                                <li><a href="#"><i class="pe-7s-mail"></i><span> resto@gmail.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div  class="col-md-6">
                        <div class="header-top-menu">
                            <ul class="nav nav-pills navbar-right">
                                <li><a href="account.php">My Account</a></li>
                                <li><a href="addcart.php">Cart</a></li>
                                <li><a href="#">Checkout</a></li>
                                <li><a href="loginpage.php"><i class="pe-7s-lock"></i>Login/Register</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<!--Header again-->
        <header class="header-section">
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><b>D</b>avids<b> G</b>rill</a>
                    </div>
<!--Navigation bar-->
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="menu.php">Menu</a></li>
                            <li ><a href="reservation.php">Book a Rservation</a></li>
                            <li><a href="aboutus.php">About Us</a></li>
                            <li><a href="gallery.php">Gallery</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container -->
            </nav>
        </header>

           <!--Checkout Section-->
        <div class="checkout">
            <div class="shopping-checkout">
              <!-- Title -->
              <div class="title">
                Checkout
              </div>
              <!--Title head of the checkout-->
              <div class= "titleheadcheckout">
                <div class="producttitlehead">
                  Product
                </div>
                <div class="productdesctitlehead">
                  Description
                </div>
                <div class="quantitytitlehead">
                  Quantity
                </div>
                <div class = "totalpricetitlehead">
                   Total Price
                </div>
                <div class = "statustitlehead">
                  Status
                </div>
              </div>
              <!-- Product #1 -->
              <div class="item">
                <div class="buttons">
                  <input type="checkbox" name="checkbox" id="checkbox_add">
                </div>
                <div class="image">
                  <img src="menu/cart/porktocino.png" alt="Pork tocino" />
                </div>
        
                <div class="description">
                  <span>Pork Tocino</span>
                  <span>Price: &#8369 99.00</span>
                </div>
        
                <div class="quantity">
                  <input type="text" name="name" value="1">
                </div>
                <div class="total-price">&#8369 99.00 </div>

               
              </div>

             
        
              <!-- Product #2 -->
              <div class="item">
                <div class="buttons">
                  <input type="checkbox" name="checkbox" id="checkbox_add">
                </div>
                <div class="image">
                  <img src="menu/cart/porktapa.png" alt="PorkTapa"/>
                </div>
        
                <div class="description">
                  <span>PorkTapa</span>
                  <span>Price: &#8369 89.00</span>
                </div>
        
                <div class="quantity">
                  <input type="text" name="name" value="1">
                </div>
                <div class="total-price">&#8369 89.00</div>
              </div>
        
              <!-- Product #3 -->
              <div class="item">
                <div class="buttons">
                  <input type="checkbox" name="checkbox" id="checkbox_add">
                </div>
                <div class="image">
                  <img src="menu/cart/Beeftapa.png" alt="Beef Tapa" />
                </div>
        
                <div class="description">
                  <span>BeefTapa</span>
                  <span>Price: &#8369 125.00</span>
                </div>
        
                <div class="quantity">
                  <input type="text" name="name" value="1">
                </div>
                <div class="total-price">&#8369 125.00</div>
              </div>
              <div class="remove_checkout"> 
                <button><a href="#" class= "removebutton removebutton-primary">Cancel</a></button>
              </div>
            </div>
                     <!--Footer-->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="center">Made with <i class="fa fa-heart"></i> by <a href="" target="_blank">Zunigarodelyn</a>. All Rights Reserved</p>
                        
                    </div>
                </div>
            </div>
        </footer>

        <!-- JQUERY -->
        <script src="js/vendor/jquery-1.11.2.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>