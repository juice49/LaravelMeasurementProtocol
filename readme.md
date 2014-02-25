# Laravel Measurement Protocol

An Analytics Measurement Protocol client for Laravel. This simply provides a static interface for [Krizon's PHP client](https://github.com/krizon/php-ga-measurement-protocol).

## Example

Use it just like [Krizon's PHP client](https://github.com/krizon/php-ga-measurement-protocol), but without the need to instantiate, pass a `tid` (this is taken from `config.analytics.tid`), or pass a `cid` (this is picked up from the `_ga` cookie, although it can also be manually passed).

	MeasurementProtocol::event(array(
		'ec' => 'Contact Form',
		'ea' => 'Submit',
		'ev' => 1
	));

## Install

Using Composer:

	composer require 

### Service Provider

Add the service provider `Ash\LaravelMeasurementProtocol\LaravelMeasurementProtocolServiceProvider`.

### Alias

Optionally add an alias, like so:

	aliases => array(
		'MeasurementProtocol' => 'Ash\LaravelMeasurementProtocol\LaravelMeasurementProtocolClient'
	)

### Config

You'll need an Analytics config that exposes your tracking id (`tid`). For example, create a config file at `app/config/analytics.php` containing:

	<?php
	
	return array(
		'tid' => 'UA-XXXXXXX-X'
	);