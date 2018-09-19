<?php

namespace Modules\Wine\Entities;

use Illuminate\Database\Eloquent\Model;

class WineTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name, type'];
    protected $table = 'wine__wine_translations';
}
