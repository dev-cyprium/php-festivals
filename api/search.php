<?php
  require "../config/database.php";

  $term = $_GET['term'];

  $query = "select * from festivali 
            where lower(naziv) like lower(:naziv)";

  $result = safeQuery($conn, $query, ["naziv" => "%$term%"]);

  echo json_encode($result);