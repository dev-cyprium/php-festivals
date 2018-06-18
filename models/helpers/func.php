<?php 

  function fetchAll(PDO $conn, string $table) {
    return $conn->query("SELECT * FROM $table");
  }

  function fetchBy(PDO $conn, string $table, array $clause, $fetchOne=false) {
    $key = array_keys($clause)[0];
    $val = $clause[$key];
    $query = "select * from $table
              where $key=:$key";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":$key", $val);
    $stmt->execute();
    if($fetchOne) {
      return $stmt->fetch();
    }
    return $stmt->fetchAll();
  }

  function insertValidate($insertParams, $validations, Callable $transform) {
      $state = [];
      foreach($insertParams as $param) {
          if(isset($_POST[$param])) {
              $state[$param] = $_POST[$param];
          } else {
              throw new Error("Param $param not provided!");
          }
      }

      foreach($validations as $field => $regex) {
          $val = $state[$field];
          if(!preg_match($regex, $val)) {
              throw new Error("Param $field nije dobar");
          }
      }

      return $transform($state);
  }

  /**
   * Dynamically maps data from the models
   * into a query
   */
  function dataToColumns($data) {
      $names = array_keys($data);
      $placeholders = implode(",", array_map(function($e) {
          return ":$e";
      }, $names));
      return [implode(",",$names),$placeholders];
  }

  function insert(PDO $conn, $insertStructure) {
      $tableName = $insertStructure['tableName'];
      list($names, $placeholders) = dataToColumns($insertStructure['data']);

      $query = "INSERT INTO $tableName (" . $names . ")" .
              " VALUES(" . $placeholders . ")";

      $stmt = $conn->prepare($query);
      foreach($insertStructure['data'] as $key => &$value) {
        $stmt->bindParam(":$key", $value);
      }
      try{
        $stmt->execute();
        return $conn->lastInsertId();
      } catch(PDOException $e) {
        return false;
      }

  }

  function hasError(&$var, $error, $errText) {
    if(isset($var) && isset($var[$error])) {
      return $errText;
    }
    return '';
  }