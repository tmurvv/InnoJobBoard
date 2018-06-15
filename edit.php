<?php include 'php/config/config.php'; ?>
<?php include 'php/classes/Database.php'; ?>
<?php include 'php/helpers/formatting.php'; ?>
<?php
    //Retrieve id for job editting
    $id = $_GET['id'];

    //Create DB Object
    $db = new Database();

    //Create Query
  $query = "SELECT * FROM joblistings WHERE id = ".$id;
  //Run Query
  $update = $db->select($query)->fetch_assoc();

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
 if(isset($_POST['submit'])){
    //Assign Vars
    $title = mysqli_real_escape_string($db->link, $_POST['title']);
    $description = mysqli_real_escape_string($db->link, $_POST['description']);
    $dateposted = mysqli_real_escape_string($db->link, $_POST['dateposted']);
    $category = mysqli_real_escape_string($db->link, $_POST['category']);
    $jobtype = mysqli_real_escape_string($db->link, $_POST['jobtype']);
    $location = mysqli_real_escape_string($db->link, $_POST['location']);
    
    ob_start();
    //Simple validation
    //if($title == '' || $body == '' || $category == '' || $author == ''){
    if($title == ''){
      //Set error
      $error = 'Please fill out all required fields.';
    } else {
      $query = "UPDATE joblistings
                  SET
                  title = '$title',
                  description = '$description',
                  dateposted = '$dateposted',
                  category = '$category',
                  jobtype = '$jobtype',
                  location = '$location'
                  WHERE id=".$id;
        
      $update = $db->insert($query);
    }
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
                <h2 class="hero__mainTitle--subHeading">Job <span>Board</span> </h2>
            </div>
        </div>
        <div class="addJob">
            <h2 addJob__mainHeading>
                <a href="index.php">Job
                    <span>Board</span>
                </a>
                <?php echo $update['dateposted']; ?>
            </h2>

            <h3>Edit Job Listing</h3>
            <form method="post" action="edit.php?id=<?php echo $id; ?>">
                <div class="addJob__job">
                    <div class="addJob__job--title">
                        <input name="title" type="text" placeholder="Enter Job Title" value="<?php echo $update['title']; ?>">
                    </div>
                    <div class="addJob__job--datePosted">
                        <input name="dateposted" type="date" value="<?php echo $update['dateposted']; ?>">
                        <p style="display:inline; font-size:12px;"> Enter Date of Job Posting or Today's Date </p>
                    </div>
                    <div class="addJob__job--description">
                        <textarea name="description" id="" cols="100" rows="10" placeholder="Enter Job Description">
                            <?php echo $update['description']; ?>
                        </textarea>
                    </div>

                    <select name="category" class="addSearch__form--selectBoxes-item" id="">
                        
                        <?php while($row = $categories->fetch_assoc()) : ?>
                        <?php if ($update['category'] === $row['name']) {
                            $selected = 'selected';
                        }else{
                            $selected = "";
                        }
                        ?>
                        <option value="<?php echo $row['name']; ?>" <?php echo $selected; ?>>
                            <?php echo $row['name']; ?>
                        </option>
                        <?php endwhile; ?>
                        
                    </select>
                    <select name="jobtype" class="addSearch__form--selectBoxes-item" id="">
                        <?php while($row = $jobtypes->fetch_assoc()) : ?>
                            <?php if ($update['jobtype'] === $row['name']) {
                                $selected = 'selected';
                            }else{
                                $selected = "";
                            }
                            ?>
                            <option value="<?php echo $row['name']; ?>" <?php echo $selected; ?>>
                                <?php echo $row['name']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                    <select name="location" class="addSearch__form--selectBoxes-item" id="">
                        <?php while($row = $locations->fetch_assoc()) : ?>
                            <?php if ($update['location'] === $row['location']) {
                                $selected = 'selected';
                            }else{
                                $selected = "";
                            }
                            ?>
                            <option value="<?php echo $row['location']; ?>" <?php echo $selected; ?>>
                                <?php echo $row['location']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <input type="submit" name="submit" class="addSearch__form--selectBoxes-item" value="Submit" />
                <a href="index.php" class="btn btn-default">Cancel</a>
            </form>
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