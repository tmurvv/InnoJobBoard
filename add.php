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
?>
<!-- Create Selector Queries -->
<?php include 'php/reusables/selectorQueries.php'; ?>
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
                            <option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
                        <?php endwhile; ?>
                    </select>
                    <select name="jobtype" class="addSearch__form--selectBoxes-item" id="">
                        <option value="Not Listed">Any Type</option>
                        <?php while($row = $jobtypes->fetch_assoc()) : ?>                       
                            <option value="<?php echo $row['jobType']; ?>"><?php echo $row['jobType']; ?></option>
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

    <section>
        <?php include 'php/reusables/footer.php' ?>
    </section>

    </body>

    </html>