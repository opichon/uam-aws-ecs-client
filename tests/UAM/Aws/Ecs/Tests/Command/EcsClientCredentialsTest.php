<?php

namespace UAM\Aws\Ecs\Tests;

use UAM\Aws\Ecs\Tests\AbstractEcsTestCase;

class EcsClientCredentialsTest extends AbstractEcsTestCase
{  
    public function testAwsAccessKeyId()
    {
        $credentials = $this->client->getCredentials();

        $this->assertEquals(
            $this->getServiceBuilder()->getData('aws_ecs')['params']['key'],
            $credentials->getAccessKeyId()
        );
    }

    public function testAwsSecretKey()
    {
        $credentials = $this->client->getCredentials();

        $this->assertEquals(
            $this->getServiceBuilder()->getData('aws_ecs')['params']['secret'],
            $credentials->getSecretKey()
        );
    }
}