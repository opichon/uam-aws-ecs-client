<?php

namespace UAM\Aws\Ecs\Tests;

use Guzzle\Http\Message\Request;

class EcsSignatureTest extends AbstractEcsTestCase
{
    public function signatureDataProvider()
    {
        return array(
            array(
                "http://webservices.amazon.com/onca/xml?Service=AWSECommerceService&AWSAccessKeyId=AKIAIOSFODNN7EXAMPLE&Operation=ItemLookup&ItemId=0679722769&ResponseGroup=ItemAttributes,Offers,Images,Reviews&Version=2009-01-06",
                "http://webservices.amazon.com/onca/xml?AWSAccessKeyId=AKIAIOSFODNN7EXAMPLE&ItemId=0679722769&Operation=ItemLookup&ResponseGroup=ItemAttributes%2COffers%2CImages%2CReviews&Service=AWSECommerceService&Timestamp=2009-01-01T12%3A00%3A00Z&Version=2009-01-06&Signature=M%2Fy0%2BEAFFGaUAp4bWv%2FWEuXYah99pVsxvqtAuC8YN7I%3D"
            ),
        );        
    }

    /**
     * @dataProvider signatureDataProvider
     */
    public function testSignedUrl($unsigned, $signed)
    {
        $request = new Request('GET', $unsigned);

        $signature = $this->client->getSignature();

        $signature->signRequest($request, $this->client->getCredentials());

        $this->markTestIncomplete();
    }
}