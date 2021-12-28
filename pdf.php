
<?php

session_start();

if (!isset($_SESSION['array'])) {
    header('Location: index.php');
    exit;
}


require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();



$student = $_SESSION['array'];

$has_paid_tuition = $student['has_paid_tuition'];

$document_name = $has_paid_tuition ? 'Concour tuition receipt.pdf' : 'Concour registration receipt.pdf';


// start of directors document // soh mangwa soh gedeon

// $directors_document = '


// <!DOCTYPE html>
// <html>
//   <head>
//     <!-- Bootstrap CSS and JS -->
//     <meta name="viewport" content="width=device-width, initial-scale=1">
//     <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
//     <script src="bootstrap-3.3.7-dist/js/jquery.min.js"></script>
//     <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
//     <!--style.css sheet -->
//     <link rel="stylesheet" href="css/myStyleSheet.css">
//      <!--style.css sheet -->
//      <!--<link rel="stylesheet" href="yoo.css">-->
//      <style>
//         #head{
//             display: inline-flex;
//         }
//         .left{
//             float: left;
//         }
//         .right{
//             float: right;
//             margin-left: 200px;
//             margin-top: -70px;
//         }
//         .image{
//             float: right;
//             margin-left:230px;
//             margin-top: -65px;
//         }
//         #stamp{
//             margin-top: 100px;
//             width: 200px;
//             height: 200px;
//         }
//      </style>
//   </head>   



// <div class="container" style="margin-top:60px;"> 
//    <div id="head">
//       <div class="left">
//          <h2><strong style="font-weight:bold">NdeTek</strong></h2>
//          <h5><strong>The Heart of Technology</strong></h5>
//       </div>
//       <div class="image">
//          <img src="images/receipt_logo.jpg" width="120" class="img-responsive">
//       </div>
//       <div class="right text-right pull-right">
//          <h4><strong style="font-weight:bold">REPUBLIC OF CAMEROON</strong></h4>
//          <h5><strong>Peace-Work-Fatherland</strong></h5>
//       </div>
//    </div>

//    <hr>
//       <h4 class="text-center"><strong style="font-weight:bold">CONCOUR PREPARATORY TUITOR SHARES</strong></h4>
//       <p>
//          Dear collegues, by signing this document, you thereby accept to the
//          terms and conditions of this business.
//       </p>

// </div><hr>
// <style>
//    th{
//        padding: 3px 10px;
//    }
//    td{
//        padding: 20px;
//    }
// </style>
// <section id="info" class="container">
//     <div class="table-responsive">
//         <table class="table table-striped table-bordered">
//             <thead>
//                 <tr>
//                     <th width="5%">#</th>
//                     <th>Members</th>
//                     <th>Posts</th>
//                     <th>Contacts</th>
//                     <th>Shares (%)</th>
//                     <th>Signatures</th>
//                 </tr>
//             </thead>
//             <tbody>
//                 <tr>
//                     <td>1</td>
//                     <td>NFOR NDE NYAMBI</td>
//                     <td><i>CEO</i></td>
//                     <td>675-874-066</td>
//                     <td>25.00</td>
//                     <td></td>
//                 </tr>
//                 <tr>
//                     <td>2</td>
//                     <td>BUDZI STANDLY TANTOH</td>
//                     <td><i>TUITOR</i></td>
//                     <td>654-023-066</td>
//                     <td>18.75</td>
//                     <td></td>
//                 </tr>
//                 <tr>
//                     <td>3</td>
//                     <td>KUM LESLIE MUA</td>
//                     <td><i>TUITOR</i></td>
//                     <td>675-053-360</td>
//                     <td>18.75</td>
//                     <td></td>
//                 </tr>
//                 <tr>
//                     <td>4</td>
//                     <td>SOH MANGWA SOH GEDEON</td>
//                     <td><i>TUITOR</i></td>
//                     <td>651-589-267</td>
//                     <td>18.75</td>
//                     <td></td>
//                 </tr>
//                 <tr>
//                     <td>5</td>
//                     <td>FON RONARD SAUH</td>
//                     <td><i>TUITOR</i></td>
//                     <td>676-838-927</td>
//                     <td>18.75</td>
//                     <td></td>
//                 </tr>
//             </tbody>
//         </table>
// </section>
// <section>
//     <div class="container" style="color:black">
//         <div class="head">
//             <div class="left">
//                 <div class="right" style="margin-left:300px;margin-top:-100px;">
//                     <div class="row">
//                         <div class="col-xs-12">
//                             <div class="pull-right">
//                                 <img src="images/the_stamp.jpg" width="300" id="stamp" class="img-responsive">
//                                 <p style="color: blue;font-weight:bold">Sunday, 17th October 2021</p>
//                             </div>
//                         </div>
//                     </div>
//                 </div>
//             </div>
//         </div><hr>
//         <div class="head">
//             <div class="left text-left">
//                 <h5>Yours sincerely,</h5>
//             </div>
//             <div class="right text-left" style="margin-top:-20px;margin-left:450px;">
//                 <h5><strong style="font-weight:bold;">Nfor Nde Nyambi</strong></h5>
//                 <h6><i>CEO</i></h6>
//             </div>
//         </div>
//     </section>
//   </body>
// </html>












// ';

// end of directors documents







$concour_registration_data = '


<!DOCTYPE html>
<html>
  <head>
    <!-- Bootstrap CSS and JS -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script src="bootstrap-3.3.7-dist/js/jquery.min.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <!--style.css sheet -->
    <link rel="stylesheet" href="css/myStyleSheet.css">
     <!--style.css sheet -->
     <!--<link rel="stylesheet" href="yoo.css">-->
     <style>
        #head{
            display: inline-flex;
        }
        .left{
            float: left;
        }
        .right{
            float: right;
            margin-left: 200px;
            margin-top: -70px;
        }
        .image{
            float: right;
            margin-left:230px;
            margin-top: -65px;
        }
     </style>
  </head>   
  

<div class="container" style="margin-top:60px;"> 
   <div id="head">
      <div class="left">
         <h2><strong style="font-weight:bold">NdeTek</strong></h2>
         <h5><strong>The Heart of Technology</strong></h5>
      </div>
      <div class="image">
         <img src="images/receipt_logo.jpg" width="120" class="img-responsive">
      </div>
      <div class="right text-right pull-right">
         <h4><strong style="font-weight:bold">REPUBLIC OF CAMEROON</strong></h4>
         <h5><strong>Peace-Work-Fatherland</strong></h5>
      </div>
   </div>

   <hr>
      <h3 class="text-center"><strong style="font-weight:bold">PREP-CONCOUR REGISTRATION RECEIPT</strong></h3>
    <h4 class="text-left"><small style="color:black">Mr/Mrs/Miss</small> <strong class="text-capitalize">' . strtolower($student['Name']) . '</strong>!</h4>
    Thank you for registering for the concour preparatory classes. You have
    chosen to be trained for the <mark>' . $student['Concour'] . '</mark> concour. NdeTek is here
    to offer you the best concour training program in Cameroon. We have got well
    trained and talented personnels who will prepare you very well for your chosen
    concour. You still have one final step to go; that is to pay your tuition fee, so as
    to be fully eligible for the concour preparatory classes.


    Below are your personal information about your registration.
</div><hr>
<style>
   th, td{
       padding: 3px 10px;
   }
</style>
<section id="info" class="container">
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th>Attributes</th>
                    <th>Values</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Full Name</td>
                    <td><strong class="text-capitalize">' . strtolower($student['Name']) . '</strong></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>School</td>
                    <td><strong>' . $student['School'] . '</strong></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Date of Birth</td>
                    <td><strong>' . $student['Date_of_Birth'] . '</strong></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Contact</td>
                    <td><strong>' . $student['Contact'] . '</strong></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Sex</td>
                    <td><strong>' . $student['Gender'] . '</strong></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Concour</td>
                    <td><strong>' . $student['Concour'] . '</strong></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Address</td>
                    <td><strong>' . $student['Address'] . '</strong></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Registration Date</td>
                    <td><strong>' . $student['Registration_date'] . '</strong></td>
                </tr>
            </tbody>
        </table>
</section><hr>
<section>
    <div class="container" style="color:black">
        <div class="head">
            <div class="left">
                <ul>
                    <h5><li>Registration Fee: <strong>5,000FCFA (Paid)</strong></li></h4>
                    <h5><li>Tuition Fee: <strong>30,000FCFA (Unpaid)</strong></li></h4>
                    <h5><li>Total Fee: <strong>35,000FCFA</strong></li></h4>
                </ul>
                <h5 style="font-weight:bold">UNCOMPLETED</h5>
                <div class="right" style="margin-left:300px;margin-top:-100px;">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="pull-right">
                                <img src="images/signed_stamp.jpg" width="300" class="img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><hr>
        <div class="head">
            <div class="left text-left">
                <h5>Yours sincerely,</h5>
            </div>
            <div class="right text-left" style="margin-top:-20px;margin-left:450px;">
                <h5><strong style="font-weight:bold;">Nfor Nde Nyambi</strong></h5>
                <h6><i>CEO</i></h6>
            </div>
        </div>
    </section>
  </body>
</html>












';









































$concour_tuition_data = '


<!DOCTYPE html>
<html>
  <head>
    <!-- Bootstrap CSS and JS -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script src="bootstrap-3.3.7-dist/js/jquery.min.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <!--style.css sheet -->
    <link rel="stylesheet" href="css/myStyleSheet.css">
     <!--style.css sheet -->
     <!--<link rel="stylesheet" href="yoo.css">-->
     <style>
        .head{
            display: inline-flex;
        }
        .left{
            float: left;
        }
        .right{
            float: right;
            margin-left: 200px;
            margin-top: -70px;
        }
        .image{
            float: right;
            margin-left:230px;
            margin-top: -65px;
        }
     </style>
  </head>   
  

<div class="container" style="margin-top:60px;"> 
   <div class="head">
      <div class="left">
         <h2><strong style="font-weight:bold">NdeTek</strong></h2>
         <h5><strong>The Heart of Technology</strong></h5>
      </div>
      <div class="image">
         <img src="images/receipt_logo.jpg" width="120" class="img-responsive">
      </div>
      <div class="right text-right pull-right">
         <h4><strong style="font-weight:bold">REPUBLIC OF CAMEROON</strong></h4>
         <h5><strong>Peace-Work-Fatherland</strong></h5>
      </div>
   </div>

   <hr>
      <h3 class="text-center"><strong style="font-weight:bold">PREP-CONCOUR TUITION RECEIPT</strong></h3>
    <h4 class="text-left"><small style="color:black">Mr/Mrs/Miss</small> <strong class="text-capitalize">' . strtolower($student['Name']) . '</strong>!</h4>
    Thank you for registering and paying your tuition fee for the concour preparatory classes. You have
    chosen to be trained for the <mark>' . $student['Concour'] . '</mark> concour. NdeTek is here
    to offer you the best concour training program in Cameroon. We have got well
    trained and talented personnels who will prepare you very well for your chosen
    concour. You have successfully completed all payment transactions required for full eligibility
    for the concour preparatory classes. We are haapy to inform you that you are now 100% ready 
    for our concour preparatory classes.


    Below are your personal information about your registration.
</div><hr>
<style>
   th, td{
       padding: 3px 10px;
   }
</style>
<section id="info" class="container">
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th>Attributes</th>
                    <th>Values</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Full Name</td>
                    <td><strong class="text-capitalize">' . strtolower($student['Name']) . '</strong></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>School</td>
                    <td><strong>' . $student['School'] . '</strong></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Date of Birth</td>
                    <td><strong>' . $student['Date_of_Birth'] . '</strong></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Contact</td>
                    <td><strong>' . $student['Contact'] . '</strong></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Sex</td>
                    <td><strong>' . $student['Gender'] . '</strong></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Concour</td>
                    <td><strong>' . $student['Concour'] . '</strong></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Address</td>
                    <td><strong>' . $student['Address'] . '</strong></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Registration Date</td>
                    <td><strong>' . $student['Registration_date'] . '</strong></td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Tuition Payment Date</td>
                    <td><strong>' . $student['Tuition_date'] . '</strong></td>
                </tr>
            </tbody>
        </table>
</section><hr>
<section>
    <div class="container" style="color:black">
        <div class="head">
            <div class="left">
                <ul>
                    <h5><li>Registration Fee: <strong>5,000FCFA (Paid)</strong></li></h4>
                    <h5><li>Tuition Fee: <strong>30,000FCFA (Paid)</strong></li></h4>
                    <h5><li>Total Fee: <strong>35,000FCFA</strong></li></h4>
                </ul>
                <h5 style="font-weight:bold">COMPLETED</h5>
                <div class="right" style="margin-left:300px;margin-top:-100px;">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="pull-right">
                                <img src="images/signed_stamp.jpg" width="300" class="img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><hr>
        <div class="head">
            <div class="left text-left">
                <h5>Yours sincerely,</h5>
            </div>
            <div class="right text-left" style="margin-top:-20px;margin-left:450px;">
                <h5><strong style="font-weight:bold;">Nfor Nde Nyambi</strong></h5>
                <h6><i>CEO</i></h6>
            </div>
        </div>
    </section>
  </body>
</html>












';


$document = $has_paid_tuition ? $concour_tuition_data : $concour_registration_data;

//print_r($concour_tuition_data);


$mpdf->WriteHTML($document);

$mpdf->Output($document_name, 'D');

header('Location: contents/dashboard/home.php');
exit;
