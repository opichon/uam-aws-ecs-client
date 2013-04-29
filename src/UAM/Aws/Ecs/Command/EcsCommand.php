<?php

namespace UAM\Aws\Ecs\Command;

use Guzzle\Service\ClientInterface;
use Guzzle\Service\Command\OperationCommand;

class EcsCommand extends OperationCommand
{
    /**
     * {@inheritdoc}
     */
    protected function build()
    {
        parent::build();
        $this->request->getQuery()->set('Service', 'AWSECommerceService');
        $this->request->getQuery()->set('AWSAccessKeyId', $this->getClient()->getConfig('key'));
        $this->request->getQuery()->set('AssociateTag', $this->getClient()->getConfig('associateTag'));
    }
}
