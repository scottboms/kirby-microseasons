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
use Composer\Semver\Semver;
use Kirby\Cms\App as Kirby;

// validate Kirby version
if (Semver::satisfies(Kirby::version() ?? '0.0.0', '~4.0 || ~5.0') === false) {
	throw new Exception('HTML5 Video Tag requires Kirby 4 or 5');
}

Kirby::plugin(
  name: 'scottboms/kirby-microseasons', 
  info: [
    'homepage' => 'https://github.com/scottboms/kirby-microseasons'
  ],
  version: '1.0.8',
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