<?php
  
    session_start();
    
    $_SESSION['feesType'] = 'concourTuition';

    header('Location: ../payFees.php');



    

?>