<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected  $table='shop_category';
    protected $primaryKey='cate_id';
    public $timestamps=false;
}
