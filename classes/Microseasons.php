<?php

namespace Scottboms\Microseasons;
use Kirby\Toolkit\Date;

class Season {
  
  public static function getAllSeasons(): string {
    return __DIR__ . '/../microseasons.json';
  }

  public static function getSeason($currentDate, $jsonFileUrl): array {
    // fetch and decode the JSON data from the external link
    $json = file_get_contents($jsonFileUrl);
    $seasonsArray = json_decode($json, true);

    // convert $currentDate passed to 4-character mmdd format
    // since we don't care about the specific year
    $timestamp = date("m-d", strtotime($currentDate));

    // create $currentSeason to hold an array of data to return
    $currentSeason = array();

    // check which season the current date falls within
    foreach ($seasonsArray as $season) {
      $start = $season["start"];
      $end = $season["end"];

      // adjust the start and end dates to handle year transitions
      if ($start > $end) {
        if ($timestamp >= $start || $timestamp < $end) {
          // convert the date information to dates object
          $season["start"] = Date::createFromFormat('m-d', $start);
          $season["end"] = Date::createFromFormat('m-d', $end);
          return $currentSeason[] = $season; // return the matching season
        }
      } else {
        if ($timestamp >= $start && $timestamp < $end) {
          $season["start"] = Date::createFromFormat('m-d', $start);
          $season["end"] = Date::createFromFormat('m-d', $end);
          return $currentSeason[] = $season; // return the matching season
        }
      }
    }
    return $currentSeason; // no match fallback
  }

}