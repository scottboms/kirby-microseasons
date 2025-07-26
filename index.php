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
use Kirby\Cms\App;

// shamelessly borrowed from distantnative/retour-for-kirby
if (
	version_compare(App::version() ?? '0.0.0', '4.0.1', '<') === true ||
	version_compare(App::version() ?? '0.0.0', '6.0.0', '>=') === true
) {
	throw new Exception('Kirby Microseasons requires Kirby v4 or v5');
}

Kirby::plugin(
  name: 'scottboms/kirby-microseasons', 
  info: [
    'homepage' => 'https://github.com/scottboms/kirby-microseasons'
  ],
  version: '1.1.0',
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