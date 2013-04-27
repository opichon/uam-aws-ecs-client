<?php

namespace UAM\Amazon\PA;

use Guzzle\Common\Collection;
use Guzzle\Service\Client as Client;
use Guzzle\Service\Description\ServiceDescription;

class AmazonPAClient extends Client
{
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
        $defaults = array(
            'base_url' => 'http://webservices.amazon.ca/onca/xml',
            'scheme' => 'http'
        );

        $required = array('AWSAccessKeyId', 'AssociateTag');
        $config = Collection::fromConfig($config, $defaults, $required);

        $client = new self($config->get('base_url'), $config);
        $description = ServiceDescription::factory(__DIR__ . '/amazon-pa.json');
        $client->setDescription($description);

        return $client;
    }

    public function buildSignature()
    {
        
    }
}