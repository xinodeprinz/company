<?php


   session_start();
   
   require_once "functions.php";    

   require_once "../needs/dbconnect.php";

   $id = $_GET['id'] ?? null;
   
   if($id){
        foreach($_SESSION['shopping_cart'] as $item){
            if($item['id'] === $id){
                $array_id = array_search($item, $_SESSION['shopping_cart']);
                unset($_SESSION['shopping_cart'][$array_id]);
                break;
            }
        }
   }

   
   $_SESSION['amount'] = 0;
   foreach($_SESSION['shopping_cart'] as $n){
      $_SESSION['amount'] += $n['Price (FCFA)'];
   }

        
 
?>

 <?php require_once "htmlHeadForContents.php"; ?>

  <body class="body">
      <?php require_once 'navbarForContents.php';?>
  
  <div class="container">
      <?php if($_SESSION['shopping_cart']): ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="pull-left" style="margin-top:100px;">
                    <button type="button" class="btn btn-primary">
                        <a href="graphic_template.php?page=1">
                            <!-- <i class="glyphicon glyphicon-euro"></i> -->
                            Add more items
                        </a>
                    </button> 
                </div>
            </div>
        </div>
        <h3 class="text-center bold">
            <i class="glyphicon glyphicon-shopping-cart"></i>
            Cart
        </h3>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item Names</th>
                        <th>Price (FCFA)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($_SESSION['shopping_cart'] as $i => $paper): ?>
                        <tr>
                            <td><?php echo ++$i ?></td>
                            <td><?php echo $paper['Name'] ?></td>
                            <td><?= $paper['Price (FCFA)'] ?></td>
                            <td>
                                <form action="" method="get">
                                    <input type="hidden" name="id" value="<?php echo $paper['id'] ?>">
                                    <button type="submit" class="btn btn-danger">
                                        <i class="glyphicon glyphicon-trash"></i>
                                        Remove from Cart
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="text-center"><strong>Number of Items: <?php echo count($_SESSION['shopping_cart']) ?></strong></td>
                        <td colspan="2"><strong>Total Amount: <?= $_SESSION['amount'] ?> FCFA</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success">
                <a href="checkout.php">
                    <i class="glyphicon glyphicon-euro"></i>
                    Preceed to Checkout
                </a>
            </button> 
        </div>
     <?php else: ?>
        <div class="alert alert-warning text-center" style="margin-top:200px;">Your Cart is empty!</div>
        <div class="text-center">
            <button class="btn btn-primary">
                <a href="graphic_template.php?page=1">View Templates</a>
            </button>
        </div>
     <?php endif ?>
     <?php require_once '../needs/whatsapp.php' ?>
  </div><br><br><br>

    <!-- Footer -->
  <footer style="text-align: center; color: white; padding: 5px; font-weight: bold;background:#35424a;" class="navbar navbar-fixed-bottom">
      <p style="padding-top: 10px;">NdeTek &copy; copyright 2021</p>
  </footer> 
  </body>
</html>






