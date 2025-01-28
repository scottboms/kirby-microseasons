<?php

namespace Scottboms\Microseasons;
use Kirby\Toolkit\Date;

class Season {
  
  public static function getCurrentDate(): string {
    $currentDate = date('Y-m-d');
    return $currentDate;
  }
  
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
    if(!$timestamp) {
      // fallback to the current date if $today is invalid
      $today = date('Y-m-d');
      $timestamp = Date::createFromFormat('Y-m-d', $today);
    }

    // safely get the year from the parsed date
    $currentYear = $timestamp ? $timestamp->format('Y') : date('Y');

    $wrapper = option('scottboms.microseasons.wrapper') ?? 'div';
    $class = option('scottboms.microseasons.class') ?? 'microseasons';
    $includedates = option('scottboms.microseasons.includedates') ?? True;

    // initialize $currentSeason to hold an array of data to return
    $currentSeason = array();

    // check which season the current date falls within
    foreach ($seasonsArray as $season) {
      // handle updating the raw dates from the json values
      $start = Date::createFromFormat('Y-m-d', $currentYear . '-' . substr($season["start"], 5));
      $end = Date::createFromFormat('Y-m-d', $currentYear . '-' . substr($season["end"], 5));

      // adjust the start and end dates to handle year transitions
      if ($start > $end) {
        if ($timestamp >= $start || $timestamp <= $end) {
          $season['start'] = Season::convertDateFormat($start);
          $season['end'] = Season::convertDateFormat($end);
          $season['wrapper'] = $wrapper;
          $season['class'] = $class;
          $season['includedates'] = $includedates;
          $season['year'] = $currentYear;
          $season['start'] = $season['start'];
          $season['end'] = $season['end'];
          return $currentSeason[] = $season; // return the matching season
        }
      } else {
        if ($timestamp >= $start && $timestamp <= $end) {
          $season['start'] = Season::convertDateFormat($start);
          $season['end'] = Season::convertDateFormat($end);
          $season['wrapper'] = $wrapper;
          $season['class'] = $class;
          $season['includedates'] = $includedates;
          $season['year'] = $currentYear;
          $season['start'] = $season['start'];
          $season['end'] = $season['end'];
          return $currentSeason[] = $season; // return the matching season
        }
      }
    }
    return $currentSeason;
  }

  public static function convertDateFormat($dateString): string {
    $dateFormat = option("scottboms.microseasons.dateformat") ?? 'M d';

    $reformattedDate = $dateString->format($dateFormat);
    return $reformattedDate;
  }
}