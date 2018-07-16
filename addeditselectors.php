<?php include 'php/config/config.php'; ?>
<?php include 'php/classes/Database.php'; ?>
<?php include 'php/helpers/formatting.php'; ?>
<?php
    //Retrieve id for edit/delete
    $id = $_GET['id'];

    //Create DB Object
    $db = new Database();

    //Create Category Query 
    $query = "SELECT * FROM categories ORDER BY categoryViewOrder"; 
    //Run Query 
    $categories = $db->select($query);
    
    //Create Job Type Query 
    $query = "SELECT * FROM jobtypes ORDER BY jobTypeViewOrder"; 
    //Run Query 
    $jobtypes = $db->select($query); 

    //Create Location Query 
    $query = "SELECT * FROM locations ORDER BY locationViewOrder"; 
    //Run Query 
    $locations = $db->select($query); 
?>
<?php 
    if(isset($_POST['addcat'])){
        //Assign Vars   
        $category = mysqli_real_escape_string($db->link, $_POST['category']);
        $categoryViewOrder = mysqli_real_escape_string($db->link, $_POST['categoryvieworder']);
        
        //Simple validation
        
        $query = "INSERT INTO categories (category, categoryViewOrder) VALUES('$category', '$categoryViewOrder')";      
        $insert = $db->insert($query);
    }
    if(isset($_POST['editcat'])){
        //Assign Vars   
        $category = mysqli_real_escape_string($db->link, $_POST['category']);
        $categoryViewOrder = mysqli_real_escape_string($db->link, $_POST['categoryvieworder']);
        $oldCategory=mysqli_real_escape_string($db->link, $_POST['oldCategory']);
        
        //Simple validation
        
        $query = "UPDATE categories SET category = '$category', categoryViewOrder = '$categoryViewOrder' WHERE id=".$id;      
        $update = $db->update($query);

        //update all listings with changed category
        $query = "UPDATE joblistings SET category = '$category' WHERE category='$oldCategory'";      
        $update = $db->update($query);
    }
    if(isset($_POST['deletecat'])){
        
        $query = "DELETE FROM categories WHERE id=".$id;      
        $delete = $db->delete($query);
    }

    if(isset($_POST['addjobtype'])){
        //Assign Vars   
        $jobtype = mysqli_real_escape_string($db->link, $_POST['jobtype']);
        $jobtypevieworder = mysqli_real_escape_string($db->link, $_POST['jobtypevieworder']);
        
        //Simple validation
        
        $query = "INSERT INTO jobtypes (jobType, jobTypeViewOrder) VALUES('$jobtype', '$jobtypevieworder')";      
        $insert = $db->insert($query);
    }
    if(isset($_POST['editjobtype'])){
        //Assign Vars   
        $jobtype = mysqli_real_escape_string($db->link, $_POST['jobtype']);       
        $jobtypevieworder = mysqli_real_escape_string($db->link, $_POST['jobtypevieworder']);
        
        //Simple validation
        
        $query = "UPDATE jobtypes SET jobType = '$jobtype', jobTypeViewOrder = '$jobtypevieworder' WHERE id=".$id;      
        $update = $db->update($query);

        //update all listings with changed job type
        // $query = "UPDATE jobtypes SET jobType = '$jobtype', jobTypeViewOrder = '$jobtypevieworder' WHERE id=".$id;      
        // $update = $db->update($query);
    }
    if(isset($_POST['deletejobtype'])){
        
        $query = "DELETE FROM jobtypes WHERE id=".$id;      
        $delete = $db->delete($query);
    }
    if(isset($_POST['addlocation'])){
        //Assign Vars   
        $location = mysqli_real_escape_string($db->link, $_POST['location']);
        $locationvieworder = mysqli_real_escape_string($db->link, $_POST['locationvieworder']);
        
        //Simple validation
        
        $query = "INSERT INTO locations (location, locationViewOrder) VALUES('$location', '$locationvieworder')";      
        $insert = $db->insert($query);
    }
    if(isset($_POST['editlocation'])){
        //Assign Vars   
        $location = mysqli_real_escape_string($db->link, $_POST['location']);
        $locationvieworder = mysqli_real_escape_string($db->link, $_POST['locationvieworder']);
        
        //Simple validation
        
        $query = "UPDATE locations SET location = '$location', locationViewOrder = '$locationvieworder' WHERE id=".$id;      
        $update = $db->update($query);

        //update all listings with changed location
        // $query = "UPDATE locations SET location = '$location', locationViewOrder = '$locationvieworder' WHERE id=".$id;      
        // $update = $db->update($query);
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
    <div class="updateSelectorsHeading">
        <h2 class="addJob__mainHeading">Job<span>Board</span></h2>

        <h3>Add/Edit/Delete Selectors</h3>
    </div>
    <div class="updateSelectors">

        <div class="updateSelectors__selector">
            <h4>Categories</h4>
            <p>Order | Category</p>
            <form method="post" action="addeditselectors.php">
                <input type="text" name="categoryvieworder" placeholder="" class="btn updateSelectors__selector--item-order" />
                <input type="text" name="category" placeholder="Add Category" class="btn" />
                <button class="btn btn__primary" type="submit" name="addcat">Add</button>
            </form>

            <table name="category">

                <?php while($row = $categories->fetch_assoc()) : ?>
                <form method="post" action="addeditselectors.php?id=<?php echo $row['id'] ?>">
                    <tr class="updateSelectors__selector--item">
                        <td>
                            <input class="updateSelectors__selector--item-order" name="categoryvieworder" value="<?php echo $row['categoryViewOrder']; ?>"
                                disabled />
                            <input class="updateSelectors__selector--item-order" name="categoryvieworder" value="<?php echo $row['categoryViewOrder']; ?>"
                                hidden />
                        </td>
                        <td class="updateSelectors__selector--item-itemName">
                            <input name="category" value="<?php echo $row['category']; ?>" disabled />
                            <input name="category" id="categoryInitValue" value="<?php echo $row['category']; ?>" hidden />
                        </td>
                        <td>
                            <button class="updateSelectors__selector--item-saveEdit btn btn__primary" type="button" onclick="startEditSelector(this);"
                                name="editcat">Edit</button>
                        </td>
                        <td>
                            <button type="button" name="deletecat" class="btn btn__danger" onclick="startEditSelector(this);">Delete</button>
                        </td>
                        <input name="oldCategory" value="<?php echo $row['category']; ?>" hidden />
                    </tr>
                </form>
                <?php endwhile; ?>

            </table>
        </div>
        <hr>
        <div class="updateSelectors__selector">
            <h4>Job Types</h4>
            <p>Order | Job Type</p>
            <form method="post" action="addeditselectors.php">
                <input type="text" name="jobtypevieworder" placeholder="" class="btn updateSelectors__selector--item-order" />
                <input type="text" name="jobtype" placeholder="Add Job Type" class="btn" />
                <button class="btn btn__primary" type="submit" name="addjobtype">Add</button>
            </form>
            <table name="jobtypes" id="">

                <?php while($row = $jobtypes->fetch_assoc()) : ?>
                <form method="post" action="addeditselectors.php?id=<?php echo $row['id'] ?>">
                    <tr class="updateSelectors__selector--item">
                        <td class="updateSelectors__selector--item-order">
                            <input name="jobtypevieworder" value="<?php echo $row['jobTypeViewOrder']; ?>"
                                disabled />
                            <input name="jobtypevieworder" value="<?php echo $row['jobTypeViewOrder']; ?>"
                                hidden />
                        </td>
                        <td>
                            <input name="jobtype" value="<?php echo $row['jobType']; ?>" disabled />
                            <input name="jobtype" value="<?php echo $row['jobType']; ?>" hidden />
                        </td>
                        <td>
                            <button class="updateSelectors__selector--item-saveEdit btn btn__primary" type="button" onclick="startEditSelector(this);"
                                name="editjobtype">Edit</button>
                        </td>
                        <td>
                            <button type="button" name="deletejobtype" class="btn btn__danger" onclick="startEditSelector(this);">Delete</button>
                        </td>
                    </tr>
                </form>
                <?php endwhile; ?>

            </table>

        </div>
        <hr>
        <div class="updateSelectors__selector">
            <h4>Locations</h4>
            <p>Order | Location</p>
            <form method="post" action="addeditselectors.php">
                <input type="text" name="locationvieworder" placeholder="" class="btn updateSelectors__selector--item-order" />
                <input type="text" name="location" placeholder="Add Location" class="btn" />
                <button class="btn btn__primary" type="submit" name="addlocation">Add</button>
            </form>

            <table name="locations" id="">

                <?php while($row = $locations->fetch_assoc()) : ?>
                <form method="post" action="addeditselectors.php?id=<?php echo $row['id'] ?>">
                    <tr class="updateSelectors__selector--item">
                        <td>
                            <input class="updateSelectors__selector--item-order" name="locationvieworder" value="<?php echo $row['locationViewOrder']; ?>"
                                disabled/>
                            <input class="updateSelectors__selector--item-order" name="locationvieworder" value="<?php echo $row['locationViewOrder']; ?>"
                                hidden/>
                        </td>
                        <td>
                            <input name="location" value="<?php echo $row['location']; ?>" disabled/>
                            <input name="location" value="<?php echo $row['location']; ?>" hidden/>
                        </td>
                        <td>
                            <button class="updateSelectors__selector--item-saveEdit btn btn__primary" type="button" onclick="startEditSelector(this);"
                                name="editlocation">Edit</button>
                        </td>
                        <td>
                            <button type="button" name="deletelocation" class="btn btn__danger" onclick="startEditSelector(this);">Delete</button>
                        </td>
                    </tr>
                </form>
                <?php endwhile; ?>

            </table>

        </div>
    </div>

    <!-- FOOTER -->
    <section>
        <?php include 'php/reusables/footer.php' ?>
    </section>

</body>

</html>