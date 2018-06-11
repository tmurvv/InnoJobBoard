<?php include 'php/config/config.php'; ?>
<?php include 'php/classes/Database.php'; ?>
<?php include 'php/helpers/formatting.php'; ?>
<?php
    //Get message
    $msg = $_GET['msg'];
    $msg = completeMsg($msg);

  //Create DB Object
  $db = new Database();

  //Create Query
  $query = "SELECT * FROM joblistings";
  //Run Query
  $posts = $db->select($query);

//   //Create Query
//   $query = "SELECT * FROM categories";
//   //Run Query
//   $categories = $db->select($query);
?>

    <!DOCTYPE html>

    <html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400" rel="stylesheet">
        <link rel="stylesheet" href="css/ionicons.css">
        <link rel="shortcut icon" href="img/favicon.png">
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <script type="text/javascript" src="js\script.js"></script>

        <title>InnoTech JobBoard</title>

    </head>

    <body>
        <div class="hero" id='home'>
            <img class="hero__logo" src="img/Innotech.png" alt="InnoTech Logo">
            <ul class="hero__mainNav">
                <li class="hero__mainNav--item">
                    <a href="index.php">Home</a>
                </li>
                <li class="hero__mainNav--item">
                    <a href="#jobs">Jobs</a>
                </li>
                <li class="hero__mainNav--item">
                    <a href="admin.php">Admin</a>
                </li>
                <li class="hero__mainNav--item">
                    <a href="#about">About</a>
                </li>
                <li class="hero__mainNav--item">
                    <a href="#contact">Contact</a>
                </li>
            </ul>
            <div class="hero__mainTitle">

                <h1 class="hero__mainTitle--mainHeading">
                    InnoTech Alumni Association
                </h1>
                <h2 class="hero__mainTitle--subHeading">
                    <a href="index.php">Job
                        <span>Board</span>
                    </a>
                </h2>
            </div>
        </div>


        <div class="addNav">
            <ul class="addNav__container">
                <li class="addNav__container--item">
                    <a href="#add.php">Add Job Listing</a>
                </li>
                <li class="addNav__container--item">
                    <a href="#">Add Category</a>
                </li>
                <li class="addNav__container--item">
                    <a href="#">Add Job Type</a>
                </li>
                <li class="addNav__container--item">
                    <a href="#">Add Location</a>
                </li>
            </ul>
        </div>
        <div class="mainBoard" id="jobs">
            <?php 
            if ($msg) {
                echo "<div class='admin__messageBox'>".$msg."</div>";
            } ?>
        <h1>Job<span>Board</span> </h1>
        <br>
        <div class="listings">

            <?php while($row = $posts->fetch_assoc()) : ?>
            <div class="listings__job">

                <div class="listings__job--type">

                    <p>
                        <?php echo $row['jobtype'] ?>
                    </p>
                </div>
                <div class="listings__job--info">
                    <div class="listings__job--info-title">
                        <h3>
                            <?php echo $row['title'] ?>
                            <?php echo $row['location'] ?>
                        </h3>
                    </div>
                    <div class="listings__job--info-datePosted">
                        <?php echo $row['dateposted'] ?>
                    </div>
                    <div class="admin__editDelete">
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="admin__editDelete--edit">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="admin__editDelete--delete">Delete</a>
                    </div>
                    <br>
                    <div class="listings__job--info-description">
                        <?php echo concatText($row['description']) ?>
                        <a href="views/joblisting.php?id=<?php echo urlencode($row['id']); ?>" class="listings__job--info-readMore">Read More</a>
                    </div>
                </div>
            </div>

            <br>
            <?php endwhile; ?>

        </div>
        </div>
        </div>

        <!-- ABOUT -->

        <section class="about" id="about">
            <div class="about__container">
                <h2>About this website</h2>
                <p>This Job
                    <span>Board</span> was created by
                    <a href="https://www.linkedin.com/in/tisha-murvihill-tech" target="_blank">Tisha Murvihill</a>, a graduate of
                    <a href="https://www.innotechcollege.com" target="_blank">InnoTech College</a> in Calgary, Alberta, Canada. The layout is done in HTML5, CSS, and JavaScript. This
                    site keeps things sleek, simple, and fast by using only PHP and SQL for content management (no WordPress
                    et al.). Tisha can be reached at
                    <a href="http://www.take2tech.ca" target="_blank">tech@take2tech.ca</a>.</p>
                <br>
            </div>
        </section>

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
                            <img src="img/linkedIn.jpg" alt="linkedIn icon" class="footer__contact--linkedImage">
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