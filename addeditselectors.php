<?php include 'php/config/config.php'; ?>
<?php include 'php/classes/Database.php'; ?>
<?php include 'php/helpers/formatting.php'; ?>
<?php
    //Retrieve id for edit/delete
    $id = $_GET['id'];

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
    if(isset($_POST['addcat'])){
        //Assign Vars   
        $category = mysqli_real_escape_string($db->link, $_POST['category']);
        
        //Simple validation
        
        $query = "INSERT INTO categories (name) VALUES('$category')";      
        $insert = $db->insert($query);
    }
    if(isset($_POST['editcat'])){
        //Assign Vars   
        $category = mysqli_real_escape_string($db->link, $_POST['category']);
        
        //Simple validation
        
        $query = "UPDATE categories SET name = '$category' WHERE id=".$id;      
        $update = $db->update($query);
    }
    if(isset($_POST['deletecat'])){
        
        $query = "DELETE FROM categories WHERE id=".$id;      
        $delete = $db->delete($query);
    }

    if(isset($_POST['addjobtype'])){
        //Assign Vars   
        $jobtype = mysqli_real_escape_string($db->link, $_POST['jobtype']);
        
        //Simple validation
        
        $query = "INSERT INTO jobtypes (name) VALUES('$jobtype')";      
        $insert = $db->insert($query);
    }
    if(isset($_POST['editjobtype'])){
        //Assign Vars   
        $jobtype = mysqli_real_escape_string($db->link, $_POST['jobtype']);
        
        //Simple validation
        
        $query = "UPDATE jobtypes SET name = '$jobtype' WHERE id=".$id;      
        $update = $db->update($query);
    }
    if(isset($_POST['deletejobtype'])){
        
        $query = "DELETE FROM jobtypes WHERE id=".$id;      
        $delete = $db->delete($query);
    }
    if(isset($_POST['addlocation'])){
        //Assign Vars   
        $location = mysqli_real_escape_string($db->link, $_POST['location']);
        
        //Simple validation
        
        $query = "INSERT INTO locations (location) VALUES('$location')";      
        $insert = $db->insert($query);
    }
    if(isset($_POST['editlocation'])){
        //Assign Vars   
        $location = mysqli_real_escape_string($db->link, $_POST['location']);
        
        //Simple validation
        
        $query = "UPDATE locations SET location = '$location' WHERE id=".$id;      
        $update = $db->update($query);
    }
    if(isset($_POST['deletelocation'])){
        
        $query = "DELETE FROM locations WHERE id=".$id;      
        $delete = $db->delete($query);
    }
?>
    <!DOCTYPE html>

    <html lang="en">

    <?php include 'php/reusables/head.php' ?>

    <body>
    <?php include 'php/reusables/hero.php' ?>

        <h2 class="addJob__mainHeading">
            Job<span>Board</span>
        </h2>

        <h3>Add/Edit/Delete Selectors</h3>
        <br>
        
        <div class="updateSelectors">
            <div class="updateSelectors__selector">
                <h4>Categories</h4>
                <form method="post" action="addeditselectors.php">
                    <input type="text" name="category" placeholder="Add Category" class="btn" />
                    <button type="submit" name="addcat">Add</button>
                </form>

                <table name="category" id="">
                    
                        <?php while($row = $categories->fetch_assoc()) : ?>
                        <form method="post" action="addeditselectors.php?id=<?php echo $row['id'] ?>">
                        <tr class="updateSelectors__selector--item">
                            <td>
                                <input name="category" value="<?php echo $row['name']; ?>" />
                            </td>
                            <td>
                                <button type="submit" name="editcat">Change</button>
                            </td>
                            <td>
                                <button type="submit" name="deletecat">Delete</button>
                            </td>
                            <tr>
                            </form>
                            <?php endwhile; ?>
                    
                </table>
            </div>
            <div class="updateSelectors__selector">
                <h4>Job Types</h4>

                <form method="post" action="addeditselectors.php">
                    <input type="text" name="jobtype" placeholder="Add Job Type" class="btn" />
                    <button type="submit" name="addjobtype">Add</button>
                </form>
                <table name="jobtypes" id="">
                    
                        <?php while($row = $jobtypes->fetch_assoc()) : ?>
                        <form method="post" action="addeditselectors.php?id=<?php echo $row['id'] ?>">
                        <tr class="updateSelectors__selector--item">
                            <td>
                                <input name="jobtype" value="<?php echo $row['name']; ?>" />
                            </td>
                            <td>
                                <button type="submit" name="editjobtype">Change</button>
                            </td>
                            <td>
                                <button type="submit" name="deletejobtype">Delete</button>
                            </td>
                            <tr>
                            </form>
                            <?php endwhile; ?>
                    
                </table>

            </div>
            <div class="updateSelectors__selector">
                <h4>Locations</h4>

                <form method="post" action="addeditselectors.php">
                    <input type="text" name="location" placeholder="Add Location" class="btn" />
                    <button type="submit" name="addlocation">Add</button>
                </form>

                <table name="locations" id="">
                    
                    <?php while($row = $locations->fetch_assoc()) : ?>
                    <form method="post" action="addeditselectors.php?id=<?php echo $row['id'] ?>">
                    <tr class="updateSelectors__selector--item">
                        <td>
                            <input name="location" value="<?php echo $row['location']; ?>" />
                        </td>
                        <td>
                            <button type="submit" name="editlocation">Change</button>
                        </td>
                        <td>
                            <button type="submit" name="deletelocation">Delete</button>
                        </td>
                        <tr>
                        </form>
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