<?php 

namespace UAM\Aws\Ecs\Model;

use \SimpleXMLElement;

class ItemSearchResponse extends SimpleXMLElement
{
    public function isValid()
    {
        return $this->Items->Request->IsValid;
    }

    public function getItemCount()
    {
        return $this->Items->TotalResults;
    }

    public function getItems()
    {
        return $this->Items->Item;
    }
}