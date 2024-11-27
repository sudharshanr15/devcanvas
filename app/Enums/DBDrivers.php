<?php

namespace App\Enums;

enum DBDrivers: string
{
    case sqlite = "sqlite";
    case mysql = "mysql";
    case mariadb = "mariadb";
    case pgsql = "pgsql";

    public static function getDisplayName(string $name){
        return match($name){
            self::sqlite->value => "SQLite",
            self::mysql->value => "MySQL",
            self::mariadb->value => "MariaDB",
            self::pgsql->value => "PostgreSQL",
        };
    }
}
