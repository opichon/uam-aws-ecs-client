<?php

use Guzzle\Service\Builder\ServiceBuilder;
use Guzzle\Tests\GuzzleTestCase;

error_reporting(-1);

// Ensure that composer has installed all dependencies
if (!file_exists(dirname(__DIR__) . '/composer.lock')) {
    die("Dependencies must be installed using composer:\n\nphp composer.phar install\n\n"
        . "See http://getcomposer.org for help with installing composer\n");
}

// Include the composer autoloader
$loader = require dirname(__DIR__) . '/vendor/autoload.php';
$loader->add('UAM\\Amazon\\PA\\Tests', __DIR__);

// Register services with the GuzzleTestCase
GuzzleTestCase::setMockBasePath(__DIR__ . '/mock');

// Allow command line overrides
if (get_cfg_var('CONFIG')) {
    $_SERVER['CONFIG'] = get_cfg_var('CONFIG');
}

// Set the service configuration file if it was not provided from the CLI
if (!isset($_SERVER['CONFIG'])) {
    $serviceConfig = $_SERVER['CONFIG'] = dirname(__DIR__) . '/test_services.json';
    $_SERVER['CONFIG'] = $serviceConfig;
    if (!file_exists($serviceConfig)) {
        die("test_services.json does not exist.\n"
            . "Please run phing test-init or copy test_services.json.dist to test_services.json\n\n");
    }
}

if (!is_readable($_SERVER['CONFIG'])) {
    die("Unable to read service configuration from '{$_SERVER['CONFIG']}'\n");
}

// If the global prefix is hostname, then use the crc32() of gethostname()
if (!isset($_SERVER['PREFIX']) || $_SERVER['PREFIX'] == 'hostname') {
    $_SERVER['PREFIX'] = crc32(gethostname());
}

// Instantiate the service builder
$builder = UAM\Amazom\PA\AmazonPAServiceBuilder::factory($_SERVER['CONFIG']);

/*
// Turn on wire logging if configured
$aws->getEventDispatcher()->addListener('service_builder.create_client', function (\Guzzle\Common\Event $event) {
    if (isset($_SERVER['WIRE_LOGGING']) && $_SERVER['WIRE_LOGGING']) {
        $event['client']->addSubscriber(Guzzle\Plugin\Log\LogPlugin::getDebugPlugin());
    }
});
*/

// Configure the tests to use the instantiated AWS service builder
GuzzleTestCase::setServiceBuilder(ServiceBuilder::factory(array(
    'test.amazonpa' => array(
        'class' => 'AmazonPAClient',
        'params' => array(
            'AssociateTag' => 'porot0c-21',
            'AWSAccesskeyId' => 'AKIAJZR3O4K7HZ53364A'
        )
    )
)));
