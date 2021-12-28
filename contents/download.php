<?php
 

    session_start();

    require_once "functions.php";

    require_once "../needs/dbconnect.php";

    $tableName = date('l, jS \of F Y, h:i:s A', time() - 3600);

    if(!isset($_SESSION['cart_payment'])){
         header('Location: ../index.php');
         exit; 
    }

    CreatePaperTable($tableName, $pdo1);

    foreach($_SESSION['shopping_cart'] as $paper){
        InsertIntoPapersTable($_SESSION['shopping_cart'], $tableName, $pdo1);
    }

    if(isset($_GET['action'])){
        session_destroy();
        header('Location: ../index.php');
    } 

    

?>

<?php require_once "htmlHeadForContents.php"; ?>
    <body style="margin-top:100px;">
        <nav class="navbar navbar-fixed-top hidden-print bg-dark">
           <div class="container">
            <div class="navbar-brand">
                <div id="title">
                    <img src="../images/ndeL.jpg" alt="NdeTek" width="110" class="img-responsive" style="margin-top:-10px;">
                </div>
           </div>
        </nav>
       <div class="container">
           <div class="pull-right">
               <a href="download.php?action=go_back" class="btn btn-dark">
                   &larr; Go back
               </a>
           </div><hr>
           <p class="alert alert-success">
               Thank you for purchasing the below items. You can now download an item by clicking
               on the download button beneath it.
           </p>
           <p class="alert alert-warning">
               Don't click on the <strong><mark>Go back</mark></strong>
               button if you haven't downloaded all of your items because
               if you do, you'll lose access to this page. Hence click on
               the button only after you've finished downloading all of your
               items. Thanks!
           </p>
           <div class="row">
               <?php foreach($_SESSION['shopping_cart'] as $item):?>
                  <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <?php if($item['Price (FCFA)'] == 25): ?>
                            <h5 class="text-center bold"><?php echo $item['Name']; ?></h5>
                            <img src="../images/gce_image.jpg" class="img-responsive">
                            <div class="text-center">
                                <button class="btn btn-dark">
                                    <a href="../papers/gce_al/<?php echo $item['url'] ?>" download="<?php echo $item['Name'].'.pdf' ?>">
                                        <i class="fa fa-download"></i>
                                        Download
                                    </a>
                                </button>
                            </div>
                         <?php else: ?>
                            <h5 class="text-center bold"><?php echo $item['Name']; ?></h5>
                            <img src="../templates/graphic/<?= $item['url'] ?>" class="img-responsive">
                            <div class="text-center">
                                <button class="btn btn-dark">
                                    <a href="../templates/graphic/<?php echo $item['url'] ?>" download="<?php echo $item['Name'].'.jpg' ?>">
                                        <i class="fa fa-download"></i>
                                        Download
                                    </a>
                                </button>
                            </div>
                         <?php endif ?>
                    </div>
                </div>
               <?php endforeach ?>
           </div>
       </div><br><br><br>

       <!-- footer -->
    <footer style="text-align: center; color: white; padding: 5px; font-weight: bold;background:#35424a;" class="navbar navbar-fixed-bottom">
        <p style="padding-top: 10px;">NdeTek &copy; copyright 2021</p>
    </footer> 
  </body>
</html>    

  



  