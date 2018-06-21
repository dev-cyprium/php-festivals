<?php
  $data = $_GET['term'];

  echo json_encode(["term" => $data]);