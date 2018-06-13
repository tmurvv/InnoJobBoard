<?php include 'php/config/config.php'; ?>
<?php include 'php/classes/Database.php'; ?>
<?php include 'php/helpers/formatting.php'; ?>
<?php
  //Retrieve id for jobListing
  $id = $_GET['id'];

  //Create DB Object
  $db = new Database();

  //Create Query
  $query = "SELECT * FROM joblistings WHERE id=".$id;
  //Run Query
  $posts = $db->select($query);

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
                <a href="index.php">Jobs</a>
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
                Job<span>Board</span>
            </h2>
        </div>
    </div>

    <div class="search">
        <div class="search__form">
            <div class="search__form--title">
                <h2>Search</h2>
            </div>
            <div class="search__form--selectBoxes">
                <?php include "php/reusables/selectors.php" ?>
                <button type="submit" name="submit" class="search__form--selectBoxes-item">Submit</button>
            </div>
        </div>
        <div class="mainBoard" id="jobs">
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
                            <h3><?php echo $row['title'] ?> <?php echo $row['location'] ?></h3>
                        </div>
                        <div class="listings__job--info-datePosted">
                        <?php echo formatDate($row['dateposted']) ?>
                        </div>
                        <br>
                        <div class="listings__job--info-description">
                        <?php echo $row['description'] ?>
                           
                        </div>
                    </div>
                </div>
                <br>
                <?php endwhile; ?>                
 
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

<!-- 
                <div class="search__form--skills">
                    <input type="checkbox" id="html" name="skill" value="html">
                    <label for="html" class="search__form--skills-label">Html</label>

                    <input type="checkbox" id="css" name="skill" value="css">
                    <label for="css" class="search__form--skills-label">CSS</label>

                    <input type="checkbox" id="javascript" name="skill">
                    <label for="javascript" class="search__form--skills-label" value="javascript">JavaScript</label>

                    <input type="checkbox" id="cSharp" name="skill">
                    <label for="cSharp" class="search__form--skills-label" value="cSharp">C#</label>

                    <input type="checkbox" id="powershell" name="skill">
                    <label for="powershell" class="search__form--skills-label" value="powershell">PowerShell</label>

                    <input type="checkbox" id="php" name="skill" value="php">
                    <label for="php" class="search__form--skills-label">PHP</label>

                    <input type="checkbox" id="Java" name="skill" value="Java">
                    <label for="Java" class="search__form--skills-label">Java</label>

                    <input type="checkbox" id="python" name="skill">
                    <label for="python" class="search__form--skills-label" value="python">Python</label>

                    <input type="checkbox" id="C++" name="skill">
                    <label for="C++" class="search__form--skills-label" value="C++">C++</label>

                    <input type="checkbox" id="Ruby" name="skill">
                    <label for="Ruby" class="search__form--skills-label" value="Ruby">Ruby</label>

                    <input type="checkbox" id="agile" name="skill" value="agile">
                    <label for="agile" class="search__form--skills-label">Agile</label>

                    <input type="checkbox" id="css" name="skill" value="css">
                    <label for="css" class="search__form--skills-label">CSS</label>

                    <input type="checkbox" id="javascript" name="skill">
                    <label for="javascript" class="search__form--skills-label" value="javascript">JavaScript</label>

                    <input type="checkbox" id="cSharp" name="skill">
                    <label for="cSharp" class="search__form--skills-label" value="cSharp">C#</label>

                    <input type="checkbox" id="powershell" name="skill">
                    <label for="powershell" class="search__form--skills-label" value="powershell">PowerShell</label>


                </div>

            </div>
        </div>
    </div> -->