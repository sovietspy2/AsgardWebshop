<?php

namespace Modules\Wine\Repositories\Eloquent;

use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Wine\Repositories\WineRepository;
use Modules\Wine\Events\WineWasCreated;
use Modules\Wine\Events\WineWasDeleted;
use Modules\Wine\Events\WineWasUpdated;

class EloquentWineRepository extends EloquentBaseRepository implements WineRepository
{
    public function create($data)
    {
        $wine = $this->model->create($data);
        event(new WineWasCreated($wine, $data));
        return $wine;
    }

    public function update($wine, $data)
    {
        $wine->update($data);
        event(new AuthorWasUpdated($wine, $data));
        return $wine;
    }

    public function destroy($wine)
    {
        event(new AuthorWasDeleted($wine));
        return $wine->delete();
    }

}
