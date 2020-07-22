<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    protected $table="admin_role";
    protected $primaryKey="admin_role_id";
    public $timestamps=false;
}
