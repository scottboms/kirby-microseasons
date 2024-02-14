<?php

namespace Scottboms\Microseasons;
use Kirby\Toolkit\Date;

class Season {
  
  public static function getAllSeasons(): string {
    return __DIR__ . '/../microseasons.json';
  }

  public static function getSeason($today, $jsonFileUrl): array {
    // fetch and decode the JSON data from the external link
    $json = file_get_contents($jsonFileUrl);
    $seasonsArray = json_decode($json, true);

    // convert $today passed to 4-character mmdd format
    // since we don't care about the specific year
    $timestamp = Date::createFromFormat('Y-m-d', $today);

    // create $currentSeason to hold an array of data to return
    $currentSeason = array();

    // check which season the current date falls within
    foreach ($seasonsArray as $season) {
      $start = Date::createFromFormat('Y-m-d', $season["start"]);
      $end = Date::createFromFormat('Y-m-d', $season["end"]);

      // adjust the start and end dates to handle year transitions
      if ($start > $end) {
        if ($timestamp >= $start || $timestamp < $end) {
          $season['start'] = $start->format(option("scottboms.microseasons.dateformat")) ?? $start->format('M d');
          $season['end'] = $end->format(option("scottboms.microseasons.dateformat")) ?? $end->format('M d');
          return $currentSeason[] = $season; // return the matching season
        }
      } else {
        if ($timestamp >= $start && $timestamp < $end) {
          $season['start'] = $start->format(option("scottboms.microseasons.dateformat")) ?? $start->format('M d');
          $season['end'] = $end->format(option("scottboms.microseasons.dateformat")) ?? $end->format('M d');
          return $currentSeason[] = $season; // return the matching season
        }
      }
    }
    return $currentSeason;
  }
}