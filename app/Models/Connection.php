<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class Connection extends Model
{
    public static function getDynamicConnection(UserDatabases $database){
        $override = [
            'driver' => $database->driver,
            'host' => $database->host,
            'port' => $database->port,
            'database' => $database->database,
            'username' => $database->username,
            'password' => $database->password,
        ];
        $config = array_merge(Config::get("database.connections.{$database->driver}"), $override);
        $connection_name = self::getConfigConnectionName($database);
        Config::set("database.connections.{$connection_name}", $config);

        return DB::connection($connection_name);
    }

    public static function getConfigConnectionName(UserDatabases $database){
        return $database->driver . "_" . $database->database;
    }
}
