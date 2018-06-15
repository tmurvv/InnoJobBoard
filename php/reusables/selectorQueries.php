<?php

//Create Selector Queries
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