<?php include 'php/config/config.php'; ?>
<?php include 'php/classes/Database.php'; ?>
<?php include 'php/helpers/formatting.php'; ?>
<?php

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
                <a href="#home">Home</a>
            </li>
            <li class="hero__mainNav--item">
                <a href="#jobs">Jobs</a>
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
                Job
                <span>Board</span>
            </h2>
        </div>
    </div>

    <div class="search">
        <div class="search__form">
            <div class="search__form--title">
                <h2>Search</h2>
            </div>
            <div class="search__form--selectBoxes">
                <select name="category" class="search__form--selectBoxes-item" id="">
                    <option value="anyCategory">Any Category</option>
                    <option value="SharePoint">SharePoint</option>
                    <option value="webDevelopment">Web Development</option>
                    <option value="bigData">Big Data Science/Architecture</option>
                    <option value="Cloud">Cloud Security/Architecture</option>
                </select>
                <select name="type" class="search__form--selectBoxes-item" id="">
                    <option value="anyType">Any Type</option>
                    <option value="full-time">Full-time</option>
                    <option value="part-time">Part-time</option>
                    <option value="contract">Contract</option>
                </select>
                <select name="location" class="search__form--selectBoxes-item" id="">
                    <option value="anyType">Any Location</option>
                    <option value="full-time">Calgary</option>
                    <option value="part-time">Edmonton</option>
                    <option value="contract">Toronto</option>
                    <option value="contract">Vancouver</option>
                    <option value="contract">USA</option>
                </select>
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
                        <?php echo concatText($row['description']) ?>
                            <a href="views/joblisting.php" class="listings__job--info-readMore">Read More</a>
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