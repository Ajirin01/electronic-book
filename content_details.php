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


  <!-- Shop Detail Start -->
  <div class="container-fluid pb-5">
    <div class="">
      <div class="row px-xl-6">
        <div class="col-lg-12 mb-30">
          <?php
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
              // Include the necessary files
              include_once("handlers/get_content_by_id.php");
          
              // Get the content ID from the GET request
              $contentId = $_GET['id'];
          
              // Call the function to get content by ID
              $content = json_encode(getContentById($contentId));

              // echo $content;
            }else{
              header("location: index.php");
            }
          ?>
          <div id="product-carousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner bg-light">
                <?php include_once("content-detail-component.php"); ?>
              </div>
              <a class="carousel-control-prev" id="prevPage" href="#product-carousel" data-slide="prev">
                  <i class="fa fa-2x fa-angle-left text-dark"></i>
              </a>
              <a class="carousel-control-next" id="nextPage" href="#product-carousel" data-slide="next">
                  <i class="fa fa-2x fa-angle-right text-dark"></i>
              </a>
          </div>
        </div>
      </div>
    </div>
        
    <div class="row px-xl-5">
        <div class="col">
            <div class="bg-light p-30">
                <div class="nav nav-tabs mb-4">
                    <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Comments (<span id="commentsCount">0</span>)</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                              <div id="commentArea">

                              </div>

                              <button id="loadMoreCommentsBtn" class="btn btn-primary">Load more</button>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Leave a comment</h4>
                                <small>Your email address will not be published. Required fields are marked *</small>
                                <form id="commentForm">
                                    <div class="form-group">
                                        <label for="message">Your Comment *</label>
                                        <textarea name="commentText" id="commentText" cols="30" rows="5" class="form-control"></textarea>
                                        <input type="hidden" name="contentId" id="contentId" value="<?= $contentId ?>"> <!-- Replace '1' with the actual content ID -->
                                        <?php if(isset($_SESSION['user'])){ ?>
                                          <input type="hidden" name="userRole" id="userRole" value="<?= $_SESSION['user']['role'] ?>"> <!-- Replace '1' with the actual content ID -->
                                        <?php } ?>
                                    </div>
                                    <div class="form-group mb-0">
                                        <?php if(isset($_SESSION['user'])){ ?>
                                          <input type="submit" id="submit" value="Submit" class="btn btn-primary px-3">
                                        <?php }else{?>
                                          <a href="login" class="btn btn-primary px-3">Please login to post comment</a>
                                        <?php }?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- Shop Detail End -->

  <!-- end client section -->

  <div class="container modals-container">
    <div class="modal fade" id="constantsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Scientific Constants</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <iframe src="https://chem.libretexts.org/Bookshelves/Ancillary_Materials/Reference/Units_and_Conversions/Physical_Constants?adaptView" width="100%" height="400px" loading="lazy"></iframe>
              </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="calculatorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Scientific Calculator</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="https://www.desmos.com/scientific"width="100%" height="250" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="contentMenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Contents</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul>
                        <?php
                        foreach ($contents as $key => $content) {
                                echo "<li data-toggle='modal' data-target='#pdfModal$content->id' onclick='loadPdf(".json_encode($content).")'>". $content->title. "</li>";

                                include("content-modal-component.php");
                                
                                echo "<input id='content-title' type='hidden' value='$content->title'>";
                                echo "<input id='content-extention' type='hidden' value='$content->extention'>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  </div>

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

  
  <script src="js/ajax-comments-pagination.js"></script>
  <script src="js/ajax-submit-comment.js"></script>

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

  <!-- google map js -->
  
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap">
  </script> -->
  <!-- end google map js -->
</body>

</html>