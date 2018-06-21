<?php

  /**
   * Form requirements
   */
  function getFestivalParams() {
    return [
      'naziv',
      'datum',
      'opis'
    ];
  }

  function getFestivalValidations() {
    $reNaziv = '/^.{1,100}$/';

    return [
      'naziv' => $reNaziv
    ];
  }

  /**
   * Transforms the state into
   * what should be inserted in the db
   */
  function festivalTransform($state, $extra) {
    return [
      "tableName" => "festivali",
      "data" => [
        "naziv" => $state["naziv"],
        "datum" => $state["datum"],
        "opis"  => $state["opis"],
        "putanja" => $extra["putanja"]
      ]
    ];
  }

