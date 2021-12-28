<?php

session_start();

if(!isset($_SESSION['amount'])){
    header('Location: ../index.php');
}

require_once "functions.php"; 

require_once "../needs/dbconnect.php";


function getToken(){
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://demo.campay.net/api/token/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
    "username": "Bo1IKDOGkHfWEYj2XPHlxU2wZty0tBdMrPw_RuCeHGNLMHksCQP48ZcJqr8KJH5pbsH8NnVmTdC07hukvPdNWA",
    "password": "R06-K23Kt-u4mLa6lAIuB-jpyjHAdkcfEz9qIRNJzhCB-ctPSZXE7DdcZvMFLQ4-ABaJSYT4jFvDEHNjaM-mrg"
    }',
    CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    $object = json_decode($response);
    return $object->{'token'};
}




function requestToPay($token, $phone_number, $description, $amount){

   $external_reference = strval(random_int(100000000, 999999999));
   $phone = '237' . $phone_number;

   $curl = curl_init();

   curl_setopt_array($curl, array(
     CURLOPT_URL => 'https://demo.campay.net/api/collect/',
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_ENCODING => '',
     CURLOPT_MAXREDIRS => 10,
     CURLOPT_TIMEOUT => 0,
     CURLOPT_FOLLOWLOCATION => true,
     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => 'POST',
     CURLOPT_POSTFIELDS => '{
       "amount":'. json_encode($amount) .',
       "from":'. json_encode($phone) .', 
       "description":'. json_encode($description) .',
       "external_reference": '. json_encode($external_reference) .'
     }',
     //'{"amount":"5","from":"237"' . $phone_number . ',"description":' . $description .',"external_reference": ' . $external_reference . '}',
     CURLOPT_HTTPHEADER => array( //"123456789"}
       'Authorization: Token ' . $token,  //54982975 //curl_escape //654982975
       'Content-Type: application/json'
     ),
   ));

   $response = curl_exec($curl);

   curl_close($curl);
   return json_decode($response)->{'reference'};
}


function paymentStatus($reference, $token){

     $curl = curl_init();

     curl_setopt_array($curl, array(
     CURLOPT_URL => 'https://demo.campay.net/api/transaction/'. $reference . '/',
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_ENCODING => '',
     CURLOPT_MAXREDIRS => 10,
     CURLOPT_TIMEOUT => 0,
     CURLOPT_FOLLOWLOCATION => true,
     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => 'GET',
     CURLOPT_HTTPHEADER => array(
       'Authorization: Token ' . $token,
       'Content-Type: application/json'
     ),
   ));

   $response = curl_exec($curl);

   curl_close($curl);
   return json_decode($response)->{'status'};
}

// End of API functions

   $amount = $_SESSION['amount'];

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
     
    // checking for internet connection
    $internet_connection = @fsockopen('www.google.com', 80);

    if(empty($phone_error) && $_SERVER['REQUEST_METHOD'] === 'POST'){
        if($internet_connection){
            $description = 'Items payment';
            $token = getToken();
            $reference = requestToPay($token, $phone_number, $description, $amount);
            $status = paymentStatus($reference, $token);

            while($status){
                if($status === 'PENDING'){
                    $status = paymentStatus($reference, $token);
                } else if($status === 'SUCCESSFUL'){
                    $val_error = 'Transaction Successfull!';
                    $_SESSION['cart_payment'] = true;
                    header('Location: download.php');
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



    //catch

    // function checkNum($number){
    //     if($number > 1){
    //         throw new Exception("Value must be 1 or below");
    //     }
    //     return true;
    // }
    // try {
    //     checkNum(2);
    //     echo 'If you see this, the number is one or below';
    // }
    // catch(Exception $e){
    //     echo 'Message: ' .$e->getMessage();
    // }
  

?>

<?php require_once "htmlHeadForContents.php"; ?>
<body class="body">
    <?php require_once 'navbarForContents.php';?>
    <div class="container">
       <div class="row">
            <div class="text-center">
                <h3 class="text-center" style="margin-top:100px;">Checkout</h3><hr>
                  <p class="alert alert-warning text-left">
                    <a href="#" data-dismiss="alert" class="close">&times;</a>
                    <strong>NB:</strong> Make sure you have more than <strong><?php echo $amount ?> FCFA</strong> in your MTN or Orange mobile money account inorder to make this payment.
                    <br>Enter either an MTN or an Orange number to make payment
                  </p>
                <hr>
            </div>
            <div class="col-xs-6 col-sm-3">
                <img src="../images/mtn.jpg" width="400" class="img-responsive">
            </div>
            <div class="col-xs-6 col-sm-3">
                <img src="../images/orange1.jpg" width="400" class="img-responsive" style="margin-bottom:20px">
            </div>
            <div class="col-sm-6" style="margin-top:10px;">
            <h4 style="margin-top:-5px;">Amount: <strong><?php echo $amount ?> FCFA</strong></h4>
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
                    <input type="submit" value="Pay" class="btn btn-dark col-xs-12">
                </form>
            </div>
       </div><hr>
       <div class="pull-left"><button class="btn btn-dark"><a href="cart.php">&larr; Back</a></button></div>
       <?php require_once '../needs/whatsapp.php' ?>
    </div> <br>






        <!-- Footer and footer widget -->
    <?php
        include_once "../needs/footer.php";
    ?>
</body>
</html>