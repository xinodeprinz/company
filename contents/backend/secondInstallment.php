<?php
  
    session_start();
    
    $_SESSION['feesType'] = 'webSecondInstallment';

    header('Location: ../payFees.php');



    

?>