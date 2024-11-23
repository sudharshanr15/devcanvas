<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDatabases extends Model
{
    protected $table = "user_databases";

    protected $fillable = [
        'driver',
        'host',
        'port',
        'database',
        'username',
        'password',
        'projects_id',
    ];
}
