<?php

namespace UAM\Aws\Ecs\Command;

use Guzzle\Service\ClientInterface;
use Guzzle\Service\Command\OperationCommand;

use UAM\Aws\Ecs\Model\ItemSearchResponse;

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

    /**
     * {@inheritdoc}
     */
    protected function process()
    {
        if ($this->get(self::RESPONSE_PROCESSING) == self::TYPE_RAW) {
            $this->result = $this->request->getResponse();
        }
        else {
            $this->result = new ItemSearchResponse($this->request->getResponse()->getBody(true));
        }
    }
}
