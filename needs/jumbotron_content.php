
<?php
   

   if($_SESSION['loadIndexImage']){
      $loadImagePath = 'images/y.jpg';
      $webClassesUrl = 'contents/webDevelopmentTraining.php';
      $concourClassUrl = 'contents/concourPreparatoryClasses.php';
      $gceUrl = 'contents/past_papers.php';
      $graphicUrl = 'contents/graphic_template.php?page=1';
      $webUrl = 'contents/web_template.php?page=1';
      $contact_us = 'contents/contact.php';
   } else {
      $loadImagePath = '../images/y.jpg';
      $webClassesUrl = 'webDevelopmentTraining.php';
      $concourClassUrl = 'concourPreparatoryClasses.php';
      $gceUrl = 'past_papers.php';
      $graphicUrl = 'graphic_template.php?page=1';
      $webUrl = 'web_template.php?page=1';
      $contact_us = 'contact.php';
   }
?>




 <style>
    .jumbotron{
       background: url(<?php echo $loadImagePath ?>);
       background-repeat: no-repeat;
       background-position: center;
       background-size: cover;
       color: white;
       align-items: center;
       text-align: center;
       height: 300px;
    }
    @media(max-width: 692px){
       .jumbotron{
          height: 250px;
       }
    }
    @media(max-width: 320px){
       .jumbotron h3{
          font-size: 21px;
       }
       .jumbotron button{
          font-size: 10px;
       }
    }
    @media(max-width: 300px){
      .jumbotron{
          height: 200px;
       }
       .jumbotron h2{
          font-size: 23px;
       }
       .jumbotron p{
          font-size: 15px;
       }
       .jumbotron button{
          font-size: 10px;
       }
    }
 </style>     

<div class="jumbotron">
   <div class="container">
      <h3 id="uni" class="text-uppercase"><strong>Welcome to NdeTek</strong></h3>
      <p>The Heart of Technology</p>
      <button class="dropdown btn btn-dark">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="text-decoration:none;color:white;"><span class="glyphicon glyphicon-education"></span> 
            Education <span class="caret"></span>
         </a>
         <ul class="dropdown-menu">
            <li class=""><a href="<?php echo $webClassesUrl ?>"><span class="fa fa-laptop"></span> Web Development Training</a></li>
            <li><a href="<?php echo $concourClassUrl ?>"><span class="glyphicon glyphicon-briefcase"></span> Concour Preparatory Classes</a></li>
            <li><a href="<?php echo $gceUrl ?>?page=1"><span class="glyphicon glyphicon-globe"></span> Past Exam Papers</a></li>
         </ul>
      </button>
      <button class="dropdown btn btn-dark">
         <!-- <a href="#" class="dropdown-toggle" style="text-decoration:none;color:white;" data-toggle="dropdown"><span class="glyphicon glyphicon-blackboard"></span> 
            Templates <span class="caret"></span>
         </a>
         <ul class="dropdown-menu">
            <li class=""><a href="<?= $graphicUrl ?>"><span class="fa fa-desktop"></span> Graphics Design</a></li>
            <li><a href="<?= $webUrl ?>"><span class="fa fa-laptop"></span> Web Design</a></li>
         </ul> -->
         <a href="<?=$contact_us?>"><i class="glyphicon glyphicon-earphone"></i> Contact Us</a>
      </button>
   </div>
</div>
           


