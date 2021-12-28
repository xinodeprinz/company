<?php

session_start();

require_once "../needs/loadJumbotron.php";

if(!$_SESSION['name']){
    header('location: ../index.php');
    exit;
}

$name = $_SESSION['name'];

$dob = $_SESSION['dob'];


$feesType = $_SESSION['feesType'];

$backPath = ''; 

$concourFees = '';

$typeOFPayment = '';

$description = '';

$reference = '';

$status = '';

if($feesType === 'concourTuition'){
    $backPath = 'dashboard/home.php';
    $concourFees = '100'; //30000
    $typeOFPayment = 'Tuition Fee';
    $description = 'Tuition fee for concour preparatory classes';
} else if($feesType === 'concourRegistration'){
    $backPath = 'registration.php';
    $concourFees = '25'; //5000
    $typeOFPayment = ' Concour Registration Fee';
    $description = 'Registration fee for concour preparatory classes';
} else if($feesType === 'webRegistration'){
    $backPath = 'web_registration.php';
    $concourFees = '25'; //5000
    $typeOFPayment = 'Web Registration Fee';
    $description = 'Registration fee for web development classes';
} else if($feesType === 'webFirstInstallment'){
    $backPath = 'dashboard/web_home.php';
    $concourFees = '100'; //30000
    $typeOFPayment = 'First Installment';
    $description = 'First installment fee for web development classes';
} else if($feesType === 'webSecondInstallment'){
    $backPath = 'dashboard/web_home.php';
    $concourFees = '75'; //25000
    $typeOFPayment = 'Second Installment';
    $description = 'Second installment fee for web development classes';

}   



//entering phone number to make payment
$phone_number = '';
$phone_error = [];
$val_error = '';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $phone_number = $_POST['phone_number'];
    if($phone_number){
        if($phone_number[1] !== '9' && $phone_number[1] !== '8'  && $phone_number[1] !== '7' && $phone_number[1] !== '5' || $phone_number[0] !== '6'){
            $phone_error[] = 'Please enter either an MTN or an Orange number inorder to make payment';
        }
        
        if(strlen($phone_number) !== 9){
            $phone_error[] = 'Phone number must contain 9 digits';
        }
    } else {
        $phone_error[] = 'Please enter either an MTN or an Orange number inorder to make payment';
        $phone_error[] = 'Phone number must contain 9 digits';
    }
}

$internet_connection = @fsockopen('www.google.com', 80);

if(empty($phone_error) && $_SERVER['REQUEST_METHOD'] === 'POST'){

   if($internet_connection){
        require_once 'api/api_functions.php';

        $reference = requestToPay($token, $phone_number, $description, $concourFees);
        $status = paymentStatus($reference, $token);

        while($status){
            if($status === 'PENDING'){
                $status = paymentStatus($reference, $token);
            } else if($status === 'SUCCESSFUL'){
                $_SESSION['name'] = $name;
                $_SESSION['dob'] = $dob;
                $_SESSION['feesType'] = $feesType;
                $phone_number = '';
                if($feesType === 'concourRegistration'){
                    header('Location: success.php');
                } else if($feesType === 'concourTuition'){
                    header('Location: backend/concourTuition2.php');
                } else if($feesType === 'webRegistration'){
                    header('Location: success.php');
                } else if($feesType === 'webFirstInstallment'){
                    header('Location: backend/firstInstallment2.php');
                } else if($feesType === 'webSecondInstallment'){
                    header('Location: backend/secondInstallment2.php');
                }
                break;
            }
            else if($status === 'FAILED'){
                $val_error = 'Transaction Failed!';
                break;
            }
        }
   } else {
       $val_error = 'No internet connection';
   }
}



?>



<?php require_once "htmlHeadForContents.php"; ?>
<style>
    @media(max-width:600px){
        .pay{
            font-size:20px;
        }
    }
    @media(max-width: 300px){
        .yooo{
            font-size: 15px;
            font-weight: bolder;
        }
    }
</style>

<body class="body">
    <?php require_once 'navbarForContents.php';?>
    <div class="container">
       <div class="row">
            <div class="text-center" style="margin-top:100px;">
                <h3 class="yooo">Hello <strong class="text-capitalize"><?php echo strtolower($name) ?></strong></h3><hr>
                  <p class="alert alert-warning text-left">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                    <strong>NB:</strong> Make sure you have more than <strong><?php echo $concourFees ?> FCFA</strong> in your MTN or Orange mobile money account inorder to make this payment.
                    <br>Enter either an MTN or an Orange number to make payment
                  </p>
                <hr>
            </div>
            <div class="col-xs-6 col-sm-3">
                <img src="../images/mtn.jpg" width="400" class="img-responsive">
            </div>
            <div class="col-xs-6 col-sm-3">
                <img src="../images/orange1.jpg" width="400" class="img-responsive">
            </div>
            <div class="col-sm-6">
            <h3 style="margin-top:15px;" class="col-xs-12 text-uppercase text-center bold pay yooo">Pay <?php echo $typeOFPayment ?></h3>
            <h4>Amount: <strong><?php echo $concourFees ?> FCFA</strong></h4>
                <form action="" method="post">
                <?php if($phone_error): ?>
                    <div class="alert alert-danger">
                        <a href="#" data-dismiss="alert" class="close">&times;</a>
                        <?php foreach($phone_error as $p_err): ?>
                            <?php echo $p_err . '<br>' ?>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
                <?php if($val_error): ?>
                    <div class="text-center alert alert-danger">
                        <a href="#" data-dismiss="alert" class="close">&times;</a>
                        <?php echo $val_error ?>
                    </div>
                <?php endif ?>
                    <div class="form-group">
                        <label style="color:grey">Phone Number</label>
                        <div class="input-group">
                            <span class="input-group-addon">+237</span>
                            <input type="number" value="<?php echo $phone_number ?>" name="phone_number" class="form-control" placeholder="678987654">
                        </div>
                    </div>
                    <input type="submit" value="PayFees" class="btn btn-dark col-xs-12">
                </form>
            </div>
       </div><hr>
       <div class="pull-left"><button class="btn btn-dark"><a href="<?php echo $backPath ?>">&larr; Back</a></button></div>
       <?php require_once '../needs/whatsapp.php' ?>
    </div> <br>






        <!-- Footer and footer widget -->
    <?php
        include_once "../needs/footer.php";
    ?>
</body>

</html>












