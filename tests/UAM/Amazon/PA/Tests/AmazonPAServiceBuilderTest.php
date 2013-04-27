<?php

namespace UAM\Amazon\PA\Tests;

use Guzzle\Tests\GuzzleTestCase;

use UAM\Amazon\PA\AmazonPAServiceBuilder;

class AmazonPAServiceBuilderTest extends GuzzleTestCase
{
    public function testReturnsDefaultConfigPath()
    {
        $this->assertContains('amazon-pa.json', AmazonPAServiceBuilder::getDefaultServiceDefinition());
    }
}