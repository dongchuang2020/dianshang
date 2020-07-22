<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChmodModel extends Model
{
    protected $table="chmod";
    protected $primaryKey="chmod_id";
    public $timestamps=false;
}
