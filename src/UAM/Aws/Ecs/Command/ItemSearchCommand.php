<?php

namespace UAM\Amazon\Pa\Command;

use Guzzle\Service\ClientInterface;
use Guzzle\Service\Command\OperationCommand;

class ItemSearchCommand extends OperationCommand
{
   /**
     * {@inheritdoc}
     */
    protected function build()
    {
        parent::build();
        $this->request->getQuery()->set('Operation', 'ItemSearch');
    }
}