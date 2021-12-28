<?php

   //require_once "../needs/session.php";

   session_start();

   require_once "../needs/loadJumbotron.php";
   
   require_once "functions.php";    


   if(!isset($_SESSION['error'])){

    $_SESSION['name'] = '';
    $_SESSION['dob'] = '';
    $_SESSION['email'] = '';
    $_SESSION['contact'] = '';
    $_SESSION['sex'] = '';
    $_SESSION['address'] = '';
    $_SESSION['has_joined_us'] = '';

   } 

    $name = $_SESSION['name'];
    $dob = toDOB($_SESSION['dob']);
    $email = $_SESSION['email'];
    $contact = $_SESSION['contact'];
    $sex = $_SESSION['sex'];
    $address = $_SESSION['address'];
    $has_joined_us = $_SESSION['has_joined_us'];
    $error = $_SESSION['error'];
    $success = $_SESSION['success'];
    
    

 
?>

 <?php require_once "htmlHeadForContents.php"; ?>
   <style>

   </style>
  <body class="body">
      <?php require_once 'navbarForContents.php';?>

      <?php require_once '../needs/jumbotron_content.php';?>
      <style>
            @media(max-width: 300px){
                .yooo{
                    font-size: 14px;
                    font-weight: bolder;
                }
            }
        </style>
  
  <div class="container">
     <h4 class="bold text-center text-uppercase yooo">Become a NdeTek member</h4>
     <div class="alert alert-info text-center">
        <a href="#" data-dismiss="alert" class="close">&times;</a>
        <span class="">
            Fill in the form below to become a member of NdeTek. You can click on the
            whatsApp icon below to chat with us on whatsApp.
        </span>
     </div>
     <div class="row">
        <div class="well col-sm-6 col-sm-offset-3">
        <?php if($error && !$has_joined_us): ?>
                <div class="alert alert-danger">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                    <div><?php echo $error ?></div>
                </div>
            <?php endif ?>
            <?php if($has_joined_us): ?>
                <div class="alert alert-info">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                    <div><strong>Alert!</strong> You are already a member of the NdeTek community!</div>
                </div>
            <?php endif ?>
            <?php if($success): ?>
                <div class="alert alert-success">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                    <?php echo $success ?>
                </div>
            <?php endif ?>
            <form action="backend/Contact.php" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-2"><span class="hidden-xs">Name:</span><span class="visible-xs">Full Name:</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="<?php echo $name ?>" placeholder="Enter your full name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-sm-2">Email <span class="text-info">(optional):</span></label>
                    <div class="col-sm-10">
                        <input type="email" name="email" value="<?php echo $email ?>" placeholder="yoo@example.com" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                        <label class="control-label col-sm-2"><span class="hidden-xs">DOB:</span><span class="visible-xs">Date of Birth:</span></label>
                    <div class="col-sm-10">
                        <input type="date" name="dob"  value="<?php echo $dob ?>" placeholder="Your date of birth" class="form-control">
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
                            <option value="">Select your Sex</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Address:</label>
                    <div class="col-sm-10">
                        <input type="text" name="address" value="<?php echo $address ?>" placeholder="Address" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <input type="submit" value="Join Us" class="btn btn-dark cont">
                    </div>
                </div>
            </form>
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






