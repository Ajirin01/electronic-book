<?php 
$contents = json_decode(file_get_contents("contents.json")); 
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Electronic</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />


    <!-- shop links -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="shop/lib/animate/animate.min.css" rel="stylesheet">
    <link href="shop/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- PDF.js library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.js"></script>

    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="shop/css/style.css" rel="stylesheet">

    <style>
        #pdfViewer {
        width: 100%;
        height: 500px;
        }

        canvas{
        width: 100%;
        height: inherit;
        }
    </style>
</head>

<body>
  <div class="hero_area" style="height: auto; padding-bottom: 20px">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <?php include_once("nav-bar-component.php") ?>
      </div>
    </header>
    <!-- end header section -->
  </div>


        <!-- contact section -->
  <section class="contact_section layout_padding">
    <div class="container">
      <h2 class="font-weight-bold">
        Login
      </h2>
      <div class="row">
        <div class="col-md-8 mr-auto">
          <form id="loginForm">
            <div class="contact_form-container">
              <div>
                <div>
                  <input id="email" name="email" type="email" placeholder="Email">
                </div>
                <div>
                  <input id="password" name="password" type="password" placeholder="Password">
                </div>

                <div class="mt-2">
                  <p>Don't have account? | <a href="register">Register now</a></p>
                </div>


                <div class="mt-5">
                  <button type="submit">
                    Submit
                  </button>
                </div>
              </div>

            </div>

          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->

  <!-- end map section -->

  <section class="info_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5>
              MEET THE AUTHOR
          </h5>
          <!-- <div> -->
            <img src="images/author2.png" style="width: 150px; height: 270px; margin-top: -40px;" alt="">
          <!-- </div> -->
        </div>
        <div class="col-md-4">
          <p>
            Henry Ohiani Ohize is a Senior Lecturer in the Department of Electrical and 
            Electronics Engineering at the Federal University of Technology, Minna, Nigeria. He 
            obtained his doctorate degree from the University of Cape Town, South Africa, in 
            2017. With over 15 years of teaching experience in various universities, he has been 
            exposed to the cultural diversity of students and their idiosyncrasies
          </p>
        </div>
        <div class="col-md-4">
          <div class="social_container">
            <h5>
              Follow Us
            </h5>
            <div class="social-box">
              <a href="">
                <img src="images/fb.png" alt="">
              </a>

              <a href="">
                <img src="images/twitter.png" alt="">
              </a>
              <a href="">
                <img src="images/linkedin.png" alt="">
              </a>
              <a href="">
                <img src="images/instagram.png" alt="">
              </a>
            </div>
          </div>
          <div class="subscribe_container">
            <h5>
              Subscribe Now
            </h5>
            <div class="form_container">
              <form action="">
                <input type="email">
                <button type="submit">
                  Subscribe
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      Copyright &copy; 2023 All Rights Reserved By
      <a href="https://ajirinibi.com.ng/">Ajirinibi</a>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

  <!-- shop scripts -->

  <!-- JavaScript Libraries starts -->
  <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script> -->
  <script src="shop/lib/easing/easing.min.js"></script>
  <script src="shop/lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Contact Javascript File -->
  <script src="shop/mail/jqBootstrapValidation.min.js"></script>
  <script src="shop/mail/contact.js"></script>

  <!-- Template Javascript -->
  <script src="shop/js/main.js"></script>
  <!-- JavaScript Libraries ends -->

  
  <script src="js/ajax-login.js"></script>

  <script src="js/content-resource-handler.js"></script>

  <!-- google map js -->
  
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap">
  </script> -->
  <!-- end google map js -->
</body>

</html>