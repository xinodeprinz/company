<!DOCTYPE html>
<html>
  <head>
    <!-- Bootstrap CSS and JS -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script src="../bootstrap-3.3.7-dist/js/jquery.min.js"></script>
    <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

    <!--Outline Buttons-->
    <link rel="stylesheet" href="../css/outline_buttons.css">

    <!--style.css sheet -->
    <link rel="stylesheet" href="../css/myStyleSheet.css">

    <title>NdeTek</title>
    <link rel="shortcut icon" type="image" href="../images/ndeLog.jpg">

    <!-- Font Awesome JS -->
    <script src="../fontawesome/js/all.min.js"></script>
      
  </head>

  <?php
if (!isset($_SESSION['shopping_cart'])) {
  $_SESSION['shopping_cart'] = [];
}
?>
  
