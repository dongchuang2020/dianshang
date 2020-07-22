<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SkuModel extends Model
{
    protected $table = 'sku_name';
    protected $primaryKey = 'sid';
    public $timestamps = false;
    protected $guarded = [];
}
