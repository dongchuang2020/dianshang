<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttrModel extends Model
{
    protected  $table='attribute';
    protected $primaryKey='a_id';
    public $timestamps=false;
}
