<?php

namespace Modules\Wine\Repositories\Cache;

use Modules\Wine\Repositories\WineRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheWineDecorator extends BaseCacheDecorator implements WineRepository
{
    public function __construct(WineRepository $wine)
    {
        parent::__construct();
        $this->entityName = 'wine.wines';
        $this->repository = $wine;
    }
}
