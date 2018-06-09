<?php include 'php/config/config.php'; ?>
<?php include 'php/classes/Database.php'; ?>
<?php include 'php/helpers/formatting.php'; ?>
<?php

  //Create DB Object
  $db = new Database();

  //Create Query
  $query = "SELECT * FROM joblistings LIMIT 1";
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
        <div class="addJob">
            <h1>Job
                <span>Board</span>
            </h1>

            <h3>New Job Listing</h3>
            <form method="post" action="admin.php"></form>
            <div class="addJob__job">
                <div class="addJob__job--title">
                    
                <input name="title" type="text" placeholder="Enter Job Title">
                    
                </div>
                <div class="addJob__job--datePosted">
                    <input name="dateposted" type="date"><p style="display:inline; font-size:12px;">   Enter Date Of Job Posting or Today's Date </p>
                </div>
                <div class="addJob__job--description">
                    <!-- <input name="description" type="textarea" placeholder="Enter Job Description"> -->
                    <textarea name="description" id="" cols="100" rows="10" placeholder="Enter Job Description"></textarea>
                </div>

                <select name="category" class="addSearch__form--selectBoxes-item" id="">
                    <option value="anyCategory">Any Category</option>
                    <option value="SharePoint">SharePoint</option>
                    <option value="webDevelopment">Web Development</option>
                    <option value="bigData">Big Data Science/Architecture</option>
                    <option value="Cloud">Cloud Security/Architecture</option>
                </select>
                <select name="type" class="addSearch__form--selectBoxes-item" id="">
                    <option value="anyType">Any Type</option>
                    <option value="full-time">Full-time</option>
                    <option value="part-time">Part-time</option>
                    <option value="contract">Contract</option>
                </select>
                <select name="location" class="addSearch__form--selectBoxes-item" id="">
                    <option value="anyLocation">Any Location</option>
                    <option value="calgary">Calgary, AB</option>
                    <option value="edmonton">Edmonton, AB</option>
                    <option value="toronto">Toronto, ON</option>
                    <option value="vancounver">Vancouver, BC</option>
                    <option value="usa">USA</option>
                </select>

                </div>
                <button type="submit" name="submit" class="addSearch__form--selectBoxes-item">Submit</button>
            
        </div>

        <!-- FOOTER -->

        <footer class="footer">
            <div class="footer__topRow">
                <ul class="footer__topRow--menu">
                    <li>
                        <a href="#top">Home</a>
                    </li>
                    <li>
                        <a href="#jobs">Jobs</a>
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