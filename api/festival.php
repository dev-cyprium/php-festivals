<?php
  $id = $_POST['id'];

  $query = "select * from festivali where
            id=:id";
  $result = safeQuery($conn, $query, ["id" => $id], true);

  echo json_encode($result);