<?php

  /**
   * @param PDO $conn the connection to the database
   * @param string $table the table name
   * @return bool|PDOStatement returns all records for a given table
   */
  function fetchAll(PDO $conn, string $table) {
    return $conn->query("SELECT * FROM $table");
  }

  function safeQuery(PDO $conn, $query, array $bindings, $fetchOne=false) {
    $stmt = $conn->prepare($query);
    foreach($bindings as $key => &$val) {
      $stmt->bindParam(":$key", $val);
    }
    $stmt->execute();
    if($fetchOne) {
      return $stmt->fetch();
    }
    return $stmt->fetchAll();
  }

  function insertValidate($insertParams, $validations, Callable $transform, $extra=[]) {
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
      if(!empty($extra)) {
        return $transform($state, $extra);
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

  /**
   * @param string $location
   * A simple wrapper which
   */
  function redirect(string $location) {
    header("Location: $location");
  }

  /**
   * @return bool
   * Returns weather or not is a user logged
   * in with session.
   */
  function userLogged() {
    if(isset($_SESSION['user'])) {
      return true;
    }
    return false;
  }

  function adminLogged() {
    if(userLogged() && $_SESSION['user']->naziv == 'admin') {
      return true;
    }
    return false;
  }