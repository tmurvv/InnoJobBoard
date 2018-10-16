<?php 
    //Start the session
    session_start();
    $_SESSION['result']='';
     
    try{
        include 'php/config/config.php';
        include 'php/classes/Database.php';
        include 'php/helpers/controllers.php';
        include 'php/helpers/formatting.php';
    }catch (PDOException $ex) {
        echo 'File not found. Please contact the system administrator.';
    }

    //Validate Admin Token
    if (!$_SESSION['adminToken'] == $systemAdminToken) {
        echo 'Invalid token. Please navigate to adminLogin.php and enter the password to secure a valid token.';    
        return;
    }
?>
<?php
  //Assign POST variables
  $categorySearchID = $_POST['category'];
  $jobtypeSearchID = $_POST['jobtype'];
  $locationSearchID = $_POST['location'];

  //Initialize search IDs
  if(!$categorySearchID){
      $categorySearchID = "empty";
  } 
  if (!$jobtypeSearchID){
      $jobtypeSearchID = "empty";
  }  
  if (!$locationSearchID){
      $locationSearchID = "empty";
  }

  //Create Search Query
  try{
    $query=createQuery($categorySearchID, $jobtypeSearchID, $locationSearchID);
    $statement = $db->prepare($query);
    $statement->execute();
    $listings=$statement->fetchAll();
  }catch(PDOException $ex){
    $_SESSION['result'] = "An error occurred.";
  } 
?>
<?php 
    try{
        include 'php/reusables/selectorQueries.php';
    }catch(PDOException $ex){
        $_SESSION['result'] = "File not found. Please contact the system administrator.";
    }    
 ?>
<!DOCTYPE html>
<html lang="en">
    <?php 
        try{
            include 'php/reusables/head.php';
        }catch(PDOException $ex){
            $_SESSION['result'] = "File not found. Please contact the system administrator.";
        }
    ?>
<body>
    <?php 
        try{
            include 'php/reusables/hero.php';
        }catch(PDOException $ex) {
            $_SESSION['result'] = "File not found. Please contact the system administrator.";
        }
    ?>
    <div class="menus">
        <div class="menus__addNav">
            <ul class="menus__addNav--container">
                <li class="menus__addNav--container-item">
                    <a href="add.php">Add Job Listing</a>
                </li>
                <li class="menus__addNav--container-item">
                    <a href="addeditselectors.php">Update Categories</a>
                </li>
                <li class="menus__addNav--container-item">
                    <a href="addeditselectors.php#jobTypes">Update Job Types</a>
                </li>
                <li class="menus__addNav--container-item">
                    <a href="addeditselectors.php#locations">Update Locations</a>
                </li>
            </ul>
        </div>
        <div class="search__form">
            <?php 
                if(!$_SESSION['result']==''){
                    echo "<div class='messageBox'><h3>";
                    echo $_SESSION['result']; 
                    echo "</h3></div>";
                    $_SESSION['result'] = ""; 
                }
            ?>
            <div class="search__form--title">
                <h2>Search</h2>
            </div>
            <div class="search__form--selectBoxes">
                <form action="admin.php?this.options[this.selectedIndex].value" id="main" name="main" method="post">
                    <?php 
                        try{
                            include 'php/reusables/selectors.php';
                        }catch(PDOException $_COOKIE){
                            $_SESSION['result'] = "File not found. Please contact the system administrator.";
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
    <div class="mainBoard" id="jobs">
        <?php 
            if ($msg) {
                echo "<div class='admin__messageBox'>".$msg."</div>";
            } 
        ?>
        <h1>Job<span>Board</span>
        </h1>
        <h3>Admin Page</h3>
        <div class="listings">
            <?php if($listings) : ?>
            <?php foreach($listings as $row) : ?>
            <div class="listings__job">
                <div class="listings__job--type">
                    <p class="btn btn__secondary">
                        <?php echo $row['jobtype'] ?>
                    </p>
                </div>
                <div class="listings__job--info">
                    <div class="listings__job--info-line1">
                        <h2>
                            <?php echo $row['title'] ?>
                            <?php echo $row['location'] ?>
                        </h2>
                    </div>
                    <div class="listings__job--info-line2">
                        <?php echo $row['category'] ?>
                        <div class="listings__job--info-line2-datePosted">
                            <?php echo $row['dateposted'] ?>
                        </div>
                    </div>
                    <div class="admin__editDelete">
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="admin__editDelete--edit btn btn__primary">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="admin__editDelete--delete btn btn__danger">Delete</a>
                    </div>
                    <br>
                    <div class="listings__job--info-description">
                        <?php echo $row['description'] ?>
                    </div>
                </div>
            </div>
            <br>
            <hr>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>

    </div>
    <!-- FOOTER -->
    <section>
        <?php 
            try{
                include 'php/reusables/footer.php';
            }catch(PDOException $ex){
                $_SESSION['result'] = "File not found. Please contact the system administrator.";
            }
        ?>
    </section>
</body>
</html>