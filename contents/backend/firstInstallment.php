<?php
  
    session_start();
    
    $_SESSION['feesType'] = 'webFirstInstallment';

    header('Location: ../payFees.php');



    

?>