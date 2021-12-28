<?php


   session_start();

   require_once "../needs/loadJumbotron.php";
   
   require_once "functions.php";  

   require_once "../needs/dbconnect.php";

   $search = $_GET['search'] ?? '';



   $number_of_rows = sizeof(SelectMultipleRecords('graphic_design', $pdo));


   if(!isset($_GET['page'])){
       $page = 1;
   } else {
       $page = $_GET['page'];
   }

   $items_per_page = 4;

   $number_of_pages = ceil($number_of_rows / $items_per_page);

   $next = (($page + 1) > $number_of_pages) ? $number_of_pages : $page + 1;

   $prev = (($page - 1) < 1) ? 1 : $page - 1;

   $nextClass = ($page == $number_of_pages) ? 'disabled' : '';

   $prevClass = ($page == 1) ? 'disabled' : '';

   $pages_results = ($page - 1) * $items_per_page; 

   if($search){
        $statement = $pdo->prepare("SELECT * FROM graphic_design WHERE Name LIKE :name");
        $statement->bindValue(':name', "%$search%");
    } else {
        $statement = $pdo->prepare("SELECT * FROM graphic_design LIMIT $pages_results, $items_per_page");
    }

    $statement->execute();
    $papers = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    
    $_SESSION['price_per_paper'] = 25;



 
?>

 <?php require_once "htmlHeadForContents.php"; ?>

  <body class="body">
      <?php require_once 'navbarForContents.php';?>
      <?php require_once '../needs/jumbotron_content.php';?>
    
    <style>
        .graphic a{
            text-decoration: none;
            color: black;
        }
        @media(max-width: 300px){
            .yooo{
                font-size: 14px;
                font-weight: bolder;
            }
        }
    </style>
  
  <div class="container">
     <h4 class="text-center bold text-uppercase yooo">Our Graphic Design Templates</h4>
     <?php if($papers): ?>
        <div class="alert alert-info text-center">You can view each template by clicking on it. You can add it to cart by clicking on the Add to Cart button. The price of each template is indicated below it.</div>

        <!-- search bar -->

        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <form action="" method="get">
                    <div class="form-group">
                        <div class="input-group input-group-lg">
                            <input type="text" name="search" value="<?php echo $search ?>" placeholder="Search for Graphic Templates" class="form-control">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-dark">
                                    <span class="glyphicon glyphicon-search"></span>
                                    <span class="hidden-xs">Search</span>
                                </button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- displaying the number of search results -->

        <?php if($search && $papers): ?>
            <h4 class="text-center alert alert-success">
            <a href="#" data-dismiss="alert" class="close">&times;</a>
                <strong>
                    <?php echo sizeof($papers); ?>
                    results for <?php echo $search ?> found.
                </strong>
            </h4>
        <?php elseif(!$papers): ?>
            <h4 class="text-center alert alert-danger">
            <a href="#" data-dismiss="alert" class="close">&times;</a>
                <strong>0 values for <?php echo $search ?> found.</strong>
            </h4>
        <?php endif ?>

        <!-- View Cart -->

        <div class="row">
            <div class="col-xs-12">
                <div class="pull-left">
                    <button type="button" class="btn btn-success">
                        <a href="cart.php">
                            <i class="glyphicon glyphicon-shopping-cart"></i>
                            View Cart
                        </a>
                    </button> 
                </div>
            </div>
        </div><hr>
        
        <!-- GCE papers -->
        
        <?php foreach($papers as $paper): ?>
            <div class="col-sm-6 col-md-3 graphic">
                <a class="thumbnail" href="../templates/graphic/<?= $paper['url'] ?>">
                    <h5 class="text-center bold"><?php echo $paper['Name']; ?></h5>
                    <img src="../templates/graphic/<?= $paper['url'] ?>" class="img-responsive">
                    <div class="text-center">
                        <h5 class="text-center bold"><?= $paper['Price (FCFA)'] ?> FCFA</h5>
                        <form action="backend/shoppingCart.php" method="post">
                            <input type="hidden" name="group" value="graphic">
                            <input type="hidden" name="paper_name" value="<?php echo $paper['Name']; ?>">
                            <input type="hidden" name="paper_id" value="<?php echo $paper['id']; ?>">
                            <div class="text-center">
                                <?php if(!in_array($paper, $_SESSION['shopping_cart'])): ?>
                                    <button type="submit" class="btn btn-dark">
                                        <i class="glyphicon glyphicon-shopping-cart"></i>
                                        Add to Cart
                                    </button>
                                <?php else : ?>
                                    <button type="submit" class="btn btn-danger">    
                                        <i class="glyphicon glyphicon-trash"></i>
                                        Remove from Cart
                                    </button>
                                <?php endif ?>
                            </div>
                        </form>
                    </div>
                </a>
            </div>
        <?php endforeach ?>

        <!-- Pagination -->
        <?php if(!$search): ?>
            <div class="text-center row">
                <div class="col-xs-12">
                    <ul class="pagination pagination-lg">
                        <li class="<?= $prevClass ?>"><a href="graphic_template.php?page=<?= $prev ?>">&laquo; prev</a></li>
                            <?php for($i = 1; $i <= $number_of_pages; $i++): 
                                $class = (strval($i) === $page) ? 'active' : ''; 
                            ?>
                                <li class="<?= $class ?>"><a href="graphic_template.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                            <?php endfor ?>
                        <li class="<?= $nextClass ?>"><a href="graphic_template.php?page=<?= $next ?>">next &raquo;</a></li>
                    </ul>
                </div>
            </div>
        <?php endif ?>
     <?php else: ?>
        <div class="alert alert-warning text-center">
            There are no graphic design templates available for the moment. Please check again later.
        </div>
     <?php endif ?>
     <?php require_once '../needs/whatsapp.php' ?>
  </div>

    
    <!-- Footer and footer widget -->
    <?php
        include_once "../needs/footer.php";
    ?>
  </body>
</html>






