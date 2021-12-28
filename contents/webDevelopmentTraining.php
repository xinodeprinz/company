<?php


session_start();

require_once "../needs/loadJumbotron.php";

require_once "functions.php"; 




?>

 <?php require_once "htmlHeadForContents.php"; ?>

  <body class="body">
      <?php require_once 'navbarForContents.php'; ?>

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
  
  <div class="container" id="content">
  <div class="row">
        <center><div class="an_icon" style="font-size: 55px"><i class="fa fa-laptop"></i></div></center>
            <h4 class="text-center bold text-uppercase yooo">Web Development Training</h4>
            <p class="container text-left">
            In this section, we train youths on web development so that they can produce better
            websites, and applications tomorrow, be it personal, business, ecommerces, educational
            and many more. The fee for this course is <strong><mark>60,000 FCFA</mark></strong>
            and a student can pay in two installments after registering. Registration is 
            <strong><mark>5,000 FCFA</mark></strong> ,first installment is <strong><mark>30,000 FCFA</mark></strong> 
            and second installment is <strong><mark>25,000 FCFA</mark></strong>. Payment methods allowed
            are MTN mobile money and Orange money.
            </p>
        <div class="col-sm-4 block box">
            <center><div class="an_icon" style="font-size:55px;padding-left:20px"><i class="glyphicon glyphicon-book"></i></div></center>
            <h4 class="text-center text-uppercase bold">Registration</h4>
            <p class="word">
                This is your beginning step of being a great web developer. Registration fee is <strong><mark>5,000 FCFA</mark></strong>
                and is paid via MTN mobile money or Orange money. Click the button below to register. 
            </p>
            <p class="text-center">
                <button class="btn btn-dark">
                    <a href="web_registration.php"><i class="fas fa-dollar-sign"></i> Register</a>
                </button>
            </p>
        </div>
        <div class="col-sm-4 block">
             <center><div class="an_icon" style="font-size:55px;padding-left:23px"><i class="glyphicon glyphicon-credit-card"></i></div></center>
            <h4 class="text-center text-uppercase bold">First Installment</h4>
            <p class="word">
                This is your second step of becoming a professional web developer, and it cost <strong><mark>30,000 FCFA</mark></strong>
                through either MTN money or Orange money. Only registered students can pay first installment.
            </p>
            <p class="text-center">
                <button class="btn btn-dark">
                    <a href="web_login.php"><i class="fas fa-dollar-sign"></i> Pay 1<sup>st</sup> installment</a>
                </button>
            </p>
        </div>
        <div class="col-sm-4 block">
            <center><div class="an_icon" style="font-size:50px;padding-left:20px"><i class="fa fa-money-check-alt"></i></div></center>
            <h4 class="text-center text-uppercase bold">Second Installment</h4>
            <p class="word">
                This is your final step of becoming a professional web developer, and it cost <strong><mark>25,000 FCFA</mark></strong>
                <span class="visible-xs">through either MTN mobile or Orange money</span>. Once paid, the student will be fully eligible for the
                web development classes. Only students who have paid their first installments can pay their second installments. 
            </p>
            <p class="text-center">
                <button class="btn btn-dark">
                    <a href="web_login.php"><i class="fas fa-dollar-sign"></i> Pay 2<sup>nd</sup> Installment</a>
                </button>
            </p>
        </div>
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






