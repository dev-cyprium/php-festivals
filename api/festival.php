<?php
  $status = 403;

  if(adminLogged()) {
    $status = 400;
    if(isset($_POST['id'])) {
      $id = $_POST['id'];

      $status = 200;
      $query = "select * from festivali where
            id=:id";
      $result = safeQuery($conn, $query, ["id" => $id], true);
      echo json_encode($result);
    }
  }

  http_response_code($status);
