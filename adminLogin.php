<?php 
    //Start the session
    session_start();
    
    try{
        include 'php/config/config.php';
        include 'php/classes/Database.php';
        include 'php/helpers/controllers.php';
        include 'php/helpers/formatting.php';
    }catch (PDOException $ex) {
        echo 'File not found. Please contact the system administrator.';
    }

    //Validate Admin Token
    if (isset($_SESSION['adminToken']) && $_SESSION['adminToken'] == $systemAdminToken) {
        header("Location: admin.php");
        exit;
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
        $_SESSION['result'] = "An error occurred.";
    }

    if(password_verify($password, $hashed_password)){
        $_SESSION['adminToken'] = $systemAdminToken;
        header("Location: admin.php");
        exit;
    }else{
        $_SESSION['result'] = "Invalid password.";
    }     
   }else{
       $password = "";
       $_SESSION['result'] = "";
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        try{ 
            include 'php/reusables/head.php';
        }catch (PDOException $ex) {
            $_SESSION['result'] = "An error occurred.";
        }
    ?>
</head>
<body>
    <?php 
        try{ 
            include 'php/reusables/hero.php';
        }catch (PDOException $ex) {
            $_SESSION['result'] = "An error occurred.";
        }
    ?>
    <div class="adminLogin">
        <h2 class="adminLogin__mainHeading">
            Job<span>Board</span>
        </h2>

        <h3>Admin Login</h3>
        <br>
        <form method="post" action="adminLogin.php">
            <?php 
                try{
                    if (isset($_SESSION['adminResult']) && !($_SESSION['adminResult'])=='') {
                        $_SESSION['result'] = $_SESSION['adminResult'];
                        $_SESSION['adminResult'] = '';
                        include 'php/reusables/displayMessage.php';
                    } else {
                        include 'php/reusables/displayMessage.php';
                    }
                    
                } catch (PDOException $ex) {
                    $_SESSION['result'] = "An error occurred.";
                }
            ?>    
            <div class="adminLogin__passwordInput">               
                <input name="password" type="password" placeholder="Please enter admin password">               
                <div class="adminLogin__passwordInput--buttons">
                    <input type="submit" name="submit" class="btn btn__primary" value="Submit" />
                    <a href="index.php" class="edit__cancel btn btn__secondary">Cancel</a>
                </div>
            </div>
            
        </form>
    </div>

    <!-- FOOTER -->
    <section>
        <?php 
            try{
                include 'php/reusables/footer.php';
            }catch (PDOException $ex) {
                $_SESSION['result'] = "An error occurred.";
            }
        ?>
    </section>
</body>
</html>