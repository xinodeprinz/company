<?php


   session_start();
   
   require_once "functions.php";   
   
   require_once "../needs/loadJumbotron.php";

   
   

   if(!isset($_SESSION['error'])){

        $_SESSION['name'] = '';
        $_SESSION['school'] = '';
        $_SESSION['dob'] = '';
        $_SESSION['contact'] = '';
        $_SESSION['sex'] = '';
        $_SESSION['concour'] = '';
        $_SESSION['address'] = '';

        $_SESSION['error'] = '';
        $_SESSION['hasRegistered'] = '';

   }

    


    $name = $_SESSION['name'];
    $school =  $_SESSION['school'];
    $dob = toDOB($_SESSION['dob']);
    $contact = $_SESSION['contact'];
    $sex = $_SESSION['sex'];
    $concour = $_SESSION['concour'];
    $address = $_SESSION['address'];
    $error = $_SESSION['error'];

    $hasRegistered = $_SESSION['hasRegistered'];

   $concours = ['Polythecnic Yaounde', 'Polythecnic Douala', 'Polythecnic Bamenda', 'ENS Yaounde', 'ENS Maroua', 'ENS Bambili', 'ENS Bertoua',
                'ENSET Kumba', 'ENSET Bambili', 'FAVM Buea', 'COT Buea', 'FET Buea', 'COLTECH Bamenda', 'FHS Buea', 'CUSS Yaounde', 'FASA Dschang'];

 
?>

 <?php require_once "htmlHeadForContents.php"; ?>
   <style>

   </style>
  
  <body class="body">
      <?php require_once 'navbarForContents.php';?>

      <style>
            @media(max-width: 300px){
                .yooo{
                    font-size: 14px;
                    font-weight: bolder;
                }
            }
        </style>
  
  <div class="container">
     <h4 class="bold text-center text-uppercase yooo" style="margin-top:50px;">Concour Preparatory Classes Registration</h4>
     <div class="row">
        <div class="well col-sm-6 col-sm-offset-3">
            <?php if($error): ?>
                <div class="alert alert-danger">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                    <div><?php echo $error ?></div>
                </div>
            <?php endif ?>
            <?php if($hasRegistered): ?>
                <div class="alert alert-info">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                    <div><strong>Alert!</strong> You have already registered. Go and pay your tuition fee.</div>
                </div>
            <?php endif ?>
            <form action="backend/concourRegister.php" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-2"><span class="hidden-xs">Name:</span><span class="visible-xs">Full Name:</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="<?php echo $name ?>" placeholder="Enter your Full Name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">School:</label>
                    <div class="col-sm-10">
                        <input type="text" name="school" value="<?php echo $school ?>" placeholder="Enter your current School" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-sm-2"><span class="hidden-xs">DOB:</span><span class="visible-xs">Date of Birth:</span></label>
                    <div class="col-sm-10">
                        <input type="date" name="dob" value="<?php echo $dob ?>" placeholder="Enter your Date of Birth" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-sm-2"><span class="hidden-xs">Phone:</span><span class="visible-xs">Phone Number:</span></label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon">+237</span>
                            <input type="number" name="contact" value="<?php echo $contact ?>" placeholder="Enter your phone number" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Gender:</label>
                    <div class="col-sm-10">
                        <select placeholder="Select your Sex" value="<?php echo $sex ?>" name="sex" class="form-control">
                            <option value="">Select your Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Concour:</label>
                    <div class="col-sm-10">
                        <select placeholder="Select the Concour you want to write" value="<?php echo $concour ?>" name="concour" class="form-control">
                            <option value="">Select your Concour</option>
                            <?php foreach($concours as $concour): ?>
                                <option value="<?php echo $concour ?>"><?php echo $concour ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Address:</label>
                    <div class="col-sm-10">
                        <input type="text" name="address" value="<?php echo $address ?>" placeholder="Enter your current location" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" name="feesType" value="concourRegistration">
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <input type="submit" value="Next &rarr;" class="btn btn-dark cont">
                    </div>
                </div>
            </form>
            <p class="text-center"><a href="concour_login.php" style="color:#35424a;">Pay Tuition</a></p>
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






