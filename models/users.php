<?php
  
  /**
   * Form requirements
   */
  function getUserParams() {
    return [
      "email",
      "imeprezime",
      "lozinka"
    ];
  }

  function getUserValidations() {
    $reUserName  = '/^[A-ZŠĐČĆŽ][a-zšđčćž]+(\s[A-ZŠĐČĆŽ][a-zšđčćž]+)+$/';
    $reUserEmail = '/^[a-z0-9\._\+\-]+@[a-z0-9\._]+$/';
    $reUserPass  = '/^(?=.*[$%^@#]).{5,100}$/';

    return [
      "email" => $reUserEmail,
      "lozinka" => $reUserPass,
      "imeprezime" => $reUserName
    ];
  }

  /**
   * Transforms the state into
   * what should be inserted in the db
   */
  function userTransform($state) {
    $username = makeUserName($state['imeprezime']);
    $password = md5($state['lozinka']);
    $datum = date("Y-m-d H:i:s");

    return [
      "tableName" => "korisnici",
      "data" => [
        "email" => $state["email"],
        "korisnicko_ime" => $username,
        "password_hash" => $password,
        "datum_registracije" => $datum
      ]
    ];
  }

  function makeUserName($imeprezime) {
    $parts = explode(" ", $imeprezime);
    $downcase = array_map(function ($part) {
        return  strtolower($part);
    }, $parts);
    return implode('.', $downcase);
  }