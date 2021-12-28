<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS and JS -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script src="bootstrap-3.3.7-dist/js/jquery.min.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../../fontawesome/css/brands.min.css">
    <link rel="stylesheet" href="../../fontawesome/css/solid.min.css">
    <link rel="stylesheet" href="../../fontawesome/css/regular.min.css">
    <link rel="stylesheet" href="../../fontawesome/css/svg-with-js.min.css">
    <link rel="stylesheet" href="../../fontawesome/css/v4-shims.min.css">
    <!--Outline Buttons-->
    <link rel="stylesheet" href="../../css/outline_buttons.css">
    <!--style.css sheet -->
    <link rel="stylesheet" href="../../css/myStyleSheet.css">
    <!--style.css sheet -->
    <!--<link rel="stylesheet" href="yoo.css">-->

    <title>NdeTek</title>
    <link rel="shortcut icon" type="image" href="../../images/ndeLog.jpg">

    <!-- Font Awesome JS -->
    <script src="../../fontawesome/js/fontawesome.min.js"></script>
    <script src="../../fontawesome/js/brands.min.js"></script>
    <script src="../../fontawesome/js/solid.min.js"></script>
    <script src="../../fontawesome/js/regular.min.js"></script>
    <script src="../../fontawesome/js/v4-shims.min.js"></script>
      
    <!-- javascript module for converting webpage to pdf -->
   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>-->
    <!-- <script src="js/html2pdf.bundle.js"></script> -->
    <!-- <script src="js/script.js"></script> -->
    <!--<script src="js/pdf.js"></script>-->
  </head>
<body>
    
         
    <nav class="navbar navbar-fixed-top hidden-print bg-dark">
      <div class="container">
        <div class="navbar-brand">
           <div id="title">
           <img src="../../images/ndeL.jpg" alt="NdeTek" width="110" class="img-responsive" style="margin-top:-10px;">
             <!--NdeTek -->
           </div>
        </div>
        <div class="navbar-header">
          <button class="navbar-toggle" data-toggle="collapse" data-target=".collapse">
            <span style="color:white; background: white;" class="icon-bar"></span>
            <span style="color:white; background: white;" class="icon-bar"></span>
            <span style="color:white; background: white;" class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse">
           <ul class="nav navbar-nav navbar-right">
             <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> 
                <span class="text-capitalize"><?php echo strtolower($name) ?></span> <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" style="background:#35424a;">
                <li style="color:white"><a href="logout.php" style="text-decoration:none;color:white;"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
              </ul>
            </li>
            <!-- <li class=""><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li> -->
           </ul>
        </div>
      </div>
    </nav>