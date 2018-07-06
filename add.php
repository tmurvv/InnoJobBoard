<?php include 'php/config/config.php'; ?>
<?php include 'php/classes/Database.php'; ?>
<?php include 'php/helpers/formatting.php'; ?>
<?php

  //Create DB Object
  $db = new Database();

  if(isset($_POST['submit'])){
    //Assign Vars
    $title = mysqli_real_escape_string($db->link, $_POST['title']);
    $description = mysqli_real_escape_string($db->link, $_POST['description']);
    $dateposted = mysqli_real_escape_string($db->link, $_POST['dateposted']);
    $newdateposted = new DateTime($dateposted);
    $category = mysqli_real_escape_string($db->link, $_POST['category']);
    $jobtype = mysqli_real_escape_string($db->link, $_POST['jobtype']);
    $location = mysqli_real_escape_string($db->link, $_POST['location']);
    
    //Simple validation
    //if($title == '' || $body == '' || $category == '' || $author == ''){
    if($title == ''){
      //Set error
      $error = 'Please fill out all required fields.';
    } else {
      $query = "INSERT INTO joblistings
                  (title, description, dateposted, category, jobtype, location)
                  VALUES('$title', '$description', '$dateposted', '$category', '$jobtype', '$location')";
      $insert_row = $db->insert($query);           
    }
    header("Location: admin.php", true, 301);
    
  }

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


    <!DOCTYPE html>

    <html lang="en">

    <?php include 'php/reusables/head.php' ?>

    <body>
    <?php include 'php/reusables/hero.php' ?>
        <div class="addJob">
            <h2>
                <a href="index.php">Job<span>Board</span></a>
            </h2>

            <h3>New Job Listing</h3>
            <form method="post" action="add.php">
                <div class="addJob__job">
                    <div class="addJob__job--title">
                        <input name="title" type="text" placeholder="Enter Job Title">
                    </div>
                    <div class="addJob__job--datePosted">
                        <input name="dateposted" type="date">
                        <p style="display:inline; font-size:12px;"> Enter Date of Job Posting or Today's Date </p>
                    </div>
                    <div class="addJob__job--description">
                        <textarea name="description" id="" cols="100" rows="10" placeholder="Enter Job Description"></textarea>
                        <script>CKEDITOR.replace( 'description' );</script>
                    </div>

                    <select name="category" class="addSearch__form--selectBoxes-item" id="">
                    <option value="Not Listed">Any Category</option>
                        <?php while($row = $categories->fetch_assoc()) : ?>                    
                            <option value="<?php echo $row['name']; ?>"><?php echo $row['category']; ?></option>
                        <?php endwhile; ?>
                    </select>
                    <select name="jobtype" class="addSearch__form--selectBoxes-item" id="">
                        <option value="Not Listed">Any Type</option>
                        <?php while($row = $jobtypes->fetch_assoc()) : ?>                       
                            <option value="<?php echo $row['name']; ?>"><?php echo $row['jobType']; ?></option>
                        <?php endwhile; ?>
                    </select>
                    <select name="location" class="addSearch__form--selectBoxes-item" id="">
                        <option value="Not Listed">Any Location</option>
                        <?php while($row = $locations->fetch_assoc()) : ?>                       
                            <option value="<?php echo $row['location']; ?>"><?php echo $row['location']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <input type="submit" name="submit" class="addSearch__form--selectBoxes-item btn btn__primary" value="Submit" />
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