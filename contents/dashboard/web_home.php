<?php

    session_start();

    require_once '../functions.php';

    if(!$_SESSION['name']){
        header('location: ../web_login.php');
        exit;
    }
    
    $_SESSION['logout'] = 'web_login'; // This code is the login condition

    require_once "../../needs/dbconnect.php";

    $name = $_SESSION['name'];

    $dob = $_SESSION['dob'];

    $has_paid_first_installment = false;

    $has_paid_second_installment = false;

    $student = SelectSingleRecord2('web_register', $name, $pdo, $dob);

    $student2 = SelectMultipleRecords('web_first_installment', $pdo);

    $student4 = SelectMultipleRecords('web_second_installment', $pdo);

    foreach($student2 as $st2){
        if($st2['Name'] === strtoupper($name) && $st2['Date_of_Birth'] === $dob){
            $has_paid_first_installment = true;
            break;
        }
    }

    foreach($student4 as $ste2){
        if($ste2['Name'] === strtoupper($name) && $ste2['Date_of_Birth'] === $dob){
            $has_paid_second_installment = true;
            break;
        }
    }

    if($has_paid_first_installment){
        $student3 = SelectSingleRecord2('web_first_installment', $name, $pdo, $dob);
    }

    if($has_paid_second_installment){
        $student5 = SelectSingleRecord2('web_second_installment', $name, $pdo, $dob);
    }

    // echo '<pre>';
    //    var_dump($student3); <!-- Registration: (10, 45, 45), 1st & 2nd inst (20, 40, 40) -->
    // echo '</pre>'; exit;

    $w1 = $has_paid_first_installment ? '20%' : '10%';

    $w2 = $has_paid_first_installment ? '40%' : '45%';

    $w3 = $has_paid_first_installment ? '40%' : '45%';






?>

    <?php require_once 'dashboard_head.php' ?>

    <style>
        @media(max-width: 300px){
        .yooo{
            font-size: 15px;
            font-weight: bolder;
        }
      }
    </style>

    <div class="container" style="margin-top:60px;">
    <?php if(!$has_paid_first_installment): ?>
        <div class="pull-right" style="margin-top:20px;">
            <button class="btn btn-dark">
                <a href="../backend/firstInstallment.php">
                    <div class="fa fa-dollar"></div>
                    Pay 1<sup>st</sup> installment
                </a>
            </button>
        </div>
    <?php endif ?>
    <?php if($has_paid_first_installment && !$has_paid_second_installment): ?>
        <div class="pull-right" style="margin-top:20px;">
            <button class="btn btn-dark">
                <a href="../backend/secondInstallment.php">
                    <div class="fa fa-dollar"></div>
                    Pay 2<sup>nd</sup> installment
                </a>
            </button>
        </div>
    <?php endif ?>       
       <h2><strong>NdeTek</strong></h2>
       <h5><strong>The Heart of Technology</strong></h5>
       <hr>
       <?php if($has_paid_first_installment && !$has_paid_second_installment): ?>
          <div class="alert alert-info"><strong>Congratulations <span class="text-capitalize"><?php echo strtolower($name) ?></span>!</strong> You've registered and successfully paid first installment for the web development classes. Click the pay 2<sup>nd</sup> installment button above to pay second installment.</div>
       <?php endif ?>
       <?php if($has_paid_second_installment): ?>
          <div class="alert alert-success"><strong>Congratulations <span class="text-capitalize"><?php echo strtolower($name) ?></span>!</strong> You've successfully registered and paid both your first and second installments for the <mark><strong>web development classes</strong></mark>.</div>
       <?php endif ?>
        <h3 class="text-center yooo">Welcome <strong class="text-capitalize"><?php echo strtolower($name) ?></strong>!</h3><br>
        <?php if(!$has_paid_second_installment): ?>
            <p>Thank you for registering <?php if($has_paid_first_installment){echo 'and paying first installment';} ?> for the <strong><mark>web development classes</mark></strong>.</p>
        <?php endif ?>
        <?php if(!$has_paid_first_installment): ?>
            <strong>NB: </strong>To be fully eligible for the web development classes, you need to pay your <strong>first and second installments</strong>.
            Click on the Pay 1<sup>st</sup> installment button above to pay your first installment. You'll be able to pay your second installment only after you've successfully paid your first installment.<br><br>
        <?php endif ?>


        Below are your personal information about your registration <?php if($has_paid_first_installment){echo 'and installment payments';} ?>
    </div><hr>
    <section id="info" class="container">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead> 
                    <tr>
                        <th width="<?= $w1 ?>">#</th>
                        <th width="<?= $w2 ?>">Attributes</th>
                        <th width="<?= $w3 ?>">Values</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Full Names</td>
                        <td><strong class="text-capitalize"><?php echo strtolower($student['Name']); ?></strong></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Date of Birth</td>
                        <td><strong><?php echo $student['Date_of_Birth']; ?></strong></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Phone Number</td>
                        <td><strong><?php echo $student['Phone']; ?></strong></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Sex</td>
                        <td><strong><?php echo $student['Gender']; ?></strong></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Address</td>
                        <td><strong><?php echo $student['Address']; ?></strong></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Registration Date</td>
                        <td><strong><?php echo $student['Registration_date']; ?></strong></td>
                    </tr>
                    <?php if($has_paid_first_installment): ?>
                        <tr>
                            <td>7</td>
                            <td>First installment payment Date</td>
                            <td><strong><?php echo $student3['Payment_date']; ?></strong></td>
                        </tr>
                    <?php endif ?>
                    <?php if($has_paid_second_installment): ?>
                        <tr>
                            <td>8</td>
                            <td>Second installment payment Date</td>
                            <td><strong><?php echo $student5['Payment_date']; ?></strong></td>
                        </tr>
                    <?php endif ?>
                </tbody>
                <tfoot>
                    <?php if(!$has_paid_first_installment): ?>
                        <tr>
                            <td class="text-center h5" colspan="3"><strong>Registration Amount: 5,000 FCFA</strong></td>
                        </tr>
                    <?php elseif($has_paid_first_installment && !$has_paid_second_installment): ?>
                        <tr>
                            <td class="h5"><strong>Registration: 5,000 FCFA</strong></td>
                            <td class="h5"><strong>1<sup>st</sup> Installment: 30,000 FCFA</strong></td>
                            <td class="h5"><strong>Total Amount: 35,000 FCFA</strong></td>
                        </tr>
                    <?php elseif($has_paid_second_installment): ?>
                        <tr>
                            <td class="h5"><strong>Registration: 5,000 FCFA</strong></td>
                            <td class="h5">
                                <strong style="display:inline-flex">
                                    <div>1<sup>st</sup> Installment : 30,000 FCFA </div>
                                    <div style="margin-left:35px;">2<sup>nd</sup> Installment : 25,000 FCFA</div>
                                </strong>
                            </td>
                            <td class="h5"><strong>Total Amount: 60,000 FCFA</strong></td>
                        </tr>
                    <?php endif ?>    
                </tfoot>
            </table>
            <p class="text-center">
                <button class="btn btn-dark">
                    <div class="fa fa-download"></div>
                    Download
                </button>
            </p>
        </div>
        <?php require_once '../../needs/whatsapp.php' ?>
    </section><hr>




    <?php require_once '../../needs/footer.php'; ?>
</body>
</html>