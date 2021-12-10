<!doctype html>
<?php
include'includes/connect.php';
?>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>ORORS</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/favicon.png">

        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/stylereserve.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Andada+Pro&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
        <![endif]-->
    </head>
    <body>

        <!-- PRELOADER -->
        <div id="preloader">
            <div class="preloader-area">
            	<div class="preloader-box">
            		<div class="preloader"></div>
            	</div>
            </div>
        </div>

        <?php include('./header_strip.php')?>

<!--Header-->
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
                        <a class="navbar-brand" href="#"><img src="images/logo.jpeg" width="320" height="439"></a>
                        <br>
                        <br>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <br> <br>
                        <ul class="nav navbar-nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="menu.php">Menu</a></li>
                            <li  class="active"><a href="reservation.php">Book a Reservation</a></li>
                            <li><a href="aboutus.php">About Us</a></li>
                            <li class="active">
                            <li><a href="gallery.php">Gallery</a></li>
                            </li>
                            <li><a href="#contactus">Contact Us</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right cart-menu">
                        <li><a href="#" class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                        <li><a href="addcart.php"><span> Cart </span> <span class="shoping-cart">0</span></a></li>
                    </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container -->
            </nav>
            <br>
        </header>


        <!--Search Section-->
        <section class="search-section">
            <div class="container">
                <div class="row subscribe-from">
                    <div class="col-md-12">
                        <form class="form-inline col-md-12 wow fadeInDown animated">
                            <div class="form-group">
                                <input type="email" class="form-control subscribe" id="email" placeholder="Search...">
                                <button class="suscribe-btn" ><i class="pe-7s-search"></i></button>
                            </div>
                        </form><!-- end /. form -->
                    </div>
                </div><!-- end of/. row -->
            </div><!-- end of /.container -->
        </section>



        <!--Reservation-->
        <section class="reserv-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>Reservation</h1>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <br>
                    <br> <br>
                    <div class="col-md-6 wow fadeInLeft animated">
                        <div class="left-content">
                        <div class = "container-time">
                    <h2 class = "heading"> Time Open</h2>
                    <h3 class="headingdays">Monday - Friday</h3>
                    <p>7am - 11am (Breakfast)</p>
                    <p>11am - 10pm (Lunch/Dinner)</p>

                    <h3 class="headingdays">Saturday</h3>
                    <p>9am - 11am (Breakfast)</p>
                    <p>11am - 10pm (Lunch/Dinner)</p>

                    <h3 class="headingdays">Sunday</h3>
                    <p>We are close on Sunday.</p>
                    <p>Sunday is for Jesus</p>

                    <hr>
                     <h4 class="headingphone"> Call Us : 0999-999-9999</h4>
                </div>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeInRight animated">
                        <form name="reservation" class="contact-form">
                            <div class="row">
                            <h2 class="heading heading-yellow"> Reservation Online </h2> 
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <p>Name</p>
                                        <input type="text" id="name" name="name" class="form-control" id="name" placeholder="Name" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                    <p>Contact number</p>
                                        <input ttype="tel" name="cnum" class="form-control" id="cnum" placeholder="0999-000-0000" required autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                    <p>Date</p>
                                        <input type="date" class="form-control" id="rdate" require autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <p>Time</p>
                                        <input type="time" class="form-control" id="rtime" require autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <p>How many people</p>
                                     <select name= "selectnumberofpeople" id="#"  class="form-control" required>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="16">18</option>
                                        <option value="19">19</option>
                                        <option value="20+">20+</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <p>Type of Reservation</p>
                                        <select name= "selectreservation" id="#"  class="form-control" required>
                                        <option value="Table Reservation">Table Reservation</option>
                                        <!-- <option value="Table and Food Reservation">Table and Food Reservation</option> -->
                                    </select>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <textarea  autocomplete="off" name="" id="" class="form-control" cols="30" rows="5" placeholder="Please state your other concerns regarding to your reservation.."></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="submit" id="btn_res_submit" class="contact-submit" value="Submit" />
                                        <input type="submit" class="contact-submit" value="Cancel" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>


<!--ContactUs--->
        <section id="contactus" class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="titie-section wow fadeInDown animated ">
                            <h1>GET IN TOUCH</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 wow fadeInLeft animated">
                        <div class="left-content">
                            <h1><span>D</span>avids<span>G</span>rill</h1>
                            <h3>We'd love To Meet You In Person Or Via The Web!</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel nulla sapien. Class aptent tacitiaptent taciti sociosqu ad lit himenaeos. Suspendisse massa urna, luctus ut vestibulum necs et, vulputate quis urna. Donec at commodo erat.</p>
                            <div class="contact-info">
                                <p><b>Main Office:</b> 396 Brgy. Santol</p>
                                <p><b>Phone:</b> 1.555.555.5555</p>
                                <p><b>Email:</b> resto@gmail.com</p>
                            </div>
                            <div class="social-media">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeInRight animated">
                        <form action="" method="" class="contact-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" placeholder="Your Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="name" placeholder="Website URL">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <textarea name="" id="" class="form-control" cols="30" rows="5" placeholder="Your Message..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="submit" class="contact-submit" value="Send" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!--Footer-->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="center">Made with <i class="fa fa-heart"></i> <a href="" target="_blank">Group3</a>. All Rights Reserved</p>
                    </div>
                    <div class="col-md-12">
                        <p class="center"> <a href="" target="_blank">Terms and condition</a> <br><a href="" target="_blank">    Privacy and Policy</a></p>
                    </div>
                    <br>
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

        <script>
			var form = document.querySelector("form[name='reservation']");
			form.addEventListener("submit",function (event) {
            event.preventDefault();
			var data = new FormData(form);
			
			fetch('app/client/reservation.php',{method:"POST",body:data})
			.then(data => data.json())
			.then(data => {
				if(data.response){
					alert('Reservation Submitted')
					window.location.href ="index.php"
				}
				if(!data.response){
					if(data.hasOwnProperty("message")){
						alert(data.message);
					}
				}
			})
			
			}, false);

		
			const isNumericInput = (event) => {
				const key = event.keyCode;
				return ((key >= 48 && key <= 57) || // Allow number line
					(key >= 96 && key <= 105) // Allow number pad
				);
			};

			const isModifierKey = (event) => {
				const key = event.keyCode;
				return (event.shiftKey === true || key === 35 || key === 36) || // Allow Shift, Home, End
					(key === 8 || key === 9 || key === 13 || key === 46) || // Allow Backspace, Tab, Enter, Delete
					(key > 36 && key < 41) || // Allow left, up, right, down
					(
						// Allow Ctrl/Command + A,C,V,X,Z
						(event.ctrlKey === true || event.metaKey === true) &&
						(key === 65 || key === 67 || key === 86 || key === 88 || key === 90)
					)
			};

			const enforceFormat = (event) => {
				// Input must be of a valid number format or a modifier key, and not longer than ten digits
				if(!isNumericInput(event) && !isModifierKey(event)){
					event.preventDefault();
				}
			};

			const formatToPhone = (event) => {
				if(isModifierKey(event)) {return;}

				const input = event.target.value.replace(/\D/g,'').substring(0,11); // First ten digits of input only
				const areaCode = input.substring(0,4);
				const middle = input.substring(4,7);
				const last = input.substring(7,11);

				if(input.length > 6){event.target.value = `${areaCode} ${middle}-${last}`;}
				else if(input.length > 3){event.target.value = `${areaCode} ${middle}`;}
				else if(input.length > 0){event.target.value = `${areaCode}`;}
			};

			const inputElement = document.getElementById('cnum');
			inputElement.addEventListener('keydown',enforceFormat);
			inputElement.addEventListener('keyup',formatToPhone);
		</script>
    </body>
</html>
