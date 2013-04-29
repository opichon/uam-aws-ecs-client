<?php

namespace UAM\Aws\Ecs\Command;

use Guzzle\Service\ClientInterface;

class ItemSearch extends EcsCommand
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