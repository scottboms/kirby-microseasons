<?php

namespace Scottboms\Microseasons;
use Kirby\Form\Field\DisplayField;

class MicroseasonsField extends DisplayField
{
  public function props(): array
  {
    return [
      ...parent::props(),
      'microSeason' => $this->microSeason()
    ];
  }

  public function microSeason(): array
  {
    $currentDate = Season::getCurrentDate();
    $jsonSeasons = Season::getAllSeasons();

    return Season::getSeason($currentDate, $jsonSeasons);;
  }
}