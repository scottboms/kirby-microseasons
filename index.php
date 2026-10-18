<?php

/**
 * Kirby Japanese Microseasons Plugin
 *
 * @author Scott Boms <plugins@scottboms.com>
 * @license MIT
**/

load([
  'Scottboms\Microseasons\Season' => __DIR__ . '/classes/Microseasons.php',
	'Scottboms\Microseasons\MicroseasonsField' => __DIR__ . '/fields/MicroseasonsField.php'
]);

use Scottboms\Microseasons\Season;
use Scottboms\Microseasons\MicroseasonsField;
use Kirby\Toolkit\Date;
use Kirby\Cms\App;

$version = App::version() ?? '0.0.0';
if (
    version_compare($version, '6.0.0-beta.1', '<') ||
    version_compare($version, '7.0.0', '>=')
) {
    throw new Exception('Microseasons requires Kirby 6');
}

Kirby::plugin('scottboms/kirby-microseasons', 
  info: [
    'homepage' => 'https://github.com/scottboms/kirby-microseasons',
		'license' => 'MIT',
		'version' => '6.0.0',
		'authors' => [['name' => 'Scott Boms']]
  ],
  
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
    'fields' => [
      'microseasons' => \Scottboms\Microseasons\MicroseasonsField::class
    ]
  ]
);