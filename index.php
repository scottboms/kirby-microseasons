<?php

//namespace scottboms\microseasons;

/**
 * Kirby Japanese Microseasons Plugin
 *
 * @version 1.0.5
 * @author Scott Boms <plugins@scottboms.com>
 * @copyright Scott Boms <plugins@scottboms.com>
 * @link https://github.com/scottboms/kirby-microseasons
 * @license MIT
**/

load([
  'scottboms\Microseasons\Season' => __DIR__ . '/classes/Microseasons.php'
]);

use Scottboms\Microseasons\Season;
use Kirby\Toolkit\Date;

Kirby::plugin('scottboms/microseasons', [
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

]);