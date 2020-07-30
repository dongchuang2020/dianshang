<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRess extends Model
{
    protected $table="user_ress";
    protected $primaryKey="ress_id";
    public $timestamps=false;
}
