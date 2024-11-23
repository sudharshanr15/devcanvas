<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collections extends Model
{
    protected $table = "collections";

    protected $fillable = [
        "name",
        "schema",
        "user_databases_id"
    ];
}
