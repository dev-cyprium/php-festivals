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
      "data" => array_merge([
        "naziv" => $state["naziv"],
        "datum" => $state["datum"],
        "opis"  => $state["opis"],
      ], $extra)
    ];
  }

  function festivalPrettyDate($fullDbTimestamp) {
    $datum = explode(" ", $fullDbTimestamp)[0];
    list($year, $month, $day) = explode("-", $datum);
    return date("d / m / Y", mktime(0, 0, 0, $month, $day, $year));
  }
