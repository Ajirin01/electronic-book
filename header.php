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

  // Fetch contents from the database
  $query = "SELECT * FROM resources ORDER BY id DESC";
  $result = $conn->query($query);

  if ($result) {
      // Fetch contents from the database
      $resources = $result->fetch_all(MYSQLI_ASSOC);
  } else {
      // Handle database error if needed
      $resources = array();
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