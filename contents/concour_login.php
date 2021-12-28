<?php


   session_start();
   
   require_once "functions.php"; 

    require_once "../needs/dbconnect.php";

    $registered_students = SelectMultipleRecords('concour_register', $pdo);

   $name = '';
   $dob = '';
   $contact = '';
   $error = '';
   $hasRegistered = false;
   
   if($_SERVER['REQUEST_METHOD'] === 'POST'){
       $name = $_POST['name'];
       $dob = $_POST['dob'];
       $contact = $_POST['contact'];
       
       

       if(!$name || !$dob || !$contact){
           $error = '<strong>Error!</strong> Fill in all the fields below.';
       }


       if(!$error){
           foreach($registered_students as $RS){
               if($RS['Name'] === strtoupper($name) && $RS['Date_of_Birth'] === DateOfBirth($_POST['dob']) && $RS['Contact'] === $contact){
                   $hasRegistered = true;
                   $_SESSION['name'] = $name;
                   $_SESSION['dob'] = DateOfBirth($_POST['dob']);
                   header('Location: dashboard/home.php');
                   $name = '';
                   $dob = '';
                   $contact = '';
                   break;
               }
           }
       }
   }
   
?>

 <?php require_once "htmlHeadForContents.php"; ?>
        <style>
            @media(max-width: 300px){
                .yooo{
                    font-size: 14px;
                    font-weight: bolder;
                }
            }
        </style>
  
  <body class="body">
      <?php require_once 'navbarForContents.php';?>
  
  <br><hr><div class="container">
     <h4 class="bold text-center text-uppercase yooo">Login into Concour Account</h4>
     <p class="alert alert-warning">
        <a href="#" data-dismiss="alert" class="close">&times;</a>
         Only students who have registered for the concour preparatory classes can login. If you haven't registered yet then click on the register link below to register.
    </p>
     
     <div class="row">
        <div class="well col-sm-6 col-sm-offset-3">
            <?php if($error): ?>
                <div class="alert alert-danger">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                    <div><?php echo $error ?></div>
                </div>
            <?php endif ?>
            <?php if(!$hasRegistered && $_SERVER['REQUEST_METHOD'] === 'POST' && !$error): ?>
                <div class="alert alert-danger">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                    <div><strong>Error!</strong> You have not registered; go and register first.</div>
                </div>
            <?php endif ?>
            <form method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-2"><span class="hidden-xs">Name:</span><span class="visible-xs">Full Name:</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="<?php echo $name ?>" placeholder="Enter your Full Name" class="form-control">
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
                    <div class="col-sm-10 col-sm-offset-2">
                        <input type="submit" value="Login" class="btn btn-dark cont">
                    </div>
                </div>
            </form>
            <p class="text-center"><a href="registration.php" style="color:#35424a;">Register</a></p>
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






