<?php

namespace App\Enums;

enum DBHost: string{
    case pgsql = "postgres";
    case mysql = "mysql";

    public static function getHost(DBDrivers $driver) {
        return match ($driver) {
            DBDrivers::pgsql => self::pgsql,
            DBDrivers::mysql => self::mysql,
        };
    }
}
