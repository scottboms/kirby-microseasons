<?php

/**
 * Kirby Japanese Microseasons Plugin
 *
 * @author Scott Boms <plugins@scottboms.com>
 * @license MIT
**/

load([
  'scottboms\Microseasons\Season' => __DIR__ . '/classes/Microseasons.php'
]);

use Scottboms\Microseasons\Season;
use Kirby\Toolkit\Date;

Kirby::plugin(
  name: 'scottboms/kirby-microseasons', 
  info: [
    'homepage' => 'https://github.com/scottboms/kirby-microseasons'
  ],
  version: '1.0.7',
  extends: [
    'options' => [
      'cache' => True,
      'wrapper' => 'div',
      'class' => 'microseasons',
      'includedates' => True,
      'dateformat' => 'M d'
    ],
    'snippets' => [
      'microseasons' => __DIR__ . '/snippets/microseasons.php'
    ],
    'sections' => [
      'microseasons' => require __DIR__ . '/sections/microseasons.php'
    ]
  ]
);