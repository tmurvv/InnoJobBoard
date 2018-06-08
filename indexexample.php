<?php include 'php/config/config.php'; ?>
<?php include 'php/classes/Database.php'; ?>
<?php include 'php/helpers/formatting.php'; ?>
<?php

  //Create DB Object
  $db = new Database();

  //Create Query
  $query = "SELECT * FROM joblistings";
  //Run Query
  $posts = $db->select($query);

//   //Create Query
//   $query = "SELECT * FROM categories";
//   //Run Query
//   $categories = $db->select($query);
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
imin
<?php while($row = $posts->fetch_assoc()) : ?> 
<h2><?php echo $row['title']; ?></h2>
<?php endwhile; ?> 

</body>
</html>