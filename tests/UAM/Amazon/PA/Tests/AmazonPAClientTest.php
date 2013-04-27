<?php

namespace UAM\Amazon\PA\Tests;

use Guzzle\Tests\GuzzleTestCase;

class AmazonPAClientTest extends GuzzleTestCase
{
    public function testReturnsDefaultConfigPath()
    {
        $this->assertContains('aws-config.php', Aws::getDefaultServiceDefinition());
    }       
}