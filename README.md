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

TODO

## Usage

	http://localhost:8000/docs

	or

	http://localhost:8000/docs/howto

