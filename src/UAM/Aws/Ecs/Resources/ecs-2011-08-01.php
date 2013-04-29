<?php
return array (
    'apiVersion' => '2011-08-01',
    'service' => 'AWSECommerceService',
    'serviceFullName' => 'Amazon E-Commerce Service (Product Advertising API)',
    'serviceAbbreviation' => 'Amazon ECS',
    'serviceType' => 'rest-xml',
    'timestampFormat' => 'rfc822',
    'signatureVersion' => 'v2',
    'regions' => array(
        'ca' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'webservices.amazon.ca/onca/xml',
        ),
        'cn' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'webservices.amazon.cn/onca/xml',
        ),
        'de' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'webservices.amazon.de/onca/xml',
        ),
        'es' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'webservices.amazon.es/onca/xml',
        ),
        'fr' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'webservices.amazon.fr/onca/xml',
        ),
        'it' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'webservices.amazon.it/onca/xml',
        ),
        'jp' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'webservices.amazon.co.jp/onca/xml',
        ),
        'uk' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'webservices.amazon.co.uk/onca/xml',
        ),
        'us' => array(
            'http' => true,
            'https' => true,
            'hostname' => 'webservices.amazon.com/onca/xml',
        )
    ),
    'operations' => array(
        'ItemSearch' => array(
            'class' => 'UAM\Aws\Ecs\Command\ItemSearch',
            'httpMethod' => 'GET',
            'uri' => '',
            'parameters' => array(
                'SearchIndex' => array(
                    'location' => 'query',
                    'required' => true,
                    'type' => 'string'
                ),
                'Keywords' => array(
                    'location' => 'query',
                    'required' => true,
                    'type' => 'string'

                ),
                'ResponseGroup' => array(
                    'location' => 'query',
                    'required' => true,
                    'type' => 'string'
                )
            )
        )
    )
);