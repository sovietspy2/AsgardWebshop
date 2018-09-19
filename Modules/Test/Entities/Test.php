<?php

namespace Modules\Test\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use Translatable;

    protected $table = 'test__tests';
    public $translatedAttributes = [];
    protected $fillable = [];
}
