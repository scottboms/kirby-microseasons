# Japanese Micro Seasons Plugin for Kirby

Output information for one of the [72 Japanese micro season](https://www.nippon.com/en/features/h00124/) based on the current date directly into your Kirby templates and customize using the provided options in your Kirby `config.php` file.

## Requirements

- [**Kirby**](https://getkirby.com/) 4.x or 5.x

## Installation

### [Kirby CLI](https://github.com/getkirby/cli)

    kirby plugin:install scottboms/kirby-microseasons

### Git Submodule

    $ git submodule add https://github.com/scottboms/kirby-microseasons.git site/plugins/kirby-microseasons

### Copy and Paste

1. [Download](https://github.com/scottboms/kirby-microseasons/archive/master.zip) the contents of this repository as a Zip file.
2. Rename the extracted folder to `kirby-microseasons` and copy it into the `site/plugins/` directory in your Kirby project.

## Usage

In any template, drop in the following line to include the output from this plugin in your site.

    <?= snippet('microseasons') ?>

## Configuration Options

If you want to modify the wrapper HTML element, change the wrapper class, or output the date information in a custom format, you can configure this using the included plugin options. Date formatting follows the [available format options from PHP](https://www.php.net/manual/en/function.date.php).

    'scottboms.microseasons' => [
      'wrapper' => 'div', // e.g. div, article, section, span, etc.
      'class' => 'microseasons', 
      'includedates' => True, // True | False
      'dateformat' => 'M d, Y' // e.g. 'M d', 'Y-m-d', etc.
    ],

## Section

The plugin also includes a custom `section` type called `microseasons` that you can use to display information within the panel. This can be added to a blueprint and also adopts any defined configuration options.

    sections:
      microseasons:
        type: microseasons

## Disclaimer

This plugin is provided "as is" with no guarantee. Use it at your own risk and always test before using it in a production environment. If you identify an issue, typo, etc, please [create a new issue](https://github.com/scottboms/kirby-microseasons/issues/new) so I can investigate.

## License

[MIT](https://opensource.org/licenses/MIT)
