<?php include 'php/config/config.php'; ?>
<?php include 'php/classes/Database.php'; ?>
<?php include 'php/helpers/formatting.php'; ?>
<?php include 'php/helpers/controllers.php'; ?>
<?php
  if(isset($_POST['submit'])){
    //Assign Vars    
    $password = $_POST['password'];
    
    //get hashed password
    $splQuery = "SELECT * FROM jobboard_users LIMIT 1";
    $statement = $db->prepare($splQuery);
    $statement->execute();
    $row = $statement->fetch();
    $hashed_password = $row['password'];

    if(password_verify($password, $hashed_password)){
        header("Location: admin.php");
    }else{
        $result = "Invalid Username or password.";
    }     
   }else{
       $password = "";
       $result = "";
   }
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

            <h3>Admin Login</h3>
            <form method="post" action="adminLogin.php">
            <?php if(isset($result)) {echo $result;} ?>
                <div class="addJob__job">
                    <div class="addJob__job--title">
                        <input name="password" style="width:300px;" type="password" placeholder="Please enter admin password">
                    </div>
                </div>
                <input type="submit" name="submit" class="addSearch__form--selectBoxes-item btn btn__primary" value="Submit" />
                <a href="index.php" class="edit__cancel btn btn__secondary">Cancel</a>
            </form>
        </div>

    <!-- FOOTER -->

    <section>
        <?php include 'php/reusables/footer.php' ?>
    </section>

    </body>

    </html>