<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    protected  $table='shop_brand';
    protected $primaryKey='brand_id';
    public $timestamps=false;
}
