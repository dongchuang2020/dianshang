<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleChmodModel extends Model
{
    protected $table="role_chmod";
    protected $primaryKey="role_chmod_id";
    public $timestamps=false;
}
