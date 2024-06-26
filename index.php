<?php include_once("header.php"); ?>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <?php include_once("nav-bar-component.php") ?>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <!-- <div class="carousel-item active">
            <div class="slider_item-box">
              <div class="slider_item-container">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="slider_item-detail">
                        <div>
                          <h1 style="font-size: 2.5rem">
                            Revolutionize Your <br />
                            Understanding of Electronics.
                          </h1>
                          <p>
                            Embark on a journey that redefines learning through circuit simulations.
                          </p>
                          <div class="d-flex">
                            <a href="https://flutterwave.com/store/ajirinibi/eyf3fo2vsic3m0" class="text-uppercase custom_orange-btn mr-3">
                              Shop Now
                            </a>
                            <a onclick="scrollToContactUs()" href="" class="text-uppercase custom_dark-btn">
                              Contact Us
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="slider_img-box">
                        <div>
                          <img src="images/Electronic_logo.png" alt="" class="" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <div class="carousel-item active">
            <div class="slider_item-box">
              <div class="slider_item-container">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="slider_item-detail">
                        <div>
                          <h1>
                            Beyond Traditional <br />
                            Textbooks
                          </h1>
                          <p>
                            Explore Electronics like never before with a bottom-up approach and interactive simulations.
                            Discover Electronics anew through our unique blend of theory, hands-on simulations, and a curriculum designed for the future.
                          </p>
                          <!-- <div class="d-flex">
                            <a href="https://flutterwave.com/store/ajirinibi/eyf3fo2vsic3m0" class="text-uppercase custom_orange-btn mr-3">
                              Shop Now
                            </a>
                            <a onclick="scrollToContactUs()" href="" class="text-uppercase custom_dark-btn">
                              Contact Us
                            </a>
                          </div> -->
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="slider_img-box">
                        <div>
                          <img src="images/book-cover3.jpg" alt="" class="" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="slider_item-box">
              <div class="slider_item-container">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="slider_item-detail">
                        <div>
                          <h1>
                            Elevate Your Electronics <br />
                            Mastery.
                          </h1>
                          <p>
                            Experience a paradigm shift in learning with our groundbreaking approach and dynamic circuit simulations.
                            This isn't just a book; it's a gateway to a new era of understanding electronics, blending theory with real-world simulations.
                          </p>
                          <!-- <div class="d-flex">
                            <a href="https://flutterwave.com/store/ajirinibi/eyf3fo2vsic3m0" class="text-uppercase custom_orange-btn mr-3">
                              Shop Now
                            </a>
                            <a onclick="scrollToContactUs()" href="" class="text-uppercase custom_dark-btn">
                              Contact Us
                            </a>
                          </div> -->
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="slider_img-box">
                        <div>
                          <img src="images/electronics.png" alt="" class="" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="custom_carousel-control">
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="sr-only">Next</span>
          </a>
        </div> -->
      </div>
    </section>

    <!-- end slider section -->
  </div>


  <section class="service_section layout_padding ">
    <div class="container">
      <h2 class="custom_heading">Lecture Slides: Excerpt from Book</h2>
      <div class="divider"></div>
      <p class="custom_heading-text">
      Welcome to a captivating exploration of the world of Electronics! In this carefully crafted collection, 
      we invite you to embark on a fascinating journey through the chapters of our insightful book, 
      "Electronics: Principles, Concepts and Practices."
      </p>
      <!-- Categories Start -->
      <div class="row pb-3">
      <?php foreach ($contents as $content) {?>
        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
          <a class="text-decoration-none" href="content_details.php?id=<?=$content['id']?>">
          <!-- <a class="text-decoration-none" data-toggle='modal' href="content-details.php?id=<?=$content['id']?>" data-target='#pdfModal<?=$content['id']?>' onclick='loadPdf(<?=json_encode($content)?>)'> -->
            <div class="cat-item d-flex align-items-center mb-4">
              <div class="overflow-hidden" style="width: 100px; height: 100px;">
                <canvas id="imgCanvas<?=$content['id']?>"></canvas>
                <script>
                  // Function to load PDF into canvas
                  function loadPdf(pdfPath, canvasId) {
                    var canvas = document.getElementById(canvasId);
                    var context = canvas.getContext('2d');

                    pdfjsLib.getDocument(pdfPath).promise.then(function(pdfDoc) {
                      pdfDoc.getPage(1).then(function(page) {
                        var viewport = page.getViewport({ scale: 1.5 });
                        canvas.width = viewport.width;
                        canvas.height = viewport.height;

                        var renderContext = {
                          canvasContext: context,
                          viewport: viewport
                        };
                        page.render(renderContext);
                      });
                    });
                  }

                  // Call the function to load PDF for this specific item
                  loadPdf('contents/<?=$content['content_file']?>', 'imgCanvas<?=$content['id']?>');
                </script>
                <!-- Additional content (if needed) -->
                <img class="img-fluid" src="" alt="">
              </div>
              <div class="flex-fill pl-3">
                <h6><?php echo $content['title']; ?></h6>
                <small class="text-body"><?php echo $content['subtitle']; ?></small>
              </div>
            </div>
          </a>
          <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] === "admin"){ ?>
            <i class="fa fa-pen" data-toggle='modal' data-target="#contentEditModal<?=$content['id']?>"></i><i class="fa fa-trash" style="margin-left: 20px" onclick="deleteContent(<?=$content['id']?>)"></i>
          <?php } ?>
        </div>

      <?php 
        include("content-modal-component.php");
        include("edit-content-component.php");
        } 
      ?>
      
    </div>
    <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] === "admin"){ ?>
      <div style="display: flex;
              justify-content: center;
              align-items: center;
              margin: 0;
              cursor: pointer">
        <p data-toggle='modal' data-target='#contentCreateModal' class="text-uppercase custom_dark-btn">Add Content</p>

      </div>
      <!-- Categories End -->
      </div>
    <?php } ?>
  </section>

  <!-- end service section -->

  <!-- fruits section -->

  <section class="fruit_section">
    <div class="container">
      <h2 class="custom_heading">Latest Books</h2>
      <div class="divider"></div>
      <p class="custom_heading-text">
        Delve into the realms of physics and electronics with our newest hardcover edition. 
        This isn't merely a book; it's a gateway to a treasure trove of knowledge. 
      </p>
      <div class="row layout_padding2">
        <div class="col-md-8">
          <div class="fruit_detail-box">
            <h3>
              Electronics: Principles, Concepts and Practices
            </h3>
            <p class="mt-4 mb-5">
            The new Electronics text is a must-have for anyone interested in Electronics. 
            Whether you are a student, hobbyist, or professional, 
            this book serves as an authoritative and comprehensive guide that will enhance your knowledge and skills in the field. 
            The seamless integration of theory and practice, supported by LTSpice and MATLAB, 
            makes this book unique as well as a true gem in the realm of Electronics literature. 
            The integration of online resources such as free lecture slides (using Beamer and tikz environment) 
            adds to the beauty of the book and an active web interactive session is a plus for lecturers and students.

            </p>
            
            <p><a href="" style="color: black; text-decoration: underline">Download Table of Content</a></p>
          
            <div>
              <a href="https://flutterwave.com/store/ajirinibi/eyf3fo2vsic3m0" class="custom_dark-btn">
                Buy Now
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex justify-content-center align-items-center">
          <div class="fruit_img-box d-flex justify-content-center align-items-center">
            <img src="images/book-cover3.jpg" alt="" class="" width="350px" style="box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.208);" />
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end fruits section -->

  <!-- tasty section -->
  <section class="tasty_section">
    <div class="container_fluid" style="width: 70%; display: flex; flex-direction: row; justify-content: right; color: white;">
      <div style="width: 350px; word-wrap: break-word; text-shadow: 2px 2px 2px black;">
        <h3 style="color: white; text-align: center;">About Author</h3>
        <p>
         <b>Henry Ohiani Ohize</b> is a senior lecturer in the Department of Electrical and Electronics Engineering at the Federal University of Technology, 
         Minna, Nigeria. He earned his doctorate degree from the University of Cape Town, South Africa, in 2017, and has over 15 years of teaching experience across 
         various universities.
        </p>

        <a href="about" class="custom_dark-btn">
          Read more
        </a>
        <!-- <p>Having taught at institutions like the Federal University of Technology Minna, Nigeria, Confluence University of Science and Technology, 
          Osara, Nigeria, Cape Peninsular University of Science and Technology, South Africa and the University of Cape Town, South Africa, Dr. 
          Ohize is well-versed in the diverse cultural backgrounds of students. 
          This exposure has shaped his teaching philosophy and allowed him to connect effectively with a broad range of learners.
        </p>
        <p>
        As an author, Dr. Ohize combines his extensive knowledge in electronics with practical insights to create an accessible learning experience.
        His commitment to advancing the field is evident in his ongoing research efforts, 
        ensuring that his contributions remain relevant in the dynamic landscape of electronics.
        </p>

        <p>
        In summary, Dr. Henry Ohiani Ohize's career reflects a dedication to excellence in education, a passion for electronics, 
        and a commitment to staying at the forefront of technological advancements. His expertise makes him a valuable resource for students 
        and professionals alike.

        </p> -->
      </div>
      
    </div>
  </section>

  <!-- end tasty section -->

  <!-- client section -->

  <section class="client_section layout_padding">
    <div class="container">
      <h2 class="custom_heading">Testimonial</h2>
      <div class="divider"></div>
      <p class="custom_heading-text">
        Discover the stories and experiences shared by those who've explored the pages of our books.
      </p>
      <div>
        <div id="carouselExampleControls-2" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="client_container layout_padding2">
                <div class="client_img-box">
                  <img src="images/client.png" alt="" />
                </div>
                <div class="client_detail">
                  <h3>
                    ENGR. PROFESSOR YINUSA ADEMOLA ADEDIRAN 
                  </h3>
                  <p class="custom_heading-text">
                    I have painstakingly gone through the textbook manuscript titled Electronics: Principles, 
                    Concepts and Practices written by Dr. Henry Ohize. I hereby submit the report of my assessment.
                  </p>
                  <p class="custom_headin-text">
                    The book is written in a very simple language that can easily be understood by a secondary 
                    school leaver with fundamental knowledge of Mathematics, Physics, Introductory Technology 
                    and Chemistry. 
                  </p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="client_container layout_padding2">
                <div class="client_img-box">
                  <img src="images/client.png" alt="" />
                </div>
                <div class="client_detail">
                  <h3>
                    Engr. Prof. Yinusa Ademola ADEDIRAN
                  </h3>
                  <p class="custom_heading-text">
                    I strongly recommend the textbook for publication as it will serve as an invaluable resource in 
                    Electronics for students in Technical Colleges, Polytechnics and Universities. 
                  </p>
                </div>
              </div>
            </div>
            <!-- <div class="carousel-item">
              <div class="client_container layout_padding2">
                <div class="client_img-box">
                  <img src="images/client.png" alt="" />
                </div>
                <div class="client_detail">
                  <h3>
                    Johnhex
                  </h3>
                  <p class="custom_heading-text">
                    There are many variations of passages of Lorem Ipsum
                    available, but the majority have suffered alteration in
                    some form, by injected humour, or randomised words which
                    don't look even slightly believable. If you are <br />
                    going to use a passage of Lorem Ipsum, you need to be sure
                  </p>
                </div>
              </div>
            </div> -->
          </div>
          <div class="custom_carousel-control">
            <a class="carousel-control-prev" href="#carouselExampleControls-2" role="button" data-slide="prev">
              <span class="" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls-2" role="button" data-slide="next">
              <span class="" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->

  <!-- contact section -->
  <section class="contact_section layout_padding" id="targetElement">
    <div class="container">
      <h2 class="font-weight-bold">
        Contact Us
      </h2>
      <div class="row">
        <div class="col-md-8 mr-auto">
          <form action="handlers/send-message.php" method="post">
            <div class="contact_form-container">
              <div>
                <div>
                  <input type="text" name="name" required placeholder="Name">
                </div>
                <div>
                  <input type="text" name="phone" required placeholder="Phone Number">
                </div>
                <div>
                  <input type="email" name="email" required placeholder="Email">
                </div>

                <div class="mt-5">
                  <input type="text" name="message" required placeholder="Message">
                </div>
                <div class="mt-5">
                  <button class="custom_black_btn" type="submit" name="submit">
                    send
                  </button>
                </div>
              </div>

            </div>

          </form>

          <?php if(isset($_SESSION['message_sent']) && $_SESSION['message_sent'] != ""){
              echo "<script>alert('".$_SESSION['message_sent']."')</script>";
              $_SESSION['message_sent'] = ""; 
             } 
          ?>

          <?php if(isset($_SESSION['message_failed']) && $_SESSION['message_failed'] != ""){
              echo "<script>alert('".$_SESSION['message_failed']."')</script>";
              $_SESSION['message_failed'] = ""; 
             } 
          ?>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->

  <!-- Vendor Start -->
  <div class="container-fluid py-5">
      <h2 class="custom_heading">Partners</h2>
      <div class="divider"></div>
        <div class="row px-xl-5">
            <div class="col-lg-4">
                <div class="bg-light p-4">
                    <img src="images/Tetfund-png-logo.png" width="154px" height="100px" alt="tetfund logo">
                </div>
            </div>

            <div class="col-lg-4">
                <div class="bg-light p-4">
                    <img src="images/NUC.png" width="250px" height="100px" alt="nuc logo">
                </div>
            </div>

            <div class="col-lg-4">
                <div class="bg-light p-4">
                    <img src="images/federal-ministry of-education.png" width="300px" height="100px" alt="fmd logo">
                </div>
            </div>
        </div>
  </div>
  <!-- Vendor End -->

  <!-- map section -->
  <section class="map_section">
    <div class="h-100 w-100 ">
      <div style="width: 100vw;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3934.1358712995793!2d6.543740675025728!3d9.58355459050162!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104c7107fcda5791%3A0xb371b8801b35c6db!2sFederal%20University%20Of%20Technology%2C%20Minna!5e0!3m2!1sen!2sng!4v1697913415071!5m2!1sen!2sng" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      
      <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3934.1358712995793!2d6.543740675025728!3d9.58355459050162!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104c7107fcda5791%3A0xb371b8801b35c6db!2sFederal%20University%20Of%20Technology%2C%20Minna!5e0!3m2!1sen!2sng!4v1697913415071!5m2!1sen!2sng" width="100vw" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
    </div>
  </section>

  <div class="modal fade" id="contentCreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Content</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12 mr-auto">
                  <form id="createContentForm" enctype="multipart/form-data">
                    <div class="contact_form-container">
                      <div class="row">
                        <div class="col-12">
                          <input id="title" name="title" class="form-control" type="text" placeholder="Title">
                        </div>

                        <div class="col-12" style="margin-top: 5px">
                          <input id="subtitle" name="subtitle" class="form-control" type="text" placeholder="Add Subtitle">
                        </div>

                        <div class="col-12" style="margin-top: 5px">
                          <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                        </div>

                        <div class="col-12" style="margin-top: 5px">
                          <input type="file" name="content_file" id="content_file" class="form-control" accept=".pdf">
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
        </div>
    </div>
  </div>

  <?php include_once("resource-create-modal-component.php"); ?>

  <?php include_once("modal-container-component.php"); ?>

  <!-- end map section -->

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

  <script>
    // This example adds a marker to indicate the position of Bondi Beach in Sydney,
    // Australia.
    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 11,
        center: {
          lat: 40.645037,
          lng: -73.880224
        },
      });

      var image = 'images/maps-and-flags.png';
      var beachMarker = new google.maps.Marker({
        position: {
          lat: 40.645037,
          lng: -73.880224
        },
        map: map,
        icon: image
      });
    }
  </script>

  <script src="js/content-resource-handler.js"></script>
  
  <script src="js/ajax-create-content.js"></script>
  <script src="js/ajax-edit-content.js"></script>
  <script src="js/ajax-delete-content.js"></script>
  
  <script src="js/ajax-delete-resource.js"></script>
  <script src="js/ajax-upload-resource.js"></script>

  <!-- google map js -->
  
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap">
  </script> -->
  <!-- end google map js -->
</body>

</html>