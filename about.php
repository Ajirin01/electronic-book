<?php
  session_start();
  // Include your database connection script here
  include_once("db/db_connect.php");

  // Fetch contents from the database
  $query = "SELECT * FROM contents ORDER BY id ASC";
  $result = $conn->query($query);

  if ($result) {
      // Fetch contents from the database
      $contents = $result->fetch_all(MYSQLI_ASSOC);
  } else {
      // Handle database error if needed
      $contents = array();
  }
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

        .divider{
          width: 70%; 
          height: 2px; 
          background-color: gray; 
          margin: 0 auto; 
          opacity: .3; 
          margin-bottom: 20px
        }
    </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <?php include_once("nav-bar-component.php") ?>
      </div>
    </header>
    <!-- end header section -->

    <section class="fruit_section" style="margin-top: 50px">
        <div class="container">
        <h1 class="custom_heading">About Author</h1>
        <div class="divider"></div>
        <div class="row layout_padding2">
            <div class="col-md-8">
                <div class="fruit_detail-box">
                    <p>
                    Henry Ohiani Ohize is a senior lecturer in the Department of Electrical and Electronics 
                    Engineering at the Federal University of Technology, Minna, Nigeria. He earned his doctorate 
                    degree from the University of Cape Town, South Africa, in 2017, and has over 15 years of teaching 
                    experience across various universities.
                    </p>
                    <p>
                    Having taught at institutions like the Federal University of Technology Minna, Nigeria, 
                    Confluence University of Science and Technology, Osara, Nigeria, Cape Peninsular University 
                    of Science and Technology, South Africa and the University of Cape Town, South Africa, 
                    Dr. Ohize is well-versed in the diverse cultural backgrounds of students. This exposure has 
                    shaped his teaching philosophy and allowed him to connect effectively with a broad range of learners.
                    </p>

                    <p>
                        As an author, Dr. Ohize combines his extensive knowledge in electronics with practical 
                        insights to create an accessible learning experience. His commitment to advancing the 
                        field is evident in his ongoing research efforts, ensuring that his contributions remain 
                        relevant in the dynamic landscape of electronics.
                    </p>

                    <p>
                        In summary, Dr. Henry Ohiani Ohize's career reflects a dedication to excellence in education, 
                        a passion for electronics, and a commitment to staying at the forefront of technological 
                        advancements. His expertise makes him a valuable resource for students and professionals alike.
                    </p>
                    
                </div>
            </div>
            <div class="col-md-4 d-flex justify-content-center align-items-center">
                <div class="fruit_img-box d-flex justify-content-center align-items-center">
                    <img src="images/author2.jpg" alt="" class="" width="350px" style="box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.208); margin-top: -50px" />
                </div>
            </div>
        </div>
        </div>
    </section>

    <div class="divider"></div>

    <?php include_once("footer-component.php"); ?>



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

<script>
  function scrollToContactUs() {
      // Get a reference to the target element
      event.preventDefault()
      var targetElement = document.getElementById('targetElement');

      // Scroll to the target element
      targetElement.scrollIntoView({ behavior: 'smooth' });
  }
</script>

<script src="js/content-resource-handler.js"></script>

<script src="js/ajax-create-content.js"></script>
<script src="js/ajax-edit-content.js"></script>
<script src="js/ajax-delete-content.js"></script>


<!-- google map js -->

<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap">
</script> -->
<!-- end google map js -->
</body>

</html>