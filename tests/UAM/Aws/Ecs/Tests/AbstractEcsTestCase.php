<?php


namespace UAM\Aws\Ecs\Tests;

use Guzzle\Tests\GuzzleTestCase;

class AbstractEcsTestCase extends GuzzleTestCase
{
    protected $client;

    protected function setUp()
    {
        $this->client = $this->getServiceBuilder()->get('aws_ecs');;
    }
}