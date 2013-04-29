<?php

namespace UAM\Aws\Ecs\Tests;

class EcsClientTest extends AbstractEcsTestCase
{
    public function testClientCreated()
    {

        $this->assertThat(
            $this->client,
            $this->logicalNot(
                $this->equalTo(null)
            )
        );

        $this->assertEquals('UAM\Aws\Ecs\EcsClient', get_class($this->client));
    }

    public function testSignature()
    {
        $this->assertEquals('Aws\Common\Signature\SignatureV2', get_class($this->client->getSignature()));        
    }

}