<?php include 'php/config/config.php'; ?>
<?php include 'php/classes/Database.php'; ?>
<?php include 'php/helpers/controllers.php'; ?>
<?php include 'php/helpers/formatting.php'; ?>
<?php
  //Retrieve id for jobListing
  $id = $_GET['id'];

  //Create DB Object
  $db = new Database();
  $categorySearchID = $_GET['category'];
  if(!$categorySearchID){
      $categorySearchID = "empty";
  }
  $jobtypeSearchID = $_GET['jobtype'];
  if (!$jobtypeSearchID){
      $jobtypeSearchID = "empty";
  }
  $locationSearchID = $_GET['location'];
  if (!$locationSearchID){
      $locationSearchID = "empty";
  }

  //Create Query
  if ($id) {
    $query = "SELECT * FROM joblistings WHERE id=".$id;
  }else{
  $query = createQuery($categorySearchID, $jobtypeSearchID, $locationSearchID);
  }
  
  //Run Query
  $listings = $db->select($query);

//Create Query
$query = "SELECT * FROM categories";
//Run Query
$categories = $db->select($query);

//Create Job Type Query 
$query = "SELECT * FROM jobtypes"; 
//Run Query 
$jobtypes = $db->select($query); 

//Create Location Query 
$query = "SELECT * FROM locations"; 
//Run Query 
$locations = $db->select($query);
?>

    <!DOCTYPE html>

    <html lang="en">

   <?php include 'php/reusables/head.php' ?>

    <body>
    <?php include 'php/reusables/hero.php' ?>

        <div class="search">
            <div class="search__form">
                <div class="search__form--title">
                    <h2>Search</h2>
                </div>
                <div class="search__form--selectBoxes">
                    <form action="index.php?this.options[this.selectedIndex].value" id="main" name="main" method="get">
                        <?php include 'php/reusables/selectors.php' ?>
                    </form>
                </div>
            </div>
            <div class="mainBoard" id="jobs">
                <h1>
                Job<span>Board</span>
                </h1>
                <div class="listings">
                    <?php if($listings) : ?>
                    <?php while($row = $listings->fetch_assoc()) : ?>
                    <div class="listings__job">
                        <div class="listings__job--type">
                            <p class="btn btn__secondary">
                                <?php echo $row['jobtype'] ?>
                            </p>
                        </div>
                        <div class="listings__job--info">
                            <div class="listings__job--info-line1">
                                <h3>
                                    <?php echo $row['title'] ?>
                                    <?php echo $row['location'] ?>
                                </h3>
                            </div>
                            <div class="listings__job--info-line2">


                                <?php echo $row['category'] ?>

                                <div class="listings__job--info-line2-datePosted">
                                    <?php echo $row['dateposted'] ?>
                                </div>
                            </div>
                            <br>
                            <div class="listings__job--info-description">
                                <?php echo $row['description'] ?>
                            </div>
                        </div>
                    </div>
                    <br>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- FOOTER -->

        <footer class="footer">
            <div class="footer__topRow">
                <ul class="footer__topRow--menu">
                    <li>
                        <a href="#top">Home</a>
                    </li>
                    <li>
                        <a href="#jobs">Job Listings</a>
                    </li>
                    <li>
                        <a href="#search">Search</a>
                    </li>
                    <li>
                        <a href="#about">About</a>
                    </li>
                </ul>


                <ul class="footer__topRow--contact">
                    <li>
                        <a href="http://www.linkedin.com/in/tisha-murvihill-tech" target="_blank">
                            <img src="../img/linkedIn.jpg" alt="linkedIn icon" class="footer__contact--linkedImage">
                        </a>
                    </li>
                    <li>
                        <a href="http://www.take2tech.ca" target="_blank">www.take2tech.ca</a>
                    </li>
                </ul>
            </div>

            <p class="footer__copy">&copy; 2018 by take2tech.ca. All rights reserved.</p>

        </footer>

    </body>

    </html>