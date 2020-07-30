<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopHistory extends Model
{
    protected $table="shop_history";
    protected $primaryKey="history_id";
    public $timestamps=false;
}
