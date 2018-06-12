<?php include 'php/config/config.php'; ?>
<?php include 'php/classes/Database.php'; ?>
<?php include 'php/helpers/formatting.php'; ?>
<?php
    //Retrieve id for job editting
    //$id = $_GET['id'];

    //Create DB Object
    $db = new Database();

    //Create Category Query 
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
    <?php 
 if(isset($_POST['addCat'])){
    //Assign Vars   
    $category = mysqli_real_escape_string($db->link, $_POST['category']);
    
    ob_start();
    //Simple validation
    
      $query = "INSERT INTO categories (name) VALUES '$category'";      
      $insert = $db->insert($query);
    }
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
                <h2 class="hero__mainTitle--subHeading">Job
                    <span>Board</span>
                </h2>
            </div>
        </div>

        <h2 addJob__mainHeading>
            <a href="index.php">Job
                <span>Board</span>
            </a>
            <?php echo $update['dateposted']; ?>
        </h2>

        <h3>Add/Edit/Delete Selectors</h3>
        <br>
        <!-- <form method="post" action="addeditselectors.php?item=cat -->
        <div class="updateSelectors">
            <div class="updateSelectors__selector">
                <h4>Categories</h4>
                <form method="post" action="addeditselectors.php">
                <input type="text" name="category" placeholder="Add Category" class="btn" />
                <button type="submit" name="addCat">Add</button>
</form>
                <!-- research onchange popup -->
                <table name="category" id="">
                    <?php while($row = $categories->fetch_assoc()) : ?>
                    <tr class="updateSelectors__selector--item">
                        <td>
                            <input value="<?php echo $row['name']; ?>" />
                        </td>
                        <td>
                            <button type="submit" name="submitCategory">Submit</button>
                        </td>
                        <td>
                            <button type="submit" name="deleteCategory">Delete</button>
                        </td>
                        <tr>
                            <?php endwhile; ?>
                </table>
            </div>
            <div class="updateSelectors__selector">
                <h4>Job Types</h4>
                
                <input type="text" placeholder="Add Job Type" class="btn" />
                <button type="submit" name="submitJobtype">Submit</button>

                <table name="jobtype" id="">
                    <?php while($row = $jobtypes->fetch_assoc()) : ?>
                    <tr class="updateSelectors__selector--item">
                        <td>
                            <input value="<?php echo $row['name']; ?>" />
                        </td>
                        <td>
                            <button type="submit" name="submitCategory">Submit</button>
                        </td>
                        <td>
                            <button type="submit" name="deleteCategory">Delete</button>
                        </td>
                        <tr>
                            <?php endwhile; ?>
                </table>

            </div>
            <div class="updateSelectors__selector">
                <h4>Locations</h4>
                <input type="text" placeholder="Add Location" class="btn" />
                <button type="submit" name="submitLocation">Submit</button>
                <table name="location" id="">
                    <?php while($row = $locations->fetch_assoc()) : ?>
                    <tr class="updateSelectors__selector--item">
                        <td>
                            <input value="<?php echo $row['location']; ?>" />
                        </td>
                        <td>
                            <button type="submit" name="submitCategory">Submit</button>
                        </td>
                        <td>
                            <button type="submit" name="deleteCategory">Delete</button>
                        </td>
                        <tr>
                            <?php endwhile; ?>
                </table>

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