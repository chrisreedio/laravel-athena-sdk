<?php

namespace ChrisReedIO\AthenaSDK\Traits;

trait PaginatableItems
{
    protected string $itemsKey = 'items';

    public function getItemsKey(): string
    {
        return $this->itemsKey;
    }
}
