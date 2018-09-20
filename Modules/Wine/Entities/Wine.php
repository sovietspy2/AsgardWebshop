<?php

namespace Modules\Wine\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Wine extends Model
{

    use MediaRelation;
    use Translatable;

    protected $table = 'wine__wines';
    public $translatedAttributes = [];
    protected $fillable = ['name', 'type', 'price', 'year', 'identifier'];

    public function getPictureAttribute()
    {
        return $this->filesByZone('picture')->first();
    }

}
