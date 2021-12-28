<?php


   session_start();

   require_once "../needs/loadJumbotron.php";
   
   require_once "functions.php";    

   require_once "../needs/dbconnect.php";

   if(!isset($_GET['type'])){
       header('Location: past_papers.php?type=gce_al&page=1');
       exit;
   }

   $search = $_GET['search'] ?? '';

   if(isset($_GET['search']) && !$_GET['search'] && $_GET['type'] === 'gce_al'){
        header('Location: past_papers.php?type=gce_al&page=1');
        exit;
   } else if(isset($_GET['search']) && !$_GET['search'] && $_GET['type'] === 'cot'){
        header('Location: past_papers.php?type=cot&page=1');
        exit;
   } else if(isset($_GET['search']) && !$_GET['search'] && $_GET['type'] === 'fet'){
        header('Location: past_papers.php?type=fet&page=1');
        exit;
   } else if(isset($_GET['search']) && !$_GET['search'] && $_GET['type'] === 'ub'){
        header('Location: past_papers.php?type=ub&page=1');
        exit;
   }

   $type = isset($_GET['type']) ? $_GET['type'] : 'gce_al';



   if($_GET['type'] === 'gce_al'){
        $number_of_rows = sizeof(SelectMultipleRecords('gce_al', $pdo));
    } else if($_GET['type'] === 'cot'){
        $number_of_rows = sizeof(SelectMultipleRecords('cot', $pdo));
    } else if($_GET['type'] === 'fet'){
        $number_of_rows = sizeof(SelectMultipleRecords('fet', $pdo));
    } else if($_GET['type'] === 'ub'){
        $number_of_rows = sizeof(SelectMultipleRecords('ub_past_papers', $pdo));
    } 

    $types = ['gce_al', 'cot', 'fet', 'ub'];


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

   if($type === 'gce_al'){
       $h = 'GCE Advanced Level Papers';
       $p = 'You can download past GCE advanced level papers here for free.';
       $paper_image = '../images/gce_image.jpg';
       $paper_url = '../papers/gce_al/';
        if($search){
            $statement = $pdo->prepare("SELECT * FROM gce_al WHERE Name LIKE :name");
            $statement->bindValue(':name', "%$search%");
        } else {
            $statement = $pdo->prepare("SELECT * FROM gce_al LIMIT $pages_results, $items_per_page");
        }
   } else if($type === 'cot'){
        $h = 'COT Buea Past Papers';
        $p = 'You can download COT Buea past papers here for free.';
        $paper_image = '../images/uob_image.jpg';
        $paper_url = '../papers/cot/';
        if($search){
            $statement = $pdo->prepare("SELECT * FROM `cot` WHERE Name LIKE :name");
            $statement->bindValue(':name', "%$search%");
        } else {
            $statement = $pdo->prepare("SELECT * FROM `cot` LIMIT $pages_results, $items_per_page");
        }
   } else if($type === 'fet'){
        $h = 'FET Buea Past Papers';
        $p = 'You can download FET Buea past papers here for free.';
        $paper_image = '../images/uob_image.jpg';
        $paper_url = '../papers/fet/';
        if($search){
            $statement = $pdo->prepare("SELECT * FROM fet WHERE Name LIKE :name");
            $statement->bindValue(':name', "%$search%");
        } else {
            $statement = $pdo->prepare("SELECT * FROM fet LIMIT $pages_results, $items_per_page");
        }
   } else if($type === 'ub'){
        $h = 'University of Buea Past Exam Papers';
        $p = 'You can download university of Buea past exam papers here for free.';
        $paper_image = '../images/uob_image.jpg';
        $paper_url = '../papers/ub_past_papers/';
        if($search){
            $statement = $pdo->prepare("SELECT * FROM ub_past_papers WHERE Name LIKE :name");
            $statement->bindValue(':name', "%$search%");
        } else {
            $statement = $pdo->prepare("SELECT * FROM ub_past_papers LIMIT $pages_results, $items_per_page");
        }
    }

    $statement->execute();
    $papers = $statement->fetchAll(PDO::FETCH_ASSOC);
    

    $nav_tabs = [
        [
            'Name' => 'GCE A/L',
            'url' => 'past_papers.php?type=gce_al&page=1',
            'type' => 'gce_al'
        ],
        [
            'Name' => 'COT Buea',
            'url' => 'past_papers.php?type=cot&page=1',
            'type' => 'cot'
        ],
        [
            'Name' => 'FET Buea',
            'url' => 'past_papers.php?type=fet&page=1',
            'type' => 'fet'
        ],
        [
            'Name' => 'UB Past Exam Papers',
            'url' => 'past_papers.php?type=ub&page=1',
            'type' => 'ub'
        ]
    ];

     


 
?>

 <?php require_once "htmlHeadForContents.php"; ?>

  <body class="body">
      <?php require_once 'navbarForContents.php';?>
      <?php require_once '../needs/jumbotron_content.php';?>
      <style>
          @media(max-width: 300px){
            .yooo{
                font-size: 14px;
                font-weight: bolder;
            }
          }
          .nav-tabs a, .pagination a, .pagination a:hover, .nav-tabs a:hover{
              color: black;
              font-weight: bold;
              text-decoration: none;
          }
      </style>
  
  <div class="container">
      <div class="row">
          <div class="col-xs-12">
            <ul class="nav nav-tabs nav-justified">
                <?php foreach ($nav_tabs as $tab):
                      $navClass = ($type == $tab['type']) ? 'active': '';
                ?>
                    <li class="<?=$navClass?>"><a href="<?=$tab['url']?>"><?=$tab['Name']?></a></li>
                <?php endforeach ?>
            </ul>
          </div>
      </div>
     <h4 class="text-center bold text-uppercase yooo" style="margin-top:50px"><?=$h?></h4>
     <div class="alert alert-info text-center"><?=$p?></div>

     <!-- search bar -->

     <div class="row">
         <div class="col-sm-8 col-sm-offset-2">
            <form action="" method="get">
                <div class="form-group">
                    <div class="input-group input-group-lg">
                        <input type="hidden" name="type" value="<?=$type?>">
                        <input type="text" name="search" value="<?php echo $search ?>" placeholder="Search for Papers" class="form-control">
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

    <hr>
     
     <!-- GCE papers -->
     
     <?php foreach($papers as $paper): 
           $paper_name = (strlen($paper['Name']) > 28) ? substr($paper['Name'], 0, 28).'...' : $paper['Name'];
     ?>
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
                <h5 class="text-center bold"><?php echo $paper_name; ?></h5>
                <img src="<?=$paper_image?>" class="img-responsive">
                <div class="text-center">                        
                    <a class="btn btn-dark" href="<?=$paper_url.$paper['url']?>" download="<?=$paper['Name'].'.pdf'?>">
                        <i class="fas fa-download"></i> Download
                    </a>
                </div>
            </div>
        </div>
     <?php endforeach ?>

     <!-- Pagination -->
     <?php if(!$search): ?>
        <div class="text-center row">
            <div class="col-xs-12">
                <ul class="pagination pagination-lg">
                    <li class="<?= $prevClass ?>"><a href="past_papers.php?type=<?=$type?>&page=<?= $prev ?>">&laquo; prev</a></li>
                        <?php for($i = 1; $i <= $number_of_pages; $i++): 
                            $class = (strval($i) === $page) ? 'active' : ''; 
                        ?>
                            <li class="<?= $class ?>"><a href="past_papers.php?type=<?=$type?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>
                        <?php endfor ?>
                    <li class="<?= $nextClass ?>"><a href="past_papers.php?type=<?=$type?>&page=<?= $next ?>">next &raquo;</a></li>
                </ul>
            </div>
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

















