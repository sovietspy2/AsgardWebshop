<?php

namespace Modules\Test\Entities;

use Illuminate\Database\Eloquent\Model;

class TestTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'test__test_translations';
}
