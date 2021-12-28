 <style>
   @media(max-width:690px){
     .white_nde{
       color:white;
       text-decoration: none;
     }
   }
 </style>

<nav class="navbar navbar-fixed-top hidden-print bg-dark">
      <div class="container">
        <div class="navbar-brand">
           <div id="title">
             <a href="index.php">
                <img src="images/ndeL.jpg" alt="NdeTek" width="110" class="img-responsive" style="margin-top:-10px;">
            </a>
           </div>
        </div>
        <div class="navbar-header">
          <button style="border:1px solid white;" class="navbar-toggle" data-toggle="collapse" data-target=".collapse">
            <span style="color:white; background: white;" class="icon-bar"></span>
            <span style="color:white; background: white;" class="icon-bar"></span>
            <span style="color:white; background: white;" class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse">
           <ul class="nav navbar-nav navbar-right">
             <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
             <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-education"></span> 
                Education <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" style="background:#35424a;">
                <li><a style="color:white;" style="color:white;" href="contents/webDevelopmentTraining.php"><span class="fa fa-laptop"></span> Web Development Training</a></li>
                <li><a style="color:white;" href="contents/concourPreparatoryClasses.php"><span class="glyphicon glyphicon-briefcase"></span> Concour Preparatory Classes</a></li>
                <li><a style="color:white;" href="contents/past_papers.php?type=gce_al&page=1"><span class="glyphicon glyphicon-globe"></span> Past Exam Papers</a></li>
              </ul>
            </li>
              <li><a href="contents/contact.php"><span class="glyphicon glyphicon-earphone"></span> Contact</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-user"></span> 
                  My Account <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" style="background:#35424a;">
                  <li><a style="color:white;" href="contents/concour_login.php"><span class="glyphicon glyphicon-briefcase"></span> Concour Account</a></li>
                  <li><a style="color:white;" href="contents/web_login.php"><span class="fa fa-laptop"></span> Web Account</a></li>
                </ul>
              </li>
           </ul>
        </div>
      </div>
    </nav>
        <?php require_once "needs/jumbotron_content.php"; ?>
    </div>