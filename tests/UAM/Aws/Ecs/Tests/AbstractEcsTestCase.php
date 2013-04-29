<?php


namespace UAM\Aws\Ecs\Tests;

use Guzzle\Tests\GuzzleTestCase;
use Guzzle\Common\Exception\InvalidArgumentException;
use Guzzle\Common\Exception\RuntimeException;

use UAM\Aws\Ecs\Aws;

class AbstractEcsTestCase extends GuzzleTestCase
{
    protected $client;

    protected function setUp()
    {   
        $config = $_SERVER['CONFIG'];
        $this->client = $this->getServiceBuilder()->get($this->getServiceName());;
    }

    protected function getServiceName()
    {
        $config = $this->getConfig();

        if (array_key_exists('services', $config)) {
            return array_keys($config['services'])[0];
        }

        if (array_key_exists('stores', $config)) {
            return array_keys($config['stores'])[0];
        }

        if (array_key_exists('name', $config)) {
            return $config['name'];
        }

        return Aws::DEFAULT_NAME;
    }

    protected function getServiceConfig()
    {
        $config = $this->getConfig();

        if (array_key_exists('services', $config)) {
            return $config['services'][$this->getServiceName()]['params'];
        }

        if (array_key_exists('stores', $config)) {
            return $config['stores'][$this->getServiceName()];
        }

        return $config;
    }

    protected function getConfig()
    {
        $filename = $_SERVER['CONFIG'];

        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if ($ext == 'js' || $ext == 'json') {
            $config = json_decode(file_get_contents($filename), true);
            // Throw an exception if there was an error loading the file
            if ($error = json_last_error()) {
                throw new RuntimeException("Error loading JSON data from {$filename}: {$error}");
            }
        } elseif ($ext == 'php') {
            $config = require $filename;
            if (!is_array($config)) {
                throw new InvalidArgumentException('PHP files must return an array of configuration data');
            }
        } else {
            throw new InvalidArgumentException('Unknown file extension: ' . $filename);
        }

        return $config;
    }
}