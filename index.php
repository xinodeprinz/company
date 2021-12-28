<?php

   session_start();
   
   require_once "contents/functions.php";   

   $_SESSION['name'] = '';
   $_SESSION['school'] = '';
   $_SESSION['dob'] = '';
   $_SESSION['contact'] = '';
   $_SESSION['sex'] = '';
   $_SESSION['concour'] = '';
   $_SESSION['address'] = '';
   $_SESSION['payment'] = '';
   $_SESSION['hasPaidTuition'] = '';
   $_SESSION['hasRegistered'] = '';

   $_SESSION['loadIndexImage'] = true;

   $_SESSION['error'] = '';

   $_SESSION['has_joined_us'] = false;
    
   $_SESSION['email'] = '';

   $_SESSION['success'] = '';

   $concours = ['Polythecnic Yaounde', 'Polythecnic Douala', 'Polythecnic Bamenda', 'ENS Yaounde', 'ENS Maroua', 'ENS Bambili', 'ENS Bertoua',
                'ENSET Kumba', 'ENSET Bambili', 'FAVM Buea', 'COT Buea', 'FET Buea', 'COLTECH Bamenda', 'FHS Buea', 'CUSS Yaounde', 'FASA Dschang'];

   
    
                require_once "needs/dbconnect.php";

  if(!isset($_SESSION['shopping_cart'])){
    $_SESSION['shopping_cart'] = [];
  }





 
?>

 <?php require_once "contents/htmlHeadForIndex.php"; ?>

   <style>
     .icon{
       width: 100px;
       height: 100px;
       border-radius: 50%;
       background: white;
       color: black;
     }
     .an_icon{
       font-size: 70px;
       position: relative;
       background: white;
       height: 100px;
       width: 100px;
       display: flex;
       align-items: center;
       justify-items: center;
       border-radius: 50%;
       padding-left: 15px;
     }
     /* @media(max-width: 300px) */
     .icon i{
       margin-top: 20px;
     }
     @media(max-width: 300px){
       #about h3, #education h2, #templates h3, #contact h3{
         font-size: 20px;
       }
       #education h3{
         font-size: 15px;
       }
     }
     #contact {
       background: #345a;
     }
     h1, h2, h3, #education h4, h5, h6{
       text-transform: uppercase;
       font-weight: bolder;
     }
   </style>

     <body class="body">
       <?php require_once 'contents/navbarForIndex.php'; ?>

    <section id="about" style="margin-top:-30px;">
      <div class="container">
        <h3 class="text-center bold text-uppercase">About NdeTek</h3>
        <p>
          NdeTek is an upcoming technological institution currently based in Buea, Cameroon 
          that aims at training young youths in the field of technology to produce a better 
          tomorrow. We train students for concours in Cameroon and on web development skills 
          at affordable prices during the third term holidays. We’ve also got past exam papers 
          be it for the GCE Advanced levels, UB past semester exams, and various concours in 
          Cameroon. All the papers are free and are readily available for downloading.
        </p>
      </div>
    </section>
      <section id="education">
          <div class="container">
            <div class="block">
              <center><div class="an_icon"><i class="glyphicon glyphicon-education"></i></div></center>
              <h2 class="text-center bold text-uppercase">Education</h2>
              <p class="white text-left">
                This section is based on education, and is aimed at helping students / youths
                to gain better skills for a better tomorrow. This field contains web development training,
                concour preparatory classes training and past exam papers. Be aware that all payments on
                this site is either through MTN mobile money or Orange money.
              </p>
            </div><hr>
            <div id="web-development">
                <div class="row">
                    <center><div class="an_icon" style="font-size: 55px"><i class="fa fa-laptop"></i></div></center>
                      <h3 class="text-center bold text-uppercase">Web Development Training</h3>
                      <p class="text-left white container">
                        In this section, we train youths on web development so that they can produce better
                        websites, and applications tomorrow, be it personal, business, ecommerces, educational
                        and many more. The fee for this course is <strong><mark>60,000 FCFA</mark></strong>
                        and a student can pay in two installments after registering. Registration is 
                        <strong><mark>5,000 FCFA</mark></strong> ,first installment is <strong><mark>30,000 FCFA</mark></strong> 
                        and second installment is <strong><mark>25,000 FCFA</mark></strong>. Payment methods allowed
                        are MTN mobile money and Orange money.
                      </p>
                  <div class="col-sm-4 block">
                    <center><div class="an_icon" style="font-size:55px;padding-left:20px"><i class="glyphicon glyphicon-book"></i></div></center>
                      <h4 class="text-center bold">Registration</h4>
                      <p class="word white">
                        This is your beginning step of being a great web developer. Registration fee is <strong><mark>5,000 FCFA</mark></strong>
                        and is paid via MTN mobile money or Orange money. Click the button below to register. 
                      </p>
                      <p class="text-center">
                        <button class="btn btn-dark">
                           <a href="contents/web_registration.php"><i class="fas fa-dollar-sign"></i> Register</a>
                        </button>
                      </p>
                    </div>
                    <div class="col-sm-4 block">
                    <center><div class="an_icon" style="font-size:55px;padding-left:23px"><i class="glyphicon glyphicon-credit-card"></i></div></center>
                      <h4 class="text-center bold">First Installment</h4>
                      <p class="word white">
                        This is your second step of becoming a professional web developer, and it cost <strong><mark>30,000 FCFA</mark></strong>
                        through either MTN money or Orange money. Only registered students can pay first installment.
                      </p>
                      <p class="text-center">
                        <button class="btn btn-dark">
                           <a href="contents/web_login.php"><i class="fas fa-dollar-sign"></i> Pay 1<sup>st</sup> installment</a>
                        </button>
                      </p>
                    </div>
                    <div class="col-sm-4 block">
                    <center><div class="an_icon" style="font-size:50px;padding-left:20px"><i class="fa fa-money-check-alt"></i></div></center>
                      <h4 class="text-center bold">Second Installment</h4>
                      <p class="word white">
                        This is your final step of becoming a professional web developer, and it cost <strong><mark>25,000 FCFA</mark></strong>
                        <span class="visible-xs">through either MTN mobile or Orange money</span>. Once paid, the student will be fully eligible for the
                        web development classes. Only students who have paid their first installments can pay their second installments. 
                      </p>
                      <p class="text-center">
                          <button class="btn btn-dark">
                              <a href="contents/web_login.php"><i class="fas fa-dollar-sign"></i> Pay 2<sup>nd</sup> Installment</a>
                          </button>
                      </p>
                    </div>
                    </div>
                </div>
            </div><hr>

            <div id="Concour-training">
            <div class="container">
              <div class="row">
                <center><div class="an_icon" style="font-size:55px;padding-left:23px"><i class="glyphicon glyphicon-briefcase"></i></div></center>
                    <h3 class="text-center text-uppercase bold">Concour Preparatory Classes</h3>
                    <p class="white text-left container">
                      Have you ever felt like passing a conour in Cameroon before? Then this is the right place for you.
                      We train students of both the English and French system of education for all the concours
                      present in Cameroon. Some include: <?php foreach($concours as $concour): ?> <?php echo $concour.', '?> <?php endforeach ?>etc.
                      The total fee for this course is <strong><mark>35,000 FCFA</mark></strong>. All payments are through
                      MTN mobile money or Orange money.
                    </p>
                <div class="col-sm-6 block">
                  <center><div class="an_icon" style="font-size:55px;padding-left:20px"><i class="glyphicon glyphicon-book"></i></div></center>
                    <h4 class="text-center bold">Registration</h4>
                    <p class="word white">
                      This is your first step of passing a concour in Cameroon. Register now at only <strong><mark>5,000 FCFA</mark></strong>
                      and benefit from our great teaching skills. You will be trained by quality personnels from the
                      University of Buea.
                    </p>
                    <p class="text-center">
                      <button class="btn btn-dark">
                        <a href="contents/registration.php"><i class="fas fa-dollar-sign"></i> Register</a>
                      </button>
                    </p>
                  </div>
                  <div class="col-sm-6 block">
                    <center><div class="an_icon" style="font-size:55px;padding-left:23px"><i class="glyphicon glyphicon-credit-card"></i></div></center>
                    <h4 class="text-center bold">Tuition Fee</h4>
                    <p class="word white">
                     This is your final step of becoming 100% ready for the concour preparatory classes at
                     only <strong><mark>30,000 FCFA</mark></strong>. Pay and benefit from the best concour
                     training institution in Cameroon.
                    </p>
                    <p class="text-center">
                      <button class="btn btn-dark">
                         <a href="contents/concour_login.php"><i class="fas fa-dollar-sign"></i> Pay Tuition</a>
                      </button>
                    </p>
                  </div>
                </div>
              </div>
          </div><hr>
                        <!--GCE Papers -->
           <div class="container">
           <center><div class="an_icon" style="font-size:55px;padding-left:23px"><i class="glyphicon glyphicon-globe"></i></div></center>
              <h3 class="text-center text-uppercase bold">Past Exam Papers</h3>
              <p class="white">
                Here, we have got plenty of past exam papers for the GCE advanced level, COT Buea and FET Buea
                to help ease students in the struggle for the GCE Advanced Level Certificate, and their success
                in the various concours. All the papers are free. Download and Enjoy!
              </p>
              <p class="text-center">
                <button class="btn btn-dark">
                    <a href="contents/past_papers.php?type=gce_al&page=1"><i class="fas fa-download"></i> Download Papers</a>
                </button>
              </p>
           </div>
        </div>  
        </div>
      </section>
      <section id="contact">
          <div class="container">
          <center><div class="an_icon" style="font-size:55px;padding-left:23px"><i class="glyphicon glyphicon-earphone"></i></div></center>
            <h3 class="crh bold text-uppercase">Contact NdeTek</h3>
            <p class="white">
              Have you ever imagined of becoming a member of the NdeTek community?
              or have you ever imagined how it feels like to chat with NdeTek, then contact us
              now, and join our community by filling the form or chat with us on whatsApp
              by clicking on the whatsApp icon. Click on the button below to proceed.
            </p>  
          </div>
          <p class="text-center">
            <button class="btn btn-dark">
              <a href="contents/contact.php">
                  <span class="glyphicon glyphicon-earphone"></span> Contact Us
              </a>
            </button>
          </p>
      </section>
      <div class="container">
         <?php include_once 'needs/whatsapp.php' ?>
      </div>
    </div>
        <!-- Footer and footer widget -->
        <?php
          include_once "needs/footer.php";
        ?>
  </body>
</html>






