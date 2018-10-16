<?php 
    //Start the session
    session_start();
    $result='';
     
    try{
        include 'php/config/config.php';
        include 'php/classes/Database.php';
        include 'php/helpers/controllers.php';
        include 'php/helpers/formatting.php';
    }catch (PDOException $ex) {
        echo 'File not found. Please contact the system administrator.';
    }

    //Validate Admin Token
    if ($_SESSION['adminToken'] == $systemAdminToken) {
        header("Location: admin.php");
    }
?>
<?php
  if(isset($_POST['submit'])){
    //Assign Vars    
    $password = $_POST['password'];
    $hashed_password = '';

    //get hashed password
    try{
        $splQuery = "SELECT * FROM jobboard_users LIMIT 1";
        $statement = $db->prepare($splQuery);
        $statement->execute();
        $row = $statement->fetch();
        $hashed_password = $row['password'];
    }catch (PDOException $ex) {
        $result = "An error occurred.";
    }

    if(password_verify($password, $hashed_password)){
        $_SESSION['adminToken'] = $systemAdminToken;
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
<head>
    <?php 
        try{ 
            include 'php/reusables/head.php';
        }catch (PDOException $ex) {
            $result = "An error occurred.";
        }
    ?>
</head>
<body>
    <?php 
        try{ 
            include 'php/reusables/hero.php';
        }catch (PDOException $ex) {
            $result = "An error occurred.";
        }
    ?>
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
        <?php 
            try{
                include 'php/reusables/footer.php';
            }catch (PDOException $ex) {
                $result = "An error occurred.";
            }
        ?>
    </section>
</body>
</html>