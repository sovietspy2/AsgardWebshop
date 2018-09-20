<?php

namespace Modules\Wine\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{
    use Translatable;

    protected $table = 'wine__wines';
    public $translatedAttributes = [];
    protected $fillable = ['name', 'type', 'price', 'year', 'identifier', 'file'];


}
