# Documentation package for Laravel >=4.1

## Installation

Add to your composer.json following lines

	"repositories": [
		{
			"type": "vcs",
			"url": "https://github.com/rokde/dox"
		}
	],
	"require": {
		"rokde/dox": "dev-master"
	}

Run `php artisan config:publish rokde/dox`

Then edit `config.php` in `app/config/packages/rokde/dox` to your needs.

Add `'Rokde\Dox\DoxServiceProvider',` to `providers` in `app/config/app.php`.


## Configuration

You can configure following properties:

- title: Title will be displayed as main page browser title
- path: This is the route path of your documentation. It starts at `app_path()`.
- index: This is the filename of the index file (without extension). It looks for an [index].md file.
- home: This is the starting page if a user directs browser url to [uri]
- uri: This is the route path of your documentation. Where do you want your docs to be available.
- extra_parser: Should we use the Markdown Extra Parser, true by default.
- view: Which view should we use to present your documentation files.

## Usage

	http://localhost:8000/docs

	or

	http://localhost:8000/docs/howto

