<?php

use Kirby\Toolkit\Date;

return [
  'props' => [
    'label' => function(string $label = "Current Microseason") {
      return $label;
    },
    'layout' => function(string $layout = "list") {
      return $layout;
    }
  ],

  'computed' => [
    'microSeason' => function() {
      $currentDate = Scottboms\Microseasons\Season::getCurrentDate();
      $jsonSeasons = Scottboms\Microseasons\Season::getAllSeasons();
      $matchSeason = Scottboms\Microseasons\Season::getSeason($currentDate, $jsonSeasons);

      return $matchSeason;
    }
  ]
];