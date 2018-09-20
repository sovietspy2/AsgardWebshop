<?php

namespace Modules\Test\Repositories\Cache;

use Modules\Test\Repositories\TestRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheTestDecorator extends BaseCacheDecorator implements TestRepository
{
    public function __construct(TestRepository $test)
    {
        parent::__construct();
        $this->entityName = 'test.tests';
        $this->repository = $test;
    }
}
