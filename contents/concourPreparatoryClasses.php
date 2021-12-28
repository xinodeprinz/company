<?php


   session_start();

   $concours = ['Polythecnic Yaounde', 'Polythecnic Douala', 'Polythecnic Bamenda', 'ENS Yaounde', 'ENS Maroua', 'ENS Bambili', 'ENS Bertoua',
                'ENSET Kumba', 'ENSET Bambili', 'FAVM Buea', 'COT Buea', 'FET Buea', 'COLTECH Bamenda', 'FHS Buea', 'CUSS Yaounde', 'FASA Dschang'];

   require_once "../needs/loadJumbotron.php";
   
   require_once "functions.php";   

 
?>

 <?php require_once "htmlHeadForContents.php"; ?>

  <body class="body">
      <?php require_once 'navbarForContents.php';?>

      <?php require_once '../needs/jumbotron_content.php'; ?>

        <style>
            @media(max-width: 300px){
                .yooo{
                    font-size: 14px;
                    font-weight: bolder;
                }
            }
            .an_icon{
                font-size: 70px;
                position: relative;
                background: #35424a;
                color: white;
                height: 100px;
                width: 100px;
                display: flex;
                align-items: center;
                justify-items: center;
                border-radius: 50%;
                padding-left: 15px;
            }
        </style>
  
  <div class="container">
     <div class="row">
        <center><div class="an_icon" style="font-size:55px;padding-left:23px"><i class="glyphicon glyphicon-briefcase"></i></div></center>
        <h4 class="text-center text-uppercase bold yooo">Concour Preparatory Classes</h4>
        <p class="text-left container">
        Have you ever felt like passing a conour in Cameroon before? Then this is the right place for you.
        We train students of both the English and French system of education for all the concours
        present in Cameroon. Some include: <?php foreach($concours as $concour): ?> <?php echo $concour.', '?> <?php endforeach ?>etc.
        The total fee for this course is <strong><mark>35,000 FCFA</mark></strong>. All payments are through
        MTN mobile money or Orange money.
        </p>
    <div class="col-sm-6 block">
        <center><div class="an_icon" style="font-size:55px;padding-left:20px"><i class="glyphicon glyphicon-book"></i></div></center>
        <h4 class="text-center text-uppercase bold">Registration</h4>
        <p class="word">
        This is your first step of passing a concour in Cameroon. Register now at only <strong><mark>5,000 FCFA</mark></strong>
        and benefit from our great teaching skills. You will be trained by quality personnels from the
        University of Buea.
        </p>
        <p class="text-center">
            <button class="btn btn-dark">
                <a href="registration.php"><i class="fas fa-dollar-sign"></i> Register</a>
            </button>
        </p>
        </div>
        <div class="col-sm-6 block">
        <center><div class="an_icon" style="font-size:55px;padding-left:23px"><i class="glyphicon glyphicon-credit-card"></i></div></center>
        <h4 class="text-center text-uppercase bold">Tuition Fee</h4>
        <p class="word">
        This is your final step of becoming 100% ready for the concour preparatory classes at
        only <strong><mark>30,000 FCFA</mark></strong>. Pay and benefit from the best concour
        training institution in Cameroon.
        </p>
        <p class="text-center">
            <button class="btn btn-dark">
                <a href="concour_login.php"><i class="fas fa-dollar-sign"></i> Pay Tuition</a>
            </button>
        </p>
        </div>
     </div>
     <?php require_once '../needs/whatsapp.php' ?>
  </div>

    
    <!-- Footer and footer widget -->
    <?php
        include_once "../needs/footer.php";
    ?>
  </body>
</html>






