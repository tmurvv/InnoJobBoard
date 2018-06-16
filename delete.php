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
        $delete = $db->select($query)->fetch_assoc();

    if(isset($_POST['delete'])){
        
        //Create delete query
        $query = "DELETE FROM joblistings WHERE id = ".$id;
        //Run delete query
        $delete_row = $db->delete($query);
    }
?>
<!DOCTYPE html>

    <html lang="en">

    <?php include 'php/reusables/head.php' ?>

    <body>
    <?php include 'php/reusables/hero.php' ?>
        <div class="deleteJob">         
            <div class="deleteJob__ask">Delete Job Listing<br> '<?php echo $delete['title']; ?>'? </div>
            <form method="post" action="delete.php?id=<?php echo $id; ?>">
               <input name="delete" type="submit" class="btn btn__danger" value="Delete" />
            </form>   
            <a href="admin.php" class="btn btn__secondary">Cancel</a>
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