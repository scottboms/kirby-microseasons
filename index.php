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

// kirby version compatibility check
$version = App::version() ?? '0.0.0';

if (version_compare($version, '6.0.0-alpha.1', '<') || version_compare($version, '8.0.0', '>=')) {
  throw new Exception('ISBN Field requires Kirby v6 or v7');
}

Kirby::plugin('scottboms/kirby-microseasons', [
  'info' => [
    'homepage' => 'https://github.com/scottboms/kirby-microseasons',
		'version' => '6.0.0',
  ],
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
  ],
]);