<?php include_once("header.php"); ?>

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