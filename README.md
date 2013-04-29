uam-amazon-pa-client
====================

This library provides a PHP client for the Amazon Product Advertising API.

It is designed to mimic the AWS PHP SDK v2.

Installation
------------
Via composer:

Add the library package to your `composer.json` file:

```
	require: {
		…
		"uam/aws-ecs-client": "dev-master"
	}
```

Usage
-----

```
<?php

use UAM\Aws\Ecs\Aws;

$client = Aws::factory('path/to/config.php')->get({service});

```

where `{service}` is the name of the requested service, as per the configuration. 

Configuration
-------------

The configuration file can be written as a PHP array or a json file. The configuration passed to the `Aws::factory` method can take one of 3 forms:

### Services

A standard Guzzle configuration array containing a `services` key. See the Guzzle documentation.

### Multiple stores

An array containing a `stores` key, the value of which is an array where:

  * the key is the name of the service
  * the value is an array of parameters passed to the service
  
One Guzzle service will be created for each key in the `stores` array.

### Single store

Otherwise, the array is taken to represent the parameters of a single Guzzle service. The service name is equal to the value of the `name` configuration option if it exists, or "ecs" by default if not. 

Configuration parameters
------------------------

The configuration parameters fot each service are:

  * `key`: Your AWS Access Key ID
  * `associate_tag`: Your Amazon Product Advertising associate tag or tracking id
  * `region`: A string repressenting the locale of the Amazon store to use. Allowed values are: ca, cn, de, es, fr, it, jp, uk, us.
  
Sample configurations
---------------------
### Services

```
<?php

$services = array(
	"amazon.fr" => array(
		"class" => "UAM\Aws\Ecs\EcsClient",
		"params" => array(
			"key" => "Your AWS Access Key Id",
			"associate_tag" => "your associate tag or tracking id",
			"region" => "fr"
		)
	),
	"amazon.us" => array(
		"class" => "UAM\Aws\Ecs\EcsClient",
		"params" => array(
			"key" => "Your AWS Access Key Id",
			"associate_tag" => "your associate tag or tracking id",
			"region" => "us"
		)	
	)
);
```

### Multiple stores

```
"stores": {
	"amazon.fr": {
		"key": "Your AWS Access Key Id",
		"associate_tag": "Your associate tag or tracking id",
		""region": "fr"
	},
	"amazon.us": {
		"key": "Your AWS Access Key Id",
		"associate_tag": "Your associate tag or racking id",
		"region": "us"
	}
}
```

### Single store

```
<?php

$config = array(
	"key" => "Your AWS Access Key Id",
	"associate_tag" => "Your associate tag or tracking id",
	"region" => "fr"
);
```

### Named single store

```
"name": "amazon.fr",
"key": "Your AWS Access Key Id",
"associate_tag": "Your associate tag or tracking id",
"region": "fr"
```