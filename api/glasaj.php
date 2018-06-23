<?php

  $status = 403;

  if(userLogged()) {
    $status = 400;
    if(isset($_POST['id'])) {
      $idFest = $_POST['id'];
      $idKor  = $_SESSION['user']->id;
      $upit = "INSERT INTO glasanja
             VALUES(:korisnik, :festival)";
      try {
        $status = 200;
        runSafeQuery($conn, $upit, [
          "korisnik" => $idKor,
          "festival" => $idFest
        ]);
        echo json_encode(["message" => "Uspesno ste glasali"]);
      } catch(PDOException $e) {
        $status = 403;
        echo json_encode(["message" => "Vec ste glasali"]);
      }
    }
  }

  http_response_code($status);