<?php

namespace ChrisReedIO\AthenaSDK;

use ChrisReedIO\AthenaSDK\Contracts\Paginatable;

abstract class PaginatedRequest extends Request implements Paginatable
{
    protected ?string $itemsKey;

    public function getItemsKey(): ?string
    {
        return $this->itemsKey;
    }
}
