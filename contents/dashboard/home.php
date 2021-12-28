<?php

    session_start();

    require_once '../functions.php';

    if(!$_SESSION['name']){
        header('location: ../concour_login.php');
        exit;
    }

    $_SESSION['logout'] = 'concour_login'; // This code is the login condition

    require_once "../../needs/dbconnect.php";

    $name = $_SESSION['name'];

    $dob = $_SESSION['dob'];

    $has_paid_tuition = false;

    $student = SelectSingleRecord2('concour_register', $name, $pdo, $dob);

    $_SESSION['array'] = $student;

    $student2 = SelectMultipleRecords('concour_tuition', $pdo);

    foreach($student2 as $st2){
        if($st2['Name'] === strtoupper($name) && $st2['Date_of_Birth'] === $dob){
            $has_paid_tuition = true;
            break;
        }
    }

    if($has_paid_tuition){
        $student3 = SelectSingleRecord2('concour_tuition', $name, $pdo, $dob);
        $_SESSION['array']['Tuition_date'] = $student3['Payment_date'];
    }

    $_SESSION['array']['has_paid_tuition'] = $has_paid_tuition ? true : false;
    
    // $keys = array_keys($student);
    // $values = array_values($student);

    // echo '<pre>';
    //    var_dump($keys, $values);
    // echo '</pre>';

    

    // foreach($student as $stud){
    //     $keys[] = array_keys($)
    // }





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
    <?php if(!$has_paid_tuition): ?>
        <div class="pull-right" style="margin-top:20px;">
            <button class="btn btn-dark">
                <a href="../backend/concourTuition.php">
                    <div class="fa fa-dollar"></div>
                    Pay Tuition
                </a>
            </button>
        </div>
    <?php endif ?>    
       <h2><strong>NdeTek</strong></h2>
       <h5><strong>The Heart of Technology</strong></h5>
       <hr>
       <?php if($has_paid_tuition): ?>
          <div class="alert alert-success"><strong>Congratulations <span class="text-capitalize"><?php echo strtolower($name) ?></span>!</strong> You've registered and successfully paid tuition fee for the concour preparatory classes.</div>
       <?php endif ?>
        <h3 class="text-center yooo">Welcome <strong class="text-capitalize"><?php echo strtolower($name) ?></strong>!</h3><br>
        <p>Thank you for registering <?php if($has_paid_tuition){echo 'and paying tuition fee';} ?> for the <strong><mark>concour preparatory classes</mark></strong>.</p>
        <?php if(!$has_paid_tuition): ?>
            <strong>NB: </strong>To be fully eligible for the concour preparatory classes, you need to pay your <strong>tuition fee</strong>.
            Click on the Pay Tuition button above to pay your tuition fee. You can download your registration receipt by clicking on the download button below.
        <?php endif ?>
        <?php if($has_paid_tuition): ?>
            You can download your tuition payment receipt by clicking on the download button below. 
        <?php endif ?>
        Candidates must present their registration or tuition receipt to administrators, so always
        bring your receipts along. <br><br>


        Below are your personal information about your registration <?php if($has_paid_tuition){echo 'and tuition payments';} ?>
    </div><hr>
    <section id="info" class="container">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width="20%">#</th>
                        <th width="40%">Attributes</th>
                        <th width="40%">Values</th>
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
                        <td>School</td>
                        <td><strong><?php echo $student['School']; ?></strong></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Date of Birth</td>
                        <td><strong><?php echo $student['Date_of_Birth']; ?></strong></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Contact</td>
                        <td><strong><?php echo $student['Contact']; ?></strong></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Sex</td>
                        <td><strong><?php echo $student['Gender']; ?></strong></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Concour</td>
                        <td><strong><?php echo $student['Concour']; ?></strong></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Address</td>
                        <td><strong><?php echo $student['Address']; ?></strong></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Registration Date</td>
                        <td><strong><?php echo $student['Registration_date']; ?></strong></td>
                    </tr>
                    <?php if($has_paid_tuition): ?>
                        <tr>
                            <td>8</td>
                            <td>Tuition Payment Date</td>
                            <td><strong><?php echo $student3['Payment_date']; ?></strong></td>
                        </tr>
                    <?php endif ?>
                </tbody>
                <tfoot>
                    <?php if(!$has_paid_tuition): ?>
                        <tr>
                            <td class="text-center h5" colspan="3"><strong>Registration Amount: 5,000 FCFA</strong></td>
                        </tr>
                    <?php else: ?>
                        <tr>
                            <td class="h5"><strong>Registration: 5,000 FCFA</strong></td>
                            <td class="h5"><strong>Tuition Amount: 30,000 FCFA</strong></td>
                            <td class="h5"><strong>Total Amount: 35,000 FCFA</strong></td>
                        </tr>
                    <?php endif ?>    
                </tfoot>
            </table>
            <p class="text-center">
                <button class="btn btn-dark">
                    <a href="../../pdf.php">
                        <div class="fa fa-download"></div>
                        Download Receipt
                    </a>
                </button>
            </p>
        </div>
        <?php require_once '../../needs/whatsapp.php' ?>
    </section><hr>




    <?php require_once '../../needs/footer.php'; ?>
</body>
</html>