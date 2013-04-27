<?php

namespace UAM\Aws\Ecs;

use Aws\Common\Client\AbstractClient;
use Aws\Common\Client\ClientBuilder;
use Aws\Common\Enum\ClientOptions as Options;
use Aws\Common\Signature\SignatureV2;

use Guzzle\Common\Collection;
use Guzzle\Service\Description\ServiceDescription;

class EcsClient extends AbstractClient
{
    const ASSOCIATE_TAG = 'associateTag';

    /**
     * Factory method to create a new Amazon PA Client
     *
     * The following array keys and values are available options:
     * - base_url: Base url of your Dzangocart store's API service
     * - token: The secret token used to authenticate access to your Dzangocart store's API service
     *
     * @param array|Collection $config Configuration data
     */
    public static function factory($config = array())
    {
        $client = ClientBuilder::factory(__NAMESPACE__)
            ->setConfig($config)
            ->setConfigDefaults(array(
                Options::SIGNATURE => new SignatureV2(),
                Options::SERVICE_DESCRIPTION => __DIR__ . '/Resources/ecs-2011-08-01.php'
            ))
//            ->setExceptionParser(new S3ExceptionParser())
            ->build();

        return $client;
    }
}