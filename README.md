# Documentation package for Laravel 4.1

## Installation

Add to your composer.json following lines

	"require": {
		"ipunkt/dox": "dev-master"
	}

Run `php artisan config:publish ipunkt/dox`

Then edit `config.php` in `app/config/packages/ipunkt/dox` to your needs.

Add `'Ipunkt\Dox\DoxServiceProvider',` to `providers` in `app/config/app.php`.


## Configuration

TODO

## Usage

	http://localhost:8000/docs

	or

	http://localhost:8000/docs/howto

